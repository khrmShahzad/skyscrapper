<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $table = 'schedules';
    protected $fillable = [
        'class_id',
        'subject_id',
        'timing',
        'duration',
        'break_teacher_meeting',
        'off_day'
    ];

    public function class()
    {
        return $this->belongsTo(\App\Models\ClassRoom::class,'class_id');
    }

    public function subject()
    {
        return $this->belongsTo(\App\Models\Subject::class,'subject_id');
    }
}
