<?php
namespace App\Http\Controllers\Api;

class ContentController extends \App\Http\Controllers\Api\BaseApiController
{

    public function stages()
    {
        $stages = \App\Models\Repositories\StageRepository::getAll(true);

        return $this->response->collection($stages, new \App\Transformers\Api\StageTransformer());
    }

    public function grades($stageId)
    {
        $grades = \App\Models\Repositories\GradeRepository::getAll([$stageId], true);

        return $this->response->collection($grades, new \App\Transformers\Api\GradeTransformer());
    }

    public function subjects($gradeId)
    {
        $subjects = \App\Models\Repositories\SubjectRepository::getAll([$gradeId], [], true);

        return $this->response->collection($subjects, new \App\Transformers\Api\SubjectTransformer());
    }

    public function lessons($subjectId)
    {
        $lessons = \App\Models\Repositories\LessonRepository::getAll([$subjectId], [], [], true);

        return $this->response->collection($lessons, new \App\Transformers\Api\LessonTransformer());
    }

    public function videos($lessonId)
    {
        $contents = \App\Models\Repositories\ContentRepository::getAll([$lessonId], [], [], true);

        return $this->response->collection($contents, new \App\Transformers\Api\ContentTransformer());
    }
}
