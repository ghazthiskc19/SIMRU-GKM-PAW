<?php

namespace App\Support;

class JsonStorage
{
    public function readArray(string $absolutePath): array
    {
        if (!file_exists($absolutePath)) {
            return [];
        }

        $content = file_get_contents($absolutePath);
        if ($content === false || trim($content) === '') {
            return [];
        }

        $decoded = json_decode($content, true);
        return is_array($decoded) ? $decoded : [];
    }

    public function writeArray(string $absolutePath, array $data): void
    {
        $dir = dirname($absolutePath);
        if (!is_dir($dir)) {
            mkdir($dir, 0777, true);
        }

        file_put_contents($absolutePath, json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES), LOCK_EX);
    }
}
