<?php
namespace App\Http\Controllers\Admin;

// VALIDATION: change the requests to match your own file names if you need form validation


use App\Http\Requests\LessonRequest as StoreRequest;
use App\Http\Requests\LessonRequest as UpdateRequest;
use App\Models\Grade;
use App\Models\Lesson;
use App\Models\Stage;
use App\Models\Subject;
use Backpack\CRUD\app\Http\Controllers\CrudController;

class LessonCrudController extends CrudController
{

    public function setUp()
    {

        /*
          |--------------------------------------------------------------------------
          | BASIC CRUD INFORMATION
          |--------------------------------------------------------------------------
         */
        $this->crud->setModel(Lesson::class);
        //$this->crud->setRoute(config('backpack.base.route_prefix', 'admin') . '/lessons');
        $this->crud->setRouteName('crud.lesson');
        $this->crud->setEntityNameStrings('lesson', 'lessons');

        /*
          |--------------------------------------------------------------------------
          | BASIC CRUD INFORMATION
          |--------------------------------------------------------------------------
         */

        //$this->crud->setFromDb();

        $this->setupColumns();
        $this->setupFields();


//        $this->crud->addFilter([// dropdown filter
//            'name' => 'status',
//            'type' => 'dropdown',
//            'label' => 'Status'
//            ], [
//            1 => 'In stock',
//            2 => 'In provider stock',
//            3 => 'Available upon ordering',
//            4 => 'Not available',
//            ], function($value) { // if the filter is active
//            $this->crud->addClause('where', 'category_id', $value);
//        });
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
        //$this->crud->enableAjaxTable();
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

    /**
     * Set the CRUD displayed columns
     * 
     * @return void
     */
    private function setupColumns()
    {
        // ------ CRUD columns
        $this->crud->addColumn([
            'name' => 'name',
            'label' => 'Name',
        ]);

        $this->crud->addColumn([
            'label' => 'Subject',
            'type' => 'select',
            'entity' => 'subject',
            'attribute' => 'name',
        ]);

        $this->crud->addColumn([
            'label' => 'Grade',
            'type' => 'model_function_attribute',
            'function_name' => 'getGrade', // the method in your Model
            'attribute' => 'name'
        ]);

        $this->crud->addColumn([
            'label' => 'Stage',
            'type' => 'model_function_attribute',
            'function_name' => 'getStage', // the method in your Model
            'attribute' => 'name'
        ]);

        $this->crud->addColumn([
            // run a function on the CRUD model and show its return value
            'label' => 'Semester', // Table column heading
            'type' => 'model_function',
            'function_name' => 'getSemesterName', // the method in your Model
        ]);

        $this->crud->addColumn([
            // run a function on the CRUD model and show its return value
            'label' => "status", // Table column heading
            'type' => "model_function",
            'function_name' => 'getStatusName', // the method in your Model
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
        $this->crud->addField([
            'name' => 'name',
            'label' => 'Name',
        ]);
        $this->crud->addField([
            'name' => 'description',
            'label' => 'Description',
            'type' => 'textarea'
        ]);

        $this->crud->addField([// Select
            'label' => 'Stage',
            'type' => 'select_function',
            'name' => 'stage_id', // the db column for the foreign key
            'function' => 'getStageId', // the db column for the foreign key
            'entity' => 'stage', // the method that defines the relationship in your Model
            'attribute' => 'name', // foreign key attribute that is shown to user
            'model' => Stage::class, // foreign key model
            'empty_value' => 'Select',
            'attributes' => [
                'data-target-dependent-element-id' => 'grade-id'
            ]
        ]);

        $this->crud->addField([// Select
            'label' => 'Grade',
            'type' => 'select_function',
            'name' => 'grade_id', // the db column for the foreign key
            'function' => 'getGradeId', // the db column for the foreign key
            'entity' => 'grade', // the method that defines the relationship in your Model
            'attribute' => 'name', // foreign key attribute that is shown to user
            'model' => Grade::class, // foreign key model
            'empty_value' => 'Select',
            'dependentValue' => 'stage_id',
            'attributes' => [
                'id' => 'grade-id',
                'data-target-dependent-element-id' => 'subject-id'
            ],
        ]);

        $this->crud->addField([// Select
            'label' => 'Subject',
            'type' => 'select',
            'name' => 'subject_id', // the db column for the foreign key
            'entity' => 'subject', // the method that defines the relationship in your Model
            'attribute' => 'name', // foreign key attribute that is shown to user
            'model' => Subject::class, // foreign key model
            'empty_value' => 'Select',
            'dependentValue' => 'grade_id',
            'attributes' => ['id' => 'subject-id'],
        ]);

        $this->crud->addField([// select_from_array
            'name' => 'semester',
            'label' => 'Semester',
            'type' => 'select_from_array',
            'options' => Lesson::getSemestersList(),
            'value' => null,
            'allows_null' => false,
            // 'allows_multiple' => true, // OPTIONAL; needs you to cast this to array in your model;
        ]);
        $this->crud->addField([// select_from_array
            'name' => 'status',
            'label' => 'Status',
            'type' => 'select_from_array',
            'options' => Lesson::getStatusesList(),
            'value' => null,
            'allows_null' => false,
            // 'allows_multiple' => true, // OPTIONAL; needs you to cast this to array in your model;
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
