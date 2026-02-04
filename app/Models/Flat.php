<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Flat extends Model
{
    protected $fillable = [
        'wing_id',
        'flat_number',
        'floor_no',
        'flat_type',
        'status',
    ];

    public function wing()
    {
        return $this->belongsTo(Wing::class);
    }
}
