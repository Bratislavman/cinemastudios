<?php

namespace App\Models;;

use Illuminate\Database\Eloquent\Model;

class Serial extends Model
{
    protected $fillable = [
        'name', 'date_of_issue'
    ];
}
