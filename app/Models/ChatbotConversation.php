<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChatbotConversation extends Model
{
    protected $fillable = [
        'session_id',
        'user_message',
        'bot_response',
        'intent_matched',
        'confidence_score',
        'response_time_ms',
        'method',
        'ip_address',
        'user_agent',
    ];

    protected $casts = [
        'confidence_score' => 'decimal:2',
        'response_time_ms' => 'integer',
        'created_at' => 'datetime',
    ];

    /**
     * Scope to filter by session
     */
    public function scopeSession($query, string $sessionId)
    {
        return $query->where('session_id', $sessionId)->orderBy('created_at');
    }

    /**
     * Scope to get recent conversations
     */
    public function scopeRecent($query, int $days = 7)
    {
        return $query->where('created_at', '>=', now()->subDays($days));
    }

    /**
     * Scope to get low confidence conversations (need review)
     */
    public function scopeLowConfidence($query, float $threshold = 0.65)
    {
        return $query->where('confidence_score', '<', $threshold);
    }

    /**
     * Scope to filter by method
     */
    public function scopeMethod($query, string $method)
    {
        return $query->where('method', $method);
    }
}
