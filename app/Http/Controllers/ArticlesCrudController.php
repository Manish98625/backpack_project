<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticlesRequest;
use App\Models\DetailRow;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class ArticlesCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ArticlesCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Articles::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/articles');
        CRUD::setEntityNameStrings('articles', 'articles');

     

    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::setFromDb(); // set columns from db columns.

        CRUD::setColumns([
            [
                'name' => 'name',
                'type' => 'text',
                'label' => 'News',
            ],
            [
                'name' => 'slug',
                'type' => 'text',
                'label' => 'slug',
            ],
            [
                'name' => 'date',
                'type' => 'date',
                'type' => 'Date',
            ],
            [
                'name' => 'description',
                'label' => 'Description',
                'type' => 'summernote',
            ],
            [
                'name' => 'image',
                'label' => 'Image',
                'type' => 'upload',
                'disk' => 'public',
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
        CRUD::setValidation(ArticlesRequest::class);
        CRUD::setFromDb(); // set fields from db columns.

        CRUD::addFields([
            [
                'name' => 'name',
                'type' => 'text',
                'label' => 'Title',

            ],
            [
                'name' => 'slug',
                'target' => 'name',
                'type' => 'text',
                'label' => 'Slug Url',

                'hint' => 'Will be automatically generated from your title, if left empty.',
            ],
            [
                'name' => 'date',
                'type' => 'date',
                'type' => 'Date',
            ],
            [
                'name' => 'description',
                'label' => 'Description',
                'type' => 'summernote',
            ],
            [
                'name' => 'image',
                'label' => 'Image',
                'type' => 'upload',
                'withFiles' => true,
            ],

            [
                // radio
                'name' => 'is_eligible', // the name of the db column
                'label' => 'eligible', // the input label
                'type' => 'checkbox',

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

//     protected function showDetailsRow($id)
//     {

//         // Fetch the model from the database based on the provided ID
//         $model = DetailRow::findOrFail($id);

// // Pass the model data to a view for rendering
//         return view('detail_row', ['DetailRow' => $model]);

//     }

}
