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

        $stages    = $grades    = $gradesIds = $subjects  = $lessons   = $contents  = [];

        $stages    = StageRepository::getAll(true, -1, -1);
        $stagesIds = array_pluck($stages, 'id');

        $grades    = GradeRepository::getAll($stagesIds, true, -1, -1);
        $gradesIds = array_pluck($grades, 'id');

        $subjects    = (empty($gradesIds)) ? [] : SubjectRepository::getAll($gradesIds, [], true, -1, -1);
        $subjectsIds = array_pluck($subjects, 'id');

        $lessons    = (empty($subjectsIds)) ? [] : LessonRepository::getAll($subjectsIds, [], [], true, -1, -1);
        $lessonsIds = array_pluck($lessons, 'id');

        $contents = (empty($lessonsIds)) ? [] : ContentRepository::getAll($lessonsIds, true, -1, -1);

        $data = [
            'stages'   => $stages,
            'grades'   => $grades,
            'subjects' => [],
            'lessons'  => $lessons,
            'contents' => $contents,
        ];

        //dd($data);
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

        $stagesId  = (empty($stageId)) ? [] : [$stageId];
        $gradesIds = (empty($gradeId)) ? [] : [$gradeId];

        $subjects    = SubjectRepository::getAll($gradesIds, $stagesId, true);
        $subjectsIds = array_pluck($subjects, 'id');

        $lessons    = (empty($subjectsIds)) ? [] : LessonRepository::getAll($subjectsIds, [], [], true, -1, -1);
        $lessonsIds = array_pluck($lessons, 'id');

        $contents = (empty($lessonsIds)) ? [] : ContentRepository::getAll($lessonsIds, true, -1, -1);

        $data = [
            'stageId'  => $stageId,
            'gradeId'  => $gradeId,
            'subjects' => $subjects,
            'lessons'  => $lessons,
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
        $stageId   = (int) $request->get('stageId', 0);
        $gradeId   = (int) $request->get('gradeId', 0);
        $subjectId = (int) $request->get('subjectId', 0);

        $stagesIds  = (empty($stageId)) ? [] : [$stageId];
        $gradesIds  = (empty($gradeId)) ? [] : [$gradeId];
        $subjectIds = (empty($subjectId)) ? [] : [$subjectId];

        $lessons    = LessonRepository::getAll($subjectIds, $gradesIds, $stagesIds, true, -1, -1);
        $lessonsIds = array_pluck($lessons, 'id');

        $contents = (empty($lessonsIds)) ? [] : ContentRepository::getAll($lessonsIds, true, -1, -1);

        $data = [
            'stageId'  => $stageId,
            'lessons'  => $lessons,
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
        
    }
}
