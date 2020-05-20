<?php

namespace App\Services;

class ResponseService
{
    public static function response($message = 'Запроc прошёл успешно', $code = 200, $fields = [])
    {
        return response()->json(array_merge([
            'code' => $code,
            'message' => $message
        ], $fields), $code);
    }

    public static function response201()
    {
        return ResponseService::response('Ресур создан успешно', 201);
    }

    public static function error($message = 'Ошибка на сервере.', $code = 500, $fields = [])
    {
        return ResponseService::response($message, $code, $fields);
    }

    public static function fieldsErrors($errors)
    {
        return ResponseService::error('Ошибки полей', 500,
            [
                'message' => 'Ошибки полей',
                'errors' => $errors
            ]
        );
    }

    public static function error403()
    {
        return ResponseService::error('Нет доступа', 403);
    }
}
