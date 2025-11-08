<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    protected $table = 'Subject';
    protected $primaryKey = 'ID';
    protected $fillable = ['Name'];

    /**
     * Get the students who are taking this subject.
     */
    public function students()
    {
        return $this->belongsToMany(Student::class, 'StudentSubject', 'SubjectID', 'StudentID', 'ID', 'ID');
    }
}
