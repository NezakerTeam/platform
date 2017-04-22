<?php
namespace App\Transformers\Api;

class SubjectTransformer extends \League\Fractal\TransformerAbstract
{

    public function transform(\App\Models\Subject $subject)
    {
        return [
            'id'   => $subject->id,
            'name' => $subject->name,
        ];
    }
}
