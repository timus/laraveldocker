<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    protected $fillable = [
        'name',
        'timestamp',
        'user_id',
        'activity_id'
    ];
}
