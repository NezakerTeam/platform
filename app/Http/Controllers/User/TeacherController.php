<?php
namespace App\Http\Controllers\User;

use App\Entities\Repositories\GradeRepository;
use App\Entities\Repositories\LessonRepository;
use App\Entities\Repositories\StageRepository;
use App\Entities\Repositories\SubjectRepository;
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
    public function myCourses(LessonRepository $lessonRepo, StageRepository $stageRepo
    , GradeRepository $gradeRepo, SubjectRepository $subjectRepo)
    {
        $stages = $stageRepo->getAll(true);
        $grades = $gradesIds = $subjects = $lessons = [];

        foreach ($stages as $stage) {
            $stageId = $stage->getId();
            $grades[$stageId] = $gradeRepo->getAll([$stageId], true);
            $gradesIds = array_column($grades[$stageId], 'id');

            $subjects[$stageId] = (empty($gradesIds)) ? [] : $subjectRepo->getAll($gradesIds, [], true);
            $subjectsIds = array_column($subjects[$stageId], 'id');

            $lessons[$stageId] = (empty($subjectsIds)) ? [] : $lessonRepo->getAll($subjectsIds, true);
        }

        $data = [
            'stages' => $stages,
            'grades' => $grades,
            'subjects' => $subjects,
            'lessons' => $lessons,
        ];

        return view('content.lesson.index', $data);
    }
}
