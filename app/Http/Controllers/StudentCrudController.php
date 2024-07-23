<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentRequest;
use App\Models\City;
use App\Models\District;
use App\Models\Skill;
use App\Models\Student;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Illuminate\Http\Request;
use DB;

/**
 * Class StudentCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class StudentCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Student::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/student');
        CRUD::setEntityNameStrings('student', 'students');

        $this->crud->addClause('with', 'skills');

    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        // CRUD::setFromDb();

        CRUD::setColumns([

            [
                'name' => 'name',
                'type' => 'text',
                'label' => 'Student Name',
            ],
            // [
            //     'name' => 'username',
            //     'type' => 'text',
            //     'label' => 'Username',
            // ],
            // [
            //     'name' => 'email',
            //     'type' => 'email',
            //     'label' => 'Email',
            // ],
            // [
            //     'name' => 'date',
            //     'type' => 'date',
            //     'label' => 'Date',
            // ],
            // [

            //     'name' => 'phonenumber',
            //     'type' => 'number',
            //     'label' => 'PhoneNumber',
            // ],
            // [
            //     'name' => 'gender',
            //     'label' => 'Gender',
            //     'type' => 'select',
            // ],
            // [
            //     'name' => 'address',
            //     'type' => 'text',
            //     'label' => 'Address',
            // ],
            // [
            //     'name' => 'state_id',
            //     'label' => 'State',
            //     'type' => 'text',
            // ],
            // [
            //     'name' => 'class',
            //     'type' => 'text',
            //     'label' => 'Class',
            // ],
            // [
            //     'name' => 'gender',
            //     'label' => 'Gender',
            //     'type' => 'select',
            // ],

            [
                'name' => 'skill_id',
                'label' => 'Skills',
                'type' => 'model_function',
                'function_name' => 'get_skill',
            ],
            // [
            //     'name' => 'image',
            //     'type' => 'image',
            //     'label' => 'Image',
            //     'disk' => 'public',
            // ],

            [
                'name' => 'state_id',
                'label' => 'state',
                'type' => 'select',
            ],

            [
                'name' => 'district_id',
                'label' => 'District',
                'type' => 'select',
                'entity' => 'districtentity',
                'attribute' => "name",
                'model' => "App\Models\District",

            ],

            [
                'name' => 'city_id',
                'label' => 'City',
                'type' => 'select',
                'entity' => 'cityentity',
                'attribute' => 'name',
                'model' => 'App\Models\City',

            ],

        ]);

        /**
         * Columns can be defined using the fluent syntax:
         * - CRUD::column('price')->type('number');
         */
    }

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(StudentRequest::class);
        //   CRUD::setFromDb(); // set fields from db columns.

        CRUD::addFields([
            [
                'name' => 'name',
                'type' => 'text',
                'label' => 'Student Name',
                'wrapper' => [
                    'class' => 'form-group col-md-4',
                ],
            ],
            [
                'name' => 'username',
                'type' => 'text',
                'label' => 'Username',
                'wrapper' => [
                    'class' => 'form-group col-md-4',
                ],
            ],

            [
                'name' => 'email',
                'type' => 'email',
                'label' => 'Email',
                'wrapper' => [
                    'class' => 'form-group col-md-4',
                ],
            ],
            [
                'name' => 'date',
                'type' => 'date',
                'label' => 'Date',
                'wrapper' => [
                    'class' => 'form-group col-md-4',
                ],
            ],
            [
                'label' => 'Gender',
                'type' => 'select',
                'name' => 'gender',
                'entity' => 'gender',
                'attribute' => 'name',
                'wrapper' => [
                    'class' => 'form-group col-md-4',
                ],
            ],
            [
                'name' => 'class',
                'type' => 'text',
                'label' => 'Class',
                'wrapper' => [
                    'class' => 'form-group col-md-4',
                ],
            ],

            [
                'name' => 'phonenumber',
                'type' => 'number',
                'label' => 'PhoneNumber',
                'wrapper' => [
                    'class' => 'form-group col-md-4',
                ],
            ],
            [
                'name' => 'image',
                'type' => 'upload',
                'label' => 'Image',
                'withFiles' => true,
                'wrapper' => [
                    'class' => 'form-group col-md-4',
                ],
            ],
            [
                'name' => 'address',
                'type' => 'text',
                'label' => 'address',
                'wrapper' => [
                    'class' => 'form-group col-md-4',
                ],
            ],
            [
                'name' => 'state_id',
                'label' => 'State',
                'type' => 'select',
                'entity' => 'state',
                'attribute' => 'name',
                'model' => 'App\Models\State',
                'wrapperAttributes' => [
                    'class' => 'form-group col-md-4',
                ],
                'attributes' => [
                    'id' => 'state_id',
                ],
            ],
            [
                'name' => 'district_id',
                'label' => trans('District'),
                'type' => 'select2_from_ajax',
                'entity' => 'districtentity',
                'attribute' => 'name',
                'model' => 'App\Models\District',
                'data_source' => url('api/districts/state_id'),
                'dependencies' => ['state_id'],
                'placeholder' => '- ',
                'minimum_input_length' => 0,
                'method' => 'POST',
                'wrapperAttributes' => [
                    'class' => 'form-group col-md-4',
                ],
                'include_all_form_fields' => true,

            ],
            [
                'name' => 'city_id',
                'label' => trans('City'),
                'type' => 'select2_from_ajax',
                'entity' => 'cityentity',
                'attribute' => 'name',
                'model' => 'App\Models\City',
                'data_source' => url('api/cities/district_id'),
                'dependencies' => ['district_id'],
                'placeholder' => ' - ',
                'minimum_input_length' => 0,
                'method' => 'POST',
                'wrapperAttributes' => [
                    'class' => 'form-group col-md-4',
                ],
                'include_all_form_fields' => true,
            ],

            [
                'label' => 'skill',
                'type' => 'select_multiple',
                'name' => 'skill_id',
                'entity' => 'skills',
                'model' => Skill::class,
                'attribute' => 'name',
                'pivot' => true,
                'wrapper' => [
                    'class' => 'form-group col-sm-4',
                ],
            ],

        ]);

        /**
         * Fields can be defined using the fluent syntax:
         * - CRUD::field('price')->type('number');
         */
    }

    /**
     * Define what happens when the Update operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }

    public function store(Request $request)
    {

        // dd($request);
        $student = Student::create([
            'name' => $request->input('name'),
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'date' => $request->input('date'),
            'gender_id' => $request->input('gender'),
            'image' => $request->input('image'),
            'class ' => $request->input('class'),
            'address' => $request->input('address'),
            'phonenumber' => $request->input('phonenumber'),
            'state_id' => $request->input('state_id'),
            'district_id' => $request->input('district_id'),
            'city_id' => $request->input('city_id'),
            // 'skill_id'=> skill::attach($request->input('skill_id')),

        ]);

        // Assuming 'skill_id' is an array of skill IDs
        $student->skills()->attach($request->input('skill_id'));

        return redirect('admin/student');
    }

    public function getSkillsListAttribute()
    {
        $skills = $this->skills->pluck('name')->toArray();
        dd($skills); // Check the output in your console
        return implode(' ', $skills);

    }

    public function update(Request $request)
    {
        $student = Student::find($request->id);
        // dd($request->all());
        // Update other fields of the student
        $student->update($request->all());

        // Update skills
        $skillIds = $request->input('skill_ids', $request->skill_id);
        // dd($skillIds);
        $student->skills()->sync($skillIds);

        return redirect('admin/student');

    }

    public function getDistricts(Request $request, $value)
    {
        $searchTerm = $request->input('q');
        $form = collect($request->input('form'))->pluck('value', 'name');

        $options = District::query();

        if (!data_get($form, $value)) {
            return [];
        }

        if (data_get($form, $value)) {
            $options->where('state_id', $form[$value]);
        }

        $paginationLimit = 10;
        $results = $searchTerm ? $options->searchByName($searchTerm)->paginate($paginationLimit) : $options->paginate($paginationLimit);

        return $results;

    }
    public function getCities(Request $request, $value)
    {
        $searchTerm = $request->input('q');
        $form = collect($request->input('form'))->pluck('value', 'name');

        $options = City::query();

        if (!data_get($form, $value)) {
            return [];
        }

        if (data_get($form, $value)) {
            $options->where('district_id', $form[$value]);
        }

        $paginationLimit = 10;
        $results = $searchTerm ? $options->searchByName($searchTerm)->paginate($paginationLimit) : $options->paginate($paginationLimit);

        return $results;

    }

    protected function setupShowOperation()
    {
        // MAYBE: do stuff before the autosetup

        // automatically add the columns
        $this->autoSetupShowOperation();

        // MAYBE: do stuff after the autosetup

        // for example, let's add some new columns
        CRUD::column([

            'name' => 'skill_id',
            'label' => 'Skills',
            'type' => 'model_function',
            'function_name' => 'get_skill',

        ]);

        // // or maybe remove a column
        // CRUD::column('text')->remove();



    }

}
