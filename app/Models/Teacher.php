<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $table = 'teachers';
    protected $primaryKey = 'id';

    // Fix typo here: 'address' not 'addrress'
    protected $fillable = [
        'name',
        'dob',
        'gender',
        'address',
        'email',
        'phone',
    ];

    // One teacher has many students
    public function students()
    {
        return $this->hasMany(Student::class);
    }

    // Assuming teacher-subject is many-to-many (adjust if different)
    public function subjects()
    {
        return $this->belongsToMany(Subject::class, 'subject_teacher');
    }
}
