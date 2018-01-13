<?php
namespace App\Http\Controllers\Admin;

// VALIDATION: change the requests to match your own file names if you need form validation


use App\Http\Requests\UserRequest as StoreRequest;
use App\Http\Requests\UserRequest as UpdateRequest;
use App\Models\Grade;
use App\Models\Repositories\CityRepository;
use App\Models\Stage;
use App\Models\Subject;
use App\Models\User;
use Backpack\CRUD\app\Http\Controllers\CrudController;

class UserCrudController extends CrudController
{

    public function setUp()
    {

        /*
          |--------------------------------------------------------------------------
          | BASIC CRUD INFORMATION
          |--------------------------------------------------------------------------
         */
        $this->crud->setModel(User::class);
        $this->crud->setRouteName('crud.user');
        $this->crud->setEntityNameStrings('user', 'users');

        /*
          |--------------------------------------------------------------------------
          | BASIC CRUD INFORMATION
          |--------------------------------------------------------------------------
         */

        //$this->crud->setFromDb();

        $this->setupColumns();
        $this->setupFields();

        // ------ CRUD FIELDS
        // $this->crud->addField($options, 'update/create/both');
        // $this->crud->addFields($array_of_arrays, 'update/create/both');
        // $this->crud->removeField('name', 'update/create/both');
        // $this->crud->removeFields($array_of_names, 'update/create/both');
        // ------ CRUD COLUMNS
        // $this->crud->addColumn(); // add a single column, at the end of the stack
        // $this->crud->addColumns(); // add multiple columns, at the end of the stack
        // $this->crud->removeColumn('column_name'); // remove a column from the stack
        // $this->crud->removeColumns(['column_name_1', 'column_name_2']); // remove an array of columns from the stack
        // $this->crud->setColumnDetails('column_name', ['attribute' => 'value']); // adjusts the properties of the passed in column (by name)
        // $this->crud->setColumnsDetails(['column_1', 'column_2'], ['attribute' => 'value']);
        // ------ CRUD BUTTONS
        // possible positions: 'beginning' and 'end'; defaults to 'beginning' for the 'line' stack, 'end' for the others;
        // $this->crud->addButton($stack, $name, $type, $content, $position); // add a button; possible types are: view, model_function
        // $this->crud->addButtonFromModelFunction($stack, $name, $model_function_name, $position); // add a button whose HTML is returned by a method in the CRUD model
        // $this->crud->addButtonFromView($stack, $name, $view, $position); // add a button whose HTML is in a view placed at resources\views\vendor\backpack\crud\buttons
        // $this->crud->removeButton($name);
        // $this->crud->removeButtonFromStack($name, $stack);
        // ------ CRUD ACCESS
        // $this->crud->allowAccess(['list', 'create', 'update', 'reorder', 'delete']);
        // $this->crud->denyAccess(['list', 'create', 'update', 'reorder', 'delete']);
        // ------ CRUD REORDER
        // $this->crud->enableReorder('label_name', MAX_TREE_LEVEL);
        // NOTE: you also need to do allow access to the right users: $this->crud->allowAccess('reorder');
        // ------ CRUD DETAILS ROW
        // $this->crud->enableDetailsRow();
        // NOTE: you also need to do allow access to the right users: $this->crud->allowAccess('details_row');
        // NOTE: you also need to do overwrite the showDetailsRow($id) method in your EntityCrudController to show whatever you'd like in the details row OR overwrite the views/backpack/crud/details_row.blade.php
        // ------ REVISIONS
        // You also need to use \Venturecraft\Revisionable\RevisionableTrait;
        // Please check out: https://laravel-backpack.readme.io/docs/crud#revisions
        // $this->crud->allowAccess('revisions');
        // ------ AJAX TABLE VIEW
        // Please note the drawbacks of this though:
        // - 1-n and n-n columns are not searchable
        // - date and datetime columns won't be sortable anymore
        // $this->crud->enableAjaxTable();
        // ------ DATATABLE EXPORT BUTTONS
        // Show export to PDF, CSV, XLS and Print buttons on the table view.
        // Does not work well with AJAX datatables.
        // $this->crud->enableExportButtons();
        // ------ ADVANCED QUERIES
        // $this->crud->addClause('active');
        // $this->crud->addClause('type', 'car');
        // $this->crud->addClause('where', 'name', '==', 'car');
        // $this->crud->addClause('whereName', 'car');
        // $this->crud->addClause('whereHas', 'posts', function($query) {
        //     $query->activePosts();
        // });
        // $this->crud->with(); // eager load relationships
        // $this->crud->orderBy();
        // $this->crud->groupBy();
        // $this->crud->limit();
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

    private function setupColumns()
    {
        // ------ CRUD columns
        $this->crud->addColumn([
            'name'  => 'name',
            'label' => 'Name',
        ]);

        $this->crud->addColumn([
            'name'  => 'email',
            'label' => 'Email',
        ]);

        $this->crud->addColumn([
            'name'  => 'phone_numbers',
            'label' => 'Phone Numbers',
        ]);

//        $this->crud->addColumn([
//            'name'  => 'type',
//            'label' => 'Type',
//        ]);


        $this->crud->addColumn([
            // run a function on the CRUD model and show its return value
            'label'         => 'status', // Table column heading
            'type'          => 'model_function',
            'function_name' => 'getStatusName', // the method in your Model
        ]);


        $this->crud->addColumn([
            'label'         => 'City', // Table column heading
            'type'          => 'model_function_attribute',
            'function_name' => 'getCity', // the method in your Model
            'attribute'     => 'name'
        ]);

        return;
    }

    /**
     * Set the CRUD add/edit fields
     * 
     * @return void
     */
    private function setupFields()
    {
        // ------ CRUD columns
        $this->crud->addField([
            'name'  => 'first_name',
            'label' => 'First Name',
        ]);
        $this->crud->addField([
            'name'  => 'last_name',
            'label' => 'Last Name',
        ]);
        $this->crud->addField([
            'name'  => 'email',
            'label' => 'Email',
        ]);

//        $this->crud->addField([
//            // Table
//            'name'            => 'phone_numbers',
//            'label'           => 'Phone Numbers',
//            'type'            => 'table',
//            'entity_singular' => 'phone number', // used on the "Add X" button
//            'columns'         => [
//                                 ],
//            'max'             => 5, // maximum rows allowed in the table
//            'min'             => 0 // minimum rows allowed in the table
//        ]);

        $this->crud->addField([// select_from_array
            'name'        => 'city_id',
            'label'       => 'City',
            'type'        => 'select_from_array',
            'options'     => CityRepository::getAll()->pluck('name', 'id'),
            'value'       => null,
            'allows_null' => false,
            // 'allows_multiple' => true, // OPTIONAL; needs you to cast this to array in your model;
        ]);

        $this->crud->addField([// select_from_array
            'name'        => 'status',
            'label'       => 'Status',
            'type'        => 'select_from_array',
            'options'     => User::getStatusesList(),
            'value'       => null,
            'allows_null' => false,
            // 'allows_multiple' => true, // OPTIONAL; needs you to cast this to array in your model;
        ]);
    }
}
