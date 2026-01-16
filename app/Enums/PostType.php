<?php

namespace App\Enums;

enum PostType: string
{
    case BERITA = 'berita';
    case ARTIKEL = 'artikel';

    public function label(): string
    {
        return match ($this) {
            self::BERITA => 'Berita',
            self::ARTIKEL => 'Artikel',
        };
    }

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }

    public static function isValid(string $value): bool
    {
        return in_array($value, self::values(), true);
    }
}
