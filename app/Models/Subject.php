<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    /**
     * Get the students who are taking this subject.
     */
    public function students()
    {
        return $this->belongsToMany(Student::class);
    }
}
