<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Maintenance extends Model
{
    protected $fillable = [
    'society_name',
    'phase_name',
    'wing',
    'floor',
    'flat_no',
    'owner_name',
    'amount',
    'due_date',
    'paid_date',
    'status',
    'payment_mode',
    'remark',
    'created_by'
];
   
}
