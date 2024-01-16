<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    
    protected $table = 'students';
    protected $guarded = [];
    public $timestamps = false;

    public function groups()
    {
        return $this->belongsTo(Group::class, 'group_id');
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'student_courses', 'course_id', 'student_id');
    }
}
