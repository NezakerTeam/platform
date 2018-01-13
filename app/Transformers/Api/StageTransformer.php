<?php
namespace App\Transformers\Api;

class StageTransformer extends \League\Fractal\TransformerAbstract
{

    public function transform(\App\Models\Stage $stage)
    {
        return [
            'id'   => $stage->id,
            'name' => $stage->name,
        ];
    }
}
