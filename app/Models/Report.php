<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $table = 'reports';

    protected $fillable = [
        'student_id','teacher_to_subjects_id', 'title', 'path', 'mark', 'note'
    ];

    public function TeacherToSubject()
    {
        return $this->hasOne(teacher_to_subjects::class, 'teacher_to_subject_id');
    }

    public function Student()
    {
        return $this->hasMany(Student::class, 'student_id');
    }

    public $timestamps = false;

}