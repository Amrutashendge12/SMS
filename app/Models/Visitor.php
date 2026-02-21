<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Flat;   //  ADD THIS LINE

class Visitor extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone',
        'flat_id',
        'purpose',
        'check_in',
        'check_out'
    ];

    public function flat()
    {
        return $this->belongsTo(Flat::class);
    }
}
