<?php

namespace App\Domain\Chatbot\Services;

use App\Models\ChatbotConversation;

class ChatbotService
{
    public function __construct(
        private ChatbotContextService $contextService,
        private GeminiClient $geminiClient
    ) {
    }

    /**
     * Proses pesan chatbot menggunakan 100% Gemini AI.
     * Jika Gemini gagal/error/limit, langsung return pesan "AI sedang sibuk".
     */
    public function processMessage(
        string $message,
        ?string $sessionId = null,
        ?string $ipAddress = null,
        ?string $userAgent = null,
        ?string $currentPageUrl = null,
        ?string $currentPageTitle = null
    ): array {
        $startTime = microtime(true);
        $sessionId = $sessionId ?? uniqid('chat_', true);

        // Ambil context sekolah terkini dari database
        $context = $this->contextService->getSchoolContext($currentPageUrl, $currentPageTitle);

        // Kirim ke Gemini AI
        $geminiResponse = $this->geminiClient->generateContent($context, $message);

        if ($geminiResponse) {
            // AI berhasil menjawab
            $response = [
                'success' => true,
                'message' => $geminiResponse,
                'confidence' => 0.95,
                'method' => 'ai',
                'category' => 'general',
                'session_id' => $sessionId,
            ];
            $this->logConversation($sessionId, $message, $response, ['intent' => 'gemini', 'confidence' => 0.95], $startTime, $ipAddress, $userAgent);
            return $response;
        }

        // Gemini gagal (error/limit/timeout) - Berikan fallback yang lebih helpful
        $fallback = $this->buildHelpfulFallback($sessionId);

        $this->logConversation($sessionId, $message, $fallback, null, $startTime, $ipAddress, $userAgent);
        return $fallback;
    }

    /**
     * Bangun fallback response yang lebih helpful dengan informasi kontak real dari database.
     */
    private function buildHelpfulFallback(string $sessionId): array
    {
        // Ambil kontak sekolah dari database
        $phone = \App\Models\InfoText::where('key', '=', 'site_phone')->value('value');
        $email = \App\Models\InfoText::where('key', '=', 'site_email')->value('value');
        $whatsapp = \App\Models\SpmbSetting::first()?->contact_wa ?? $phone;

        $message = "Mohon maaf, layanan chatbot AI kami sedang mengalami gangguan saat ini.\n\n";
        $message .= "Namun jangan khawatir! Anda tetap bisa mendapatkan informasi dengan cara berikut:\n\n";

        if ($whatsapp) {
            $waClean = preg_replace('/[^0-9]/', '', $whatsapp);
            $waLink = "https://wa.me/{$waClean}";
            $message .= "WhatsApp: {$whatsapp}\n({$waLink})\n\n";
        }

        if ($phone) {
            $message .= "Telepon: {$phone}\n\n";
        }

        if ($email) {
            $message .= "Email: {$email}\n\n";
        }

        $message .= "Terima kasih atas pengertiannya!";

        return [
            'success' => false,
            'message' => $message,
            'method' => 'fallback',
            'confidence' => 0,
            'session_id' => $sessionId,
        ];
    }


    private function logConversation($sessionId, $userMessage, $botResponse, $matchedIntent, $startTime, $ip, $ua): void
    {
        $responseTime = round((microtime(true) - $startTime) * 1000);
        ChatbotConversation::create([
            'session_id' => $sessionId,
            'user_message' => $userMessage,
            'bot_response' => $botResponse['message'] ?? json_encode($botResponse),
            'intent_matched' => $matchedIntent['intent'] ?? null,
            'confidence_score' => $matchedIntent['confidence'] ?? 0,
            'response_time_ms' => $responseTime,
            'method' => $botResponse['method'] ?? 'unknown',
            'ip_address' => $ip,
            'user_agent' => $ua,
        ]);
    }
}
