<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Attendance extends Model
{
    protected $fillable = [
    'security_id', 'date', 'in_time', 'out_time'
];

public function security()
{
    return $this->belongsTo(Security::class, 'security_id');
}


}
