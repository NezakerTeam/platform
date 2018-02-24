<?php
namespace App\Http\Controllers\Admin;

// VALIDATION: change the requests to match your own file names if you need form validation


use App\Http\Requests\ContentRequest as StoreRequest;
use App\Http\Requests\ContentRequest as UpdateRequest;
use App\Models\Assessment;
use Backpack\CRUD\app\Http\Controllers\CrudController;

class AssessmentCrudController extends CrudController
{

    public function setUp()
    {

        /*
          |--------------------------------------------------------------------------
          | BASIC CRUD INFORMATION
          |--------------------------------------------------------------------------
         */
        $this->crud->setModel(Assessment::class);
        $this->crud->setRouteName('crud.assessment');
        $this->crud->setEntityNameStrings('assessment', 'assessments');

        /*
          |--------------------------------------------------------------------------
          | BASIC CRUD INFORMATION
          |--------------------------------------------------------------------------
         */

        //$this->crud->setFromDb();

        $this->setupColumns();
        $this->setupFields();
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
            'name'  => 'link',
            'label' => 'Link',
            'type'  => 'AssessmentCrudController',
        ]);

        $this->crud->addColumn([
            'name'  => 'age_from',
            'label' => 'From Age',
            'type'  => 'number',
        ]);

        $this->crud->addColumn([
            'name'  => 'age_to',
            'label' => 'To Age',
            'type'  => 'number',
        ]);
    }

    /**
     * Set the CRUD add/edit fields
     * 
     * @return void
     */
    private function setupFields()
    {
        $this->crud->addField([
            'name'  => 'link', // the db column for the foreign key
            'label' => 'Link',
            'type'  => 'url',
        ]);

        $this->crud->addField([
            'name'  => 'age_from',
            'label' => 'From Age',
            'type'  => 'number',
        ]);

        $this->crud->addField([
            'name'  => 'age_to',
            'label' => 'To Age',
            'type'  => 'number',
        ]);
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
