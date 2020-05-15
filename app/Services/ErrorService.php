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

    public static function returnError403()
    {
        return returnError('Нет доступа', 403);
    }
}
