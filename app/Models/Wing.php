<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wing extends Model
{
    protected $fillable = [
        'phase_id',
        'wing_name',
        'total_floors'
    ];

    public function phase()
    {
        return $this->belongsTo(Phase::class);
    }
}
