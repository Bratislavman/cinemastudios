<?php

namespace App\Services;

class ModelService
{
    public static function saveOnRequest(array $fields, &$model)
    {
        $request = request();
        $name_field = '';
        foreach ($fields as $field) {
            $name_field = $field['name'];
            if ($request->$name_field) {
                if (isset($field['action'])) {
                    $model->$name_field = $field['action']();
                } else $model->$name_field = $request->$name_field;
            }
        }
        $model->save();
    }
}
