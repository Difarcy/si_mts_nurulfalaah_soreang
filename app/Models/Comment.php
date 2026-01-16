<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Comment extends Model
{
    protected $fillable = [
        'post_id',
        'parent_id',
        'is_admin',
        'name',
        'email',
        'comment',
        'admin_reply_by',
        'admin_reply',
        'admin_replied_at',
        'is_approved',
        'is_read',
    ];

    protected $casts = [
        'is_approved' => 'boolean',
        'is_read' => 'boolean',
        'is_admin' => 'boolean',
        'admin_replied_at' => 'datetime',
    ];

    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class);
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(self::class, 'parent_id');
    }

    public function children(): HasMany
    {
        return $this->hasMany(self::class, 'parent_id')->newest();
    }

    public function likes(): HasMany
    {
        return $this->hasMany(CommentLike::class);
    }

    public function scopeApproved($query)
    {
        return $query->where('is_approved', true);
    }

    public function scopeUnread($query)
    {
        return $query->where('is_read', false);
    }

    public function scopeNewest($query)
    {
        return $query->orderBy('created_at', 'desc');
    }
}
