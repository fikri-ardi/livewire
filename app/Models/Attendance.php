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

    public function setStartedAtAttribute($value){
        $this->attributes['started_at'] = date('Y-m-d H:i:s', strtotime($value));
    }

    public function setEndedAtAttribute($value){
        $this->attributes['ended_at'] = date('Y-m-d H:i:s', strtotime($value));
    }

    public function getStartedAtAttribute($value){
        return date('d M Y H.i', strtotime($value));
    }

    public function getEndedAtAttribute($value){
        return date('d M Y H.i', strtotime($value));
    }
}
