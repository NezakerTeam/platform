<?php
namespace App\Forms\Fields;

class NestedSelectType extends \Kris\LaravelFormBuilder\Fields\EntityType
{

    protected function getTemplate()
    {
        return 'fields.nested_select';
    }
}
