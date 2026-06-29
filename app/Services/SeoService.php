<?php

namespace App\Services;

class SeoService
{
    public static function meta(string $title, string $description, string $image = null): array
    {
        return [
            'title' => $title . ' | StarLab',
            'description' => $description,
            'og_image' => $image ?? asset('images/StarLab-Logo.png'),
        ];
    }
}
