<?php

namespace App\Http\Controllers;
use DB;
use App\Http\Requests\AppsettingRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class AppsettingCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class AppsettingCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Appsetting::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/appsetting');
        CRUD::setEntityNameStrings('appsetting', 'appsettings');
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */

    protected function setupCreateOperation()
    {
        CRUD::setValidation(AppSettingRequest::class);

        Crud::addField([
            // $this->addClientIdField(),
            [ // CustomHTML
                'name' => 'fieldset_open',
                'type' => 'custom_html',
                'value' => '<fieldset>',
            ],
            [
                'name' => 'legend1',
                'type' => 'custom_html',
                'value' => '<b><legend>कार्यलय विवरण :</legend></b>',
            ],

            [
                'name' => 'code',
                'label' => trans('common.code'),
                'type' => 'text',
                'wrapper' => [
                    'class' => 'form-group col-md-4',
                ],
            ],
            [
                'type' => 'custom_html',
                'name' => 'plain_html_1',
                'value' => '<br>',
            ],

            [
                'name' => 'legend12',
                'type' => 'custom_html',
                'value' => '<b><legend>पत्रको शिर्षक:</legend></b>',
            ],
            [
                'name' => 'div_1-0',
                'type' => 'plain_html',
                'value' => '<div class="row shakti col-md-12">',
            ],
            [
                'name' => 'div_1-2',
                'type' => 'plain_html',
                'value' => '<div class="col-md-6">',
            ],
            [
                'name' => 'letter_head_title_1',
                'label' => trans('common.title1'),
                'type' => 'text',
            ],
            [
                'name' => 'letter_head_title_2',
                'label' => trans('common.title2'),
                'type' => 'text',
            ],
            [
                'name' => 'letter_head_title_3',
                'label' => trans('common.title3'),
                'type' => 'text',
            ],

            [
                'name' => 'div_1-2_close',
                'type' => 'plain_html',
                'value' => '</div>',
            ],
            [
                'name' => 'div_1-2a',
                'type' => 'plain_html',
                'value' => '<div class="col-md-6">',
            ],
            [
                'name' => 'div_1-2ac',
                'type' => 'plain_html',
                'value' => '<div class="col-md-12">
                <style>
                    .head-address{
                        text-align: center;
                    }
                </style>
                <h3 class="head-address" style="color:red; margin-left:30px;text-decoration: underline">
                <span id="">पत्र शिर्षकको नमुना </span>
                </h3>
                <br/>
                <h2 class="head-address" id="letter_head_title_label">
                    <span id="letter_head_title_1_label">-</span><br/>
                    <span style="font-size: 18px;" id="letter_head_title_2_label">-</span><br/>
                    <span style="font-size: 18px;" id="letter_head_title_3_label">-</span><br/>
                </h2>
                </div>',
            ],
            [
                'name' => 'div_1-2a_close',
                'type' => 'plain_html',
                'value' => '</div>',
            ],

            [
                'name' => 'div_1-0_close',
                'type' => 'plain_html',
                'value' => '</div>',
            ],

        ]);

    }




}
