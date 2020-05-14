<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Studio extends Model
{
    protected $fillable = [
        'name', 'created_year', 'closed_year', 'country_id'
    ];
}
