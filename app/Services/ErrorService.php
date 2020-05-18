<?php

namespace App\Services;

class ErrorService
{
    public static function returnError($message = 'Ошибка на сервере.', $code = 500)
    {
        return response()->json([
            'code' => $code,
            'message' => $message
        ], $code);
    }

    public static function returnFieldError($errors)
    {
        return response()->json([
            'code' => 500,
            'message' => 'Ошибки полейй',
            'errors' => $errors
        ], 500);
    }

    public static function returnError403()
    {
        return ErrorService::returnError('Нет доступа', 403);
    }
}
