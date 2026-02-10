<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Security extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'email',
        'mobile',
        'password',
        'shift',
        'photo',
        'id_proof',
        'address',
        'education',
        'gender',
        'in_time',
        'out_time',
        'status'
    ];

    public function society()
{
    return $this->belongsTo(\App\Models\Society::class);
}

}
