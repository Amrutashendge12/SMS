<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Security extends Model
{
    protected $fillable = [
         'society_id',
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
    return $this->belongsTo(Society::class, 'society_id');
}
   public function user()
    {
        return $this->belongsTo(User::class);
    }
}
