<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory;

    protected $table = 'students';
    protected $primaryKey = 'id';

    protected $fillable = [
        'register_no',
        'name',
        'gender',
        'dob',
        'email',
        'phone',
        'address',
        'photo',
        'teacher_id'
    ];

    /**
     * A student belongs to one teacher.
     */
    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    /**
     * A student belongs to many subjects.
     */
    public function subjects()
    {
        return $this->belongsToMany(
            Subject::class,
            'student_subject',
            'student_id',
            'subject_id'
        )->withTimestamps();
    }
}
