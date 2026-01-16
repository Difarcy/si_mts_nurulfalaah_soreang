<?php

namespace App\Core\Services;

class NotificationService
{
    public static function success(string $action, string $entity): string
    {
        $entityLabel = ucfirst($entity);

        return match ($action) {
            'created', 'store' => "{$entityLabel} berhasil ditambahkan.",
            'updated', 'update' => "{$entityLabel} berhasil diperbarui.",
            'deleted', 'destroy' => "{$entityLabel} berhasil dihapus.",
            'saved' => "{$entityLabel} berhasil disimpan.",
            default => 'Operasi berhasil.',
        };
    }

    public static function error(string $action, string $entity): string
    {
        $entityLabel = strtolower($entity);

        return match ($action) {
            'create', 'store' => "Gagal menambahkan {$entityLabel}.",
            'update' => "Gagal memperbarui {$entityLabel}.",
            'delete', 'destroy' => "Gagal menghapus {$entityLabel}.",
            'save' => "Gagal menyimpan {$entityLabel}.",
            default => 'Terjadi kesalahan.',
        };
    }

    public static function customSuccess(string $message): string
    {
        return $message;
    }

    public static function customError(string $message): string
    {
        return $message;
    }
}

