<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Society extends Model
{
    protected $fillable = [
        'society_name',
        'registration_no',
        'address',
        'city',
        'pincode',
         'owner_id'
    ];
public function phases()
{
    return $this->hasMany(\App\Models\Phase::class);
}


}

