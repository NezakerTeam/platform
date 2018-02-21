<?php
namespace App\Http\Controllers\User;

use App\Models\Repositories\ContentRepository;
use App\Models\Repositories\GradeRepository;
use App\Models\Repositories\LessonRepository;
use App\Models\Repositories\StageRepository;
use App\Models\Repositories\SubjectRepository;
use App\Http\Controllers\Controller;
use Illuminate\View\View;
use Kris\LaravelFormBuilder\FormBuilderTrait;
use function view;

/**
 * @Controller(prefix="teacher")
 * @Middleware("web")
 * @Middleware("auth")
 */
class TeacherController extends Controller
{

    use FormBuilderTrait;

    /**
     * Display a listing of the resource.
     *
     * @Get("/my-courses", as="teacher.myCourses")
     * 
     * @return View
     */
    public function myCourses()
    {
        $stages    = StageRepository::getAll(true);
        $grades    = $gradesIds = $subjects  = $lessons   = $contents  = [];

        foreach ($stages as $stage) {
            $stageId          = $stage->getId();
            $grades[$stageId] = GradeRepository::getAll([$stageId], true);
            $gradesIds        = array_pluck($grades[$stageId], 'id');

            $subjects[$stageId] = (empty($gradesIds)) ? [] : SubjectRepository::getAll($gradesIds, [], true);
            $subjectsIds        = array_pluck($subjects[$stageId], 'id');

            $lessons[$stageId] = (empty($subjectsIds)) ? [] : LessonRepository::getAll($subjectsIds, [], [], true);
            $lessonsIds        = array_pluck($lessons[$stageId], 'id');

            $contents[$stageId] = (empty($lessonsIds)) ? [] : ContentRepository::getAll($lessonsIds, true);
        }

        $data = [
            'stages'   => $stages,
            'grades'   => $grades,
            'subjects' => $subjects,
            'lessons'  => $lessons,
            'contents' => $contents,
        ];

        return view('content.lesson.index', $data);
    }
}
