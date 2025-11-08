<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class SchoolClass extends Model
{
    use HasFactory;
    protected $table = 'Class';
    protected $primaryKey = 'ID';
    protected $fillable = ['Name'];

    /**
     * Get the students for the class.
     */
    public function students()
    {
        return $this->hasMany(Student::class, 'ClassID', 'ID');
    }
}
