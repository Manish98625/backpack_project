<?php

namespace App\Models;

use App\Models\Skill;
use App\Models\State;
use App\Models\District;
use App\Models\StudentSkill;
use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

    public function districtentity()
    {
        return $this->belongsTo(District::class, 'district_id');
    }

    public function cityentity()
    {
        return $this->belongsTo(City::class, 'city_id');
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

    // public function getDistricts()
    // {
    //     $districts_id = District::where('student_id', $this->id)->get();
    //     $district_id = '';
    //     foreach ($districts_id as $district_id) {
    //         if ($district_id) {
    //             $district_id = District::find($district_id->skill_id)->name;
    //             $district_name =$district_id;
    //             // $skill_name_final = $skill_name_final . ',' . $skill_name;

    //         } else {
    //             return '';

    //         }

    //     }
    //     return $district_name;

    // }

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
