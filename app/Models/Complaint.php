<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;   //  ADD THIS LINE

class Complaint extends Model
{
    protected $fillable = [
    'user_id',
    'title',
    'description',
    'status'
];

public function user()
{
    return $this->belongsTo(User::class);
}

}
