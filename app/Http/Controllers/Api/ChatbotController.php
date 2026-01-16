<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Domain\Chatbot\Services\ChatbotService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

class ChatbotController extends Controller
{
    public function __construct(
        private ChatbotService $chatbotService
    ) {
    }

    /**
     * Process chatbot message
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function chat(Request $request): JsonResponse
    {
        // Validation
        $validator = Validator::make($request->all(), [
            'message' => 'required|string|max:500',
            'session_id' => 'nullable|string|max:100',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Pesan terlalu panjang atau tidak valid.',
                'errors' => $validator->errors(),
            ], 422);
        }

        try {
            $message = $request->input('message');
            $sessionId = $request->input('session_id');
            $ipAddress = $request->ip();
            $userAgent = $request->userAgent();

            // Process message through chatbot service
            $response = $this->chatbotService->processMessage(
                $message,
                $sessionId,
                $ipAddress,
                $userAgent,
                $request->input('current_url'),
                $request->input('page_title')
            );

            // Add session_id to response for client to maintain conversation
            if (!$sessionId) {
                $response['session_id'] = $response['session_id'] ?? uniqid('chat_', true);
            }

            return response()->json($response);

        } catch (\Exception $e) {
            \Log::error('Chatbot error: ' . $e->getMessage(), [
                'message' => $request->input('message'),
                'trace' => $e->getTraceAsString(),
            ]);

            return response()->json([
                'success' => false,
                'message' => '😔 Maaf, terjadi kesalahan. Silakan coba lagi atau hubungi kami di WhatsApp.',
                'method' => 'error',
            ], 500);
        }
    }

}
