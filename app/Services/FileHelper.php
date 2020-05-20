<?php

namespace App\Http\StaticHelpers;

use Illuminate\Support\Str;
use Spatie\Image\Image;
use Spatie\Image\Manipulations;
use Illuminate\Support\Facades\Storage;
use App\Models\UserFieldsValues;

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
     * @param array $miniature массив параметров для создания минатюры(смотри код чтоб увидеть список)
     * @param string $name название файла(по-умолчанию будет имя самого файла)
     * @param string $disc диск для сохранения
     *
     * @return string Путь к сохранённому файлу
     */
    public static function saveImage($requestFileProperty, array $miniature = [], string $name = '', string $disc = 'public'): string
    {
        $request = request();
        if ($name === '') $name = $request->file($requestFileProperty)->name();
        $path = $request->file($requestFileProperty)->storeAs(
            $request->user()->id, self::randomFileName($name, $request->{$requestFileProperty}), $disc
        );

        if (empty($miniature) == false) {
            if (isset($miniature['height']) == false) $miniature['height'] = $miniature['width'];
            if (isset($miniature['fitMethod']) == false) $miniature['fitMethod'] = Manipulations::FIT_STRETCH;
            $url = Storage::disk($disc)->url($path);
            Image::load($url)
                ->fit($miniature['fitMethod'], $miniature['width'], $miniature['height'])
                ->save();
        }

        return $path;
    }
}
