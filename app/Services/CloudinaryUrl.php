<?php

namespace App\Services;

use Cloudinary\Cloudinary;

class CloudinaryUrl
{
    private static ?Cloudinary $cloudinary = null;

    private const IMAGE_EXTENSIONS = ['jpg', 'jpeg', 'png', 'gif', 'webp', 'svg', 'bmp', 'avif', 'tiff'];

    private static function instance(): Cloudinary
    {
        if (!self::$cloudinary) {
            $url = config('cloudinary.cloud_url');
            self::$cloudinary = new Cloudinary($url ?: []);
        }
        return self::$cloudinary;
    }

    public static function get(string $path): string
    {
        $info = pathinfo($path);
        $dirname = str_replace('\\', '/', $info['dirname']);
        $publicId = $dirname . '/' . $info['filename'];
        $ext = strtolower($info['extension'] ?? '');

        if (in_array($ext, self::IMAGE_EXTENSIONS, true)) {
            return self::instance()->image($publicId)->secure()->toUrl();
        }

        return self::instance()->raw($publicId)->secure()->toUrl();
    }
}
