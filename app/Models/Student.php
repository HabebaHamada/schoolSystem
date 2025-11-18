<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Student extends Model
{
    use HasFactory;
    protected $fillable = ['school_class_id', 'name', 'date_of_birth','photo'];

    /**
     * Get the class that the student belongs to.
     */
    public function class()
    {
        return $this->belongsTo(SchoolClass::class, 'school_class_id', 'id');
    }

    /**
     * Get the subjects the student is enrolled in.
     */
    public function subjects()
    {
        return $this->belongsToMany(Subject::class);
    }


}
