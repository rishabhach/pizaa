<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    protected $fillable = ['name',
        'cost',
        'photo_id',
        'description',
        'is_available',
        'veg',
        'tag'];
}
