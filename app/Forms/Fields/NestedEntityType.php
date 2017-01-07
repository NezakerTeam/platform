<?php
namespace App\Forms\Fields;

class NestedEntityType extends \Kris\LaravelFormBuilder\Fields\EntityType
{

    protected function getTemplate()
    {
        return 'fields.nested_entity';
    }
}
