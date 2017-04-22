<?php
namespace App\Transformers\Api;

class GradeTransformer extends \League\Fractal\TransformerAbstract
{

    public function transform(\App\Models\Grade $grade)
    {
        return [
            'id'   => $grade->id,
            'name' => $grade->name,
        ];
    }
}
