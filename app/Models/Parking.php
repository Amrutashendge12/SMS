<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Parking extends Model
{
    protected $fillable = [
    'vehicle_number',
    'owner_name',
    'vehicle_type',
    'slot_number',
    'status',
    'entry_time',
    'exit_time',
    'charges'

];

}
