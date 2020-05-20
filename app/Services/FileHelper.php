<?php

namespace App\Services;

use Spatie\Image\Image;
use Spatie\Image\Manipulations;
use Illuminate\Support\Facades\Storage;

class FileHelper
{
    public static function fullPathFile($url)
    {
        if ($url) return (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]/$url";
        return '';
    }

    /**
     * Cохраняет картинку и создаёт миниатюру, если нужно
     *
     * @param string $requestFileProperty имя переменной из request
     * @param string $folder папка
     * @param array $miniature массив параметров для создания минатюры(смотри код чтоб увидеть список)
     * @param string $disk диск для сохранения
     *
     * @return string Путь к сохранённому файлу
     */
    public static function saveImage($requestFileProperty, string $folder, array $miniature = [], string $disk = 'public'): string
    {
        $request = request();
        $path = $request->file($requestFileProperty)->store($folder, $disk);

        if (empty($miniature) == false) {
            if (isset($miniature['height']) == false) $miniature['height'] = $miniature['width'];
            if (isset($miniature['fitMethod']) == false) $miniature['fitMethod'] = Manipulations::FIT_STRETCH;
            $url = Storage::disk($disk)->url($path);
            Image::load($url)
                ->fit($miniature['fitMethod'], $miniature['width'], $miniature['height'])
                ->save();
        }

        return $path;
    }
}
