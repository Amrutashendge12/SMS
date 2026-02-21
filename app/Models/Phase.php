<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Phase extends Model
{
    protected $fillable = ['society_id', 'phase_name'];

  public function society()
{
    return $this->belongsTo(Society::class, 'society_id');
}

}
