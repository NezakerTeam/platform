<?php
namespace App\Http\Controllers\Content;

use App\Models\Lesson;
use App\Models\Repositories\ContentRepository;
use App\Models\Repositories\GradeRepository;
use App\Models\Repositories\LessonRepository;
use App\Models\Repositories\StageRepository;
use App\Models\Repositories\SubjectRepository;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Kris\LaravelFormBuilder\FormBuilderTrait;
use LaravelDoctrine\ORM\Facades\EntityManager;
use function view;

/**
 * @Controller(prefix="lesson")
 * @Middleware("web")
 */
class LessonController extends Controller
{

    use FormBuilderTrait;

    /**
     * Display a listing of the resource.
     *
     * @Get("", as="lesson.all")
     * 
     * @return View
     */
    public function index()
    {
        $stages = StageRepository::getAll(true);

        $grades = $gradesIds = $subjects = $lessons = $contents = [];

        foreach ($stages as $stage) {
            $stageId = $stage->getId();
            $grades[$stageId] = GradeRepository::getAll([$stageId], true);
            $gradesIds = array_pluck($grades[$stageId], 'id');

            $subjects[$stageId] = (empty($gradesIds)) ? [] : SubjectRepository::getAll($gradesIds, true);
            $subjectsIds = array_pluck($subjects[$stageId], 'id');

            $lessons[$stageId] = (empty($subjectsIds)) ? [] : LessonRepository::getAll($subjectsIds, true);
            $lessonsIds = array_pluck($lessons[$stageId], 'id');

            $contents[$stageId] = (empty($lessonsIds)) ? [] : ContentRepository::getAll($lessonsIds, true);
        }

        $data = [
            'stages' => $stages,
            'grades' => $grades,
            'subjects' => $subjects,
            'lessons' => $lessons,
            'contents' => $contents,
        ];

        return view('content.lesson.index', $data);
    }

    /**
     * Display a listing of the resource.
     *
     * @Get("/list-subjects", as="lesson.index.listSubjects"))
     * 
     * @return View
     */
    public function listSubjects(Request $request)
    {
        $gradeId = (int) $request->get('gradeId', 0);
        $stageId = (int) $request->get('stageId', 0);

        $gradesIds = (empty($gradeId)) ? [] : [$gradeId];

        $subjects = SubjectRepository::getAll($gradesIds, true);
        $subjectsIds = array_pluck($subjects, 'id');

        $lessons = (empty($subjectsIds)) ? [] : LessonRepository::getAll($subjectsIds, true);
        $lessonsIds = array_pluck($lessons, 'id');

        $contents = (empty($lessonsIds)) ? [] : ContentRepository::getAll($lessonsIds, true);

        $data = [
            'stageId' => $stageId,
            'subjects' => $subjects,
            'lessons' => $lessons,
            'contents' => $contents,
        ];

        return view('content.lesson._subjects_section', $data);
    }

    /**
     * Display a listing of the resource.
     *
     * @Get("/list-lessons", as="lesson.index.listLessons"))
     * 
     * @return View
     */
    public function listLessons(Request $request)
    {

        $subjectId = (int) $request->get('subjectId', 0);
        $stageId = (int) $request->get('stageId', 0);

        $subjectIds = (empty($subjectId)) ? [] : [$subjectId];

        $lessons = LessonRepository::getAll($subjectIds, true);
        $lessonsIds = array_pluck($lessons, 'id');

        $contents = (empty($lessonsIds)) ? [] : ContentRepository::getAll($lessonsIds, true);

        $data = [
            'stageId' => $stageId,
            'lessons' => $lessons,
            'contents' => $contents,
        ];

        return view('content.lesson._lessons_section', $data);
    }

    /**
     * Display the specified resource.
     *
     * @Get("/{id}", as="lesson.show", where={"id": "[0-9]+"})
     * 
     * @param  int  $id
     *
     * @return View
     */
    public function show($lessonId)
    {
        $lesson = EntityManager::getRepository(Lesson::class)->findById($lessonId);

        return view('content.lesson.show', compact('lesson'));
    }
}
