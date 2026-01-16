<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityVideo extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    // Accessor untuk mendapatkan Embed URL
    public function getEmbedUrlAttribute()
    {
        $loading = $this->youtube_id;
        if ($loading) {
            return "https://www.youtube.com/embed/" . $loading;
        }
        return null;
    }

    // Accessor untuk mendapatkan Thumbnail URL
    public function getThumbnailUrlAttribute()
    {
        $id = $this->youtube_id;
        if ($id) {
            return "https://img.youtube.com/vi/" . $id . "/hqdefault.jpg";
        }
        return "https://via.placeholder.com/640x360.png?text=No+Thumbnail";
    }

    // Helper untuk ekstrak ID dari URL apapun
    public function getYoutubeIdAttribute()
    {
        $url = $this->youtube_url;
        $pattern = '%^# Match any youtube URL
            (?:https?://)?  # Optional scheme. Either http or https
            (?:www\.)?      # Optional www subdomain
            (?:             # Group host alternatives
              youtu\.be/    # Either youtu.be,
            | youtube\.com  # or youtube.com
              (?:           # Group path alternatives
                /embed/     # Either /embed/
              | /v/         # or /v/
              | /watch\?v=  # or /watch\?v=
              )             # End path alternatives.
            )               # End host alternatives.
            ([\w-]{5,20})  # Allow 5-20 chars for youtube id
            (?:[?&].*)?    # Optional query parameters
            $%x';

        $result = preg_match($pattern, $url, $matches);
        if ($result) {
            return $matches[1];
        }
        return null;
    }
}
