<?php

namespace App\Models;

use App\Models\Skill;
use App\Models\State;
use App\Models\StudentSkill;
use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use CrudTrait;
    use HasFactory;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
     */

    protected $table = 'students';
    protected $primaryKey = 'id';
    // public $timestamps = false;
    protected $guarded = ['id'];
    // protected $fillable = [''];
    // protected $hidden = [];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
     */
    public function gender()
    {
        return $this->belongsTo(Gender::class, 'gender_id');
    }

    public function skills()
    {
        return $this->belongsToMany(Skill::class, 'student_skills')->withPivot('id');
    }
    public function state()
    {
        return $this->belongsTo(State::class, 'state_id');
    }

    public function district()
    {
        return $this->belongsTo(District::class, 'district_id');
    }


    
    public function city()
    {
        return $this->belongsTo(City::class, 'cities_id');
    }

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
     */

    public function get_skill()
    {
        $student_skills = StudentSkill::where('student_id', $this->id)->get();
        $skill_name_final = '';
        foreach ($student_skills as $student_skill) {
            if ($student_skill) {
                $skill_name = Skill::find($student_skill->skill_id)->name;
                $skill_name_final = $skill_name_final . ',' . $skill_name;

            } else {
                return '';

            }

        }
        return $skill_name_final;

    }

  

    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
     */

    /*
    |--------------------------------------------------------------------------
    | ACCESSORS
    |--------------------------------------------------------------------------
     */

    /*
|--------------------------------------------------------------------------
| MUTATORS
|--------------------------------------------------------------------------
 */
}
