<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $fillable = [
        'event_number', 'name', 'email', 'phone', 'category', 'occupation', 'university',
    ];
}
