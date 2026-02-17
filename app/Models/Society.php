<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Society extends Model
{
    protected $fillable = [
            'owner_id',
        'society_name',
        'registration_no',
        'address',
        'city',
        'pincode',
         'owner_id'
    ];

public function phases()
{
    return $this->hasMany(Phase::class, 'society_id');
}

public function owner()
{
    return $this->belongsTo(User::class, 'owner_id');
}
public function securities()
{
    return $this->hasMany(Security::class);
}


}

