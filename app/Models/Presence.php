<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presence extends Model
{
    use HasFactory;

    public $guarded = ['id'];

    public function attendance(){
        return $this->belongsTo(Attendance::class);
    }
}
