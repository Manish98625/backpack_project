<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentSkill extends Model
{
    use HasFactory;

    protected $table = 'student_skills';

    public function skills()
    {
        return $this->belongsTo(Skill::class, 'id', 'skill_id');
    }
}
