<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    public $guarded = ['id'];

    public function lesson(){
        return $this->belongsTo(Lesson::class);
    }

    public function presences(){
        return $this->hasMany(Presence::class);
    }
}
