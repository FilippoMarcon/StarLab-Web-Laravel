<?php

namespace App\Services;

use Cloudinary\Cloudinary;
use Illuminate\Support\Facades\Log;

class CloudinaryUrl
{
    private static ?Cloudinary $cloudinary = null;

    private const IMAGE_EXTENSIONS = ['jpg', 'jpeg', 'png', 'gif', 'webp', 'svg', 'bmp', 'avif', 'tiff'];

    private static function instance(): ?Cloudinary
    {
        if (!self::$cloudinary) {
            $url = config('cloudinary.cloud_url');
            if (empty($url)) {
                Log::error('CloudinaryUrl: CLOUDINARY_URL is not configured');
                return null;
            }
            self::$cloudinary = new Cloudinary($url);
        }
        return self::$cloudinary;
    }

    public static function get(string $path): string
    {
        $cloudinary = self::instance();
        if (!$cloudinary) {
            return '';
        }

        try {
            $info = pathinfo($path);
            $dirname = str_replace('\\', '/', $info['dirname']);
            $publicId = $dirname . '/' . $info['filename'];
            $ext = strtolower($info['extension'] ?? '');

            if (in_array($ext, self::IMAGE_EXTENSIONS, true)) {
                return (string) $cloudinary->image($publicId)->secure()->toUrl();
            }

            return (string) $cloudinary->raw($publicId)->secure()->toUrl();
        } catch (\Throwable $e) {
            Log::error('CloudinaryUrl error: ' . $e->getMessage(), ['path' => $path]);
            return '';
        }
    }
}
