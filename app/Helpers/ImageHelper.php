<?php

namespace App\Helpers;

use Intervention\Image\ImageManager;
use Intervention\Image\Facades\Image;
//use Intervention\Image\Drivers\Gd\Driver as GdDriver;
use Illuminate\Support\Str;

class ImageHelper
{
    /**
     * Upload dan kompres gambar (kompatibel Intervention Image v2)
     *
     * @param \Illuminate\Http\UploadedFile $file
     * @param string $directory — direktori relatif dari base_path
     * @param string|null $oldFileName — nama file lama yang akan dihapus
     * @param int $maxWidth — batas maksimum lebar gambar
     * @param int $quality — kualitas kompresi JPG
     * @param string $prefix — prefix nama file
     * @return string nama file baru yang disimpan
     */
    public static function uploadCompressedImage($file, $directory, $oldFileName = null, $maxWidth = 600, $quality = 75, $prefix = '')
    {
        $publicPath = public_path($directory);

        if (!file_exists($publicPath)) {
            mkdir($publicPath, 0755, true);
        }

        if ($oldFileName) {
            $oldFilePath = $publicPath . '/' . $oldFileName;
            if (file_exists($oldFilePath)) {
                unlink($oldFilePath);
            }
        }

        $imageName = $prefix . Str::uuid() . '.jpg'; // simpan konsisten ke jpg

        // ✅ pakai ImageManager v3
        $manager = new ImageManager(
            new \Intervention\Image\Drivers\Gd\Driver()
        );

        $img = $manager->read($file->getPathname());

        if ($img->width() > $maxWidth) {
            $img = $img->resize($maxWidth, null, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
        }

        $img->toJpeg($quality)->save($publicPath . '/' . $imageName);

        return $imageName;
    }

    /**
     * Generate <img> tag dengan fallback default berdasarkan gender
     */
    public static function getAvatarImageTag(
        ?string $filename,
        string $gender,
        string $folder,
        string $defaultMaleImage,
        string $defaultFemaleImage,
        int $width = 50,
        string $class = 'rounded avatar-sm'
    ): string {
        $imagePath = public_path("images/{$folder}/{$filename}");

        $defaultPhotoPath = $gender === 'Laki-laki'
            ? asset("images/{$defaultMaleImage}")
            : asset("images/{$defaultFemaleImage}");

        $photoUrl = ($filename && file_exists($imagePath))
            ? asset("images/{$folder}/{$filename}")
            : $defaultPhotoPath;

        return '<img src="' . $photoUrl . '" alt="Foto" width="' . $width . '" class="' . $class . '" />';
    }
}
