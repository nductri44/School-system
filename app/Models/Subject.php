<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'code', 'note'
    ];

    public function teachers(){
        
        return $this->belongsToMany('App\Models\teacher', 'teacher_to_subjects', 'subject_id', 'teacher_id', 'year')->withPivot('semester');
    }
}
