<?php
namespace App\Http\Controllers\Api;

/**
 * @Resource("Content")
 */
class ContentController extends \App\Http\Controllers\Api\BaseApiController
{

    /**
     * Show all stages
     *
     * Get a JSON representation of all the active stages.
     *
     * @Get("/stages")
     * @Response(200, body={"id": 10, "name": "foo"})
     */
    public function stages()
    {
        $stages = \App\Models\Repositories\StageRepository::getAll(true);

        return $this->response->collection($stages, new \App\Transformers\Api\StageTransformer());
    }

    /**
     * Show all grades
     *
     * Get a JSON representation of all the active grades.
     *
     * @Get("/grades/{stageId}")
     * @Response(200, body={"id": 10, "name": "foo"})
     */
    public function grades($stageId)
    {
        $grades = \App\Models\Repositories\GradeRepository::getAll([$stageId], true, -1, -1);

        return $this->response->collection($grades, new \App\Transformers\Api\GradeTransformer());
    }

    /**
     * Show all subjects
     *
     * Get a JSON representation of all the active subjects.
     *
     * @Get("/subjects/{gradeId}")
     * @Response(200, body={"id": 10, "name": "foo"})
     */
    public function subjects($gradeId)
    {
        $subjects = \App\Models\Repositories\SubjectRepository::getAll([$gradeId], [], true, -1, -1);

        return $this->response->collection($subjects, new \App\Transformers\Api\SubjectTransformer());
    }

    /**
     * Show all lessons
     *
     * Get a JSON representation of all the active lessons.
     *
     * @Get("/lessons/{subjectId}")
     * @Response(200, body={"id": 10, "name": "foo"})
     */
    public function lessons($subjectId)
    {
        $lessons = \App\Models\Repositories\LessonRepository::getAll([$subjectId], [], [], true, -1, -1);

        return $this->response->collection($lessons, new \App\Transformers\Api\LessonTransformer());
    }

    /**
     * Show all videos
     *
     * Get a JSON representation of all the active videos.
     *
     * @Get("/videos/{lessonId}")
     * @Response(200, body={"id": 10, "lessonName":"foo", "youtubeVideoId":"RbaW-WTsVTk", "author":{"name":"Islam Ibrahim"}, "status":"Approved"})
     */
    public function videos($lessonId)
    {
        $contents = \App\Models\Repositories\ContentRepository::getAll([$lessonId], true, -1, -1);

        return $this->response->collection($contents, new \App\Transformers\Api\ContentTransformer());
    }
}
