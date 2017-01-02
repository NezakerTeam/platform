<?php
namespace App\Http\Controllers\Admin;

// VALIDATION: change the requests to match your own file names if you need form validation


use App\Http\Requests\ContentRequest as StoreRequest;
use App\Http\Requests\ContentRequest as UpdateRequest;
use App\Models\Lesson;
use App\Models\Subject;
use App\Models\User;
use Backpack\CRUD\app\Http\Controllers\CrudController;

class ContentCrudController extends CrudController
{

    public function setUp()
    {

        /*
          |--------------------------------------------------------------------------
          | BASIC CRUD INFORMATION
          |--------------------------------------------------------------------------
         */
        $this->crud->setModel("App\Models\Content");
        $this->crud->setRouteName('crud.content');
        $this->crud->setEntityNameStrings('content', 'contents');

        /*
          |--------------------------------------------------------------------------
          | BASIC CRUD INFORMATION
          |--------------------------------------------------------------------------
         */

        //$this->crud->setFromDb();

        $this->setupColumns();
        $this->setupFields();
        $this->setupFilters();
    }

    /**
     * Set the CRUD displayed columns
     * 
     * @return void
     */
    private function setupColumns()
    {
        // ------ CRUD columns
        $this->crud->addColumn([
            'label' => 'Lesson',
            'type' => 'select',
            'entity' => 'lesson',
            'attribute' => 'name',
        ]);

        $this->crud->addColumn([
            // run a function on the CRUD model and show its return value
            'label' => "status", // Table column heading
            'type' => "model_function",
            'function_name' => 'getStatusName', // the method in your Model
        ]);

        $this->crud->addColumn([
            'label' => 'Author',
            'type' => 'select',
            'name' => 'author_id',
            'entity' => 'author',
            'attribute' => 'name',
            'model' => User::class,
        ]);

        $this->crud->addColumn([
            'name' => 'material_url',
            'label' => 'Material URL',
            'type' => 'anchor',
        ]);

        $this->crud->addColumn([
            'name' => 'youtube_video_id', // the method in your Model
            'label' => 'Youtube video', // Table column heading
            'type' => 'youtube_video',
        ]);

        $this->crud->addColumn([
            'name' => 'created_at',
            'label' => 'Created At',
        ]);

        $this->crud->addColumn([
            'name' => 'updated_at',
            'label' => 'Updated At',
        ]);
    }

    /**
     * Set the CRUD add/edit fields
     * 
     * @return void
     */
    private function setupFields()
    {
        // ------ CRUD columns
        $this->crud->addField([// Select
            'label' => 'Lesson',
            'type' => 'select2',
            'name' => 'lesson_id', // the db column for the foreign key
            'entity' => 'lesson', // the method that defines the relationship in your Model
            'attribute' => 'name', // foreign key attribute that is shown to user
            'model' => Lesson::class // foreign key model
        ]);
        $this->crud->addField([
            'name' => 'material_url',
            'label' => 'Material Url',
            'type' => 'url'
        ]);
        $this->crud->addField([
            'name' => 'youtube_video_id',
            'label' => 'Youtube video id',
        ]);

        $this->crud->addField([
            'name' => 'status',
            'label' => 'Status',
            'type' => 'radio',
            'options' => \App\Models\Content::getStatusesList(),
            'allows_null' => false,
        ]);
    }

    /**
     * Set the CRUD filters
     * 
     * @return void
     */
    private function setupFilters()
    {
        $this->crud->addFilter([// select2 filter
            'name' => 'lesson_id',
            'type' => 'select2',
            'label' => 'Lesson'
            ], function() {
            return Lesson::all()->pluck('name', 'id')->toArray();
        });

        $this->crud->addFilter([// dropdown filter
            'name' => 'status',
            'type' => 'dropdown',
            'label' => 'Status'
            ], \App\Models\Content::getStatusesList()
        );
    }

    public function store(StoreRequest $request)
    {
        // your additional operations before save here
        $redirect_location = parent::storeCrud();
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }

    public function update(UpdateRequest $request)
    {
        // your additional operations before save here
        $redirect_location = parent::updateCrud();
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }
}
