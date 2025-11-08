<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Student extends Model
{
    use HasFactory;
    protected $table = 'Student';
    protected $primaryKey = 'ID';
    protected $fillable = ['ClassID', 'Name', 'DateOfBirth'];

    /**
     * Get the class that the student belongs to.
     */
    public function class()
    {
        return $this->belongsTo(SchoolClass::class, 'ClassID', 'ID');
    }

    /**
     * Get the subjects the student is enrolled in.
     */
    public function subjects()
    {
        return $this->belongsToMany(Subject::class, 'StudentSubject', 'StudentID', 'SubjectID', 'ID', 'ID');
    }


}
