<?php
namespace App\Transformers\Api;

class LessonTransformer extends \League\Fractal\TransformerAbstract
{

    public function transform(\App\Models\Lesson $lesson)
    {
        return [
            'id'   => $lesson->id,
            'name' => $lesson->name,
        ];
    }
}
