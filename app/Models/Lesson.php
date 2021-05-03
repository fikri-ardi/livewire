<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function attendances(){
        return $this->hasMany(Attendance::class);
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
