<?php
namespace App\Transformers\Api;

class ContentTransformer extends \League\Fractal\TransformerAbstract
{

    public function transform(\App\Models\Content $content)
    {
        return [
            'id'             => $content->id,
            'lessonName'     => $content->getLesson()->getName(),
            'youtubeVideoId' => $content->getYoutubeVideoId(),
            'author'         => [
                'name' => $content->getAuthor()->getName()
            ],
            'status'         => $content->getStatusName(),
        ];
    }
}
