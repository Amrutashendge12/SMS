<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;  // ADD THIS
use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
     use HasFactory;
    protected $fillable = [
    'title',
    'description',
    'notice_date',
    'notice_type'
];

}
