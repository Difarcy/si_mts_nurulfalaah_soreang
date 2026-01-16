<?php

namespace App\Domain\Chatbot\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class GeminiClient
{
    /**
     * Mengirim prompt ke Gemini API dan mendapatkan respon teks.
     */
    public function generateContent(string $context, string $userQuery): ?string
    {
        $apiKey = env('GEMINI_API_KEY');
        if (!$apiKey) {
            Log::warning('Gemini API Key missing');
            return null;
        }

        try {
            // Menggunakan gemini-2.5-flash: Terbukti stabil di lingkungan ini
            $url = "https://generativelanguage.googleapis.com/v1beta/models/gemini-2.5-flash:generateContent?key=" . $apiKey;

            $payload = [
                'contents' => [
                    [
                        'parts' => [
                            ['text' => "Context: {$context}\n\nUser Question: {$userQuery}"]
                        ]
                    ]
                ],
                'generationConfig' => [
                    'temperature' => 0.2,
                    'maxOutputTokens' => 1000,
                ]
            ];

            $response = Http::timeout(15)->post($url, $payload);

            if ($response->successful()) {
                $candidates = $response->json('candidates');
                if (!empty($candidates) && isset($candidates[0]['content']['parts'][0]['text'])) {
                    return trim($candidates[0]['content']['parts'][0]['text']);
                }
            }

            Log::error('Gemini API Error: ' . $response->status() . ' - ' . $response->body());
        } catch (\Throwable $e) {
            Log::warning('Gemini Chatbot request failed: ' . $e->getMessage());
        }

        return null;
    }
}
