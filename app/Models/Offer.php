<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    protected $fillable = ['message', 'is_active'];
     
    protected $casts = [
        'is_active' => 'boolean'
    ];
}
