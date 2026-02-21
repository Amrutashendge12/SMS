<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'society_id',
        'name',
        'event_date',
        'event_time',
        'photo',
        'venue',
        'location',
        'description',
        'type',
        'status',
        'created_by'
    ];
}

