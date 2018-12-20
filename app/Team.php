<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = [
        'event_number', 'team_name', 'leader_name', 'leader_email', 'leader_phone', 'member_count', 'name_member', 'phone_member', 'category', 'occupation', 'university',
    ];
}
