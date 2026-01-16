<?php

namespace App\Domain\Media\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class YouTubeService
{
    public function getVideoDetails(string $videoId): array
    {
        try {
            $url = "https://www.youtube.com/watch?v={$videoId}";

            $response = Http::withHeaders([
                'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36'
            ])->get($url);

            if ($response->failed()) {
                return [
                    'views' => '0',
                    'duration' => '00:00'
                ];
            }

            $html = $response->body();

            $views = '0';
            if (preg_match('/"viewCount":"(\d+)"/', $html, $matches)) {
                $views = $this->formatViews($matches[1]);
            }

            $duration = '00:00';
            if (preg_match('/"lengthSeconds":"(\d+)"/', $html, $matches)) {
                $seconds = (int) $matches[1];
                $duration = gmdate('H:i:s', $seconds);
                if (str_starts_with($duration, '00:')) {
                    $duration = substr($duration, 3);
                }
            }

            return [
                'views' => $views,
                'duration' => $duration
            ];
        } catch (\Exception $e) {
            Log::error('YouTube Fetch Error: ' . $e->getMessage());
            return [
                'views' => '0',
                'duration' => '00:00'
            ];
        }
    }

    private function formatViews($views)
    {
        $n = (int) $views;
        if ($n < 1000) return $n;
        if ($n < 1000000) return round($n / 1000, 1) . 'K';
        if ($n < 1000000000) return round($n / 1000000, 1) . 'M';
        return round($n / 1000000000, 1) . 'B';
    }
}

