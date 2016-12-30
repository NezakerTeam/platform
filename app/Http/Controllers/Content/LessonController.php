<?php
namespace App\Http\Controllers\Content;

use App\Entities\Lesson;
use App\Entities\Repositories\GradeRepository;
use App\Entities\Repositories\LessonRepository;
use App\Entities\Repositories\StageRepository;
use App\Entities\Repositories\SubjectRepository;
use App\Forms\LessonForm;
use App\Http\Controllers\Controller;
use App\Post;
use App\Services\ContentService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\App;
use Illuminate\View\View;
use Kris\LaravelFormBuilder\Facades\FormBuilder;
use Kris\LaravelFormBuilder\FormBuilderTrait;
use LaravelDoctrine\ORM\Facades\EntityManager;
use Session;
use function redirect;
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
    public function index(LessonRepository $lessonRepo, StageRepository $stageRepo
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

    /**
     * Display a listing of the resource.
     *
     * @Get("/list-subjects", as="lesson.index.listSubjects"))
     * 
     * @return View
     */
    public function listSubjects(LessonRepository $lessonRepo, SubjectRepository $subjectRepo, Request $request)
    {

        $gradeId = (int) $request->get('gradeId', 0);
        $stageId = (int) $request->get('stageId', 0);

        $gradesIds = (empty($gradeId)) ? [] : [$gradeId];
        $stagesIds = (empty($stageId)) ? [] : [$stageId];

        $subjects = $subjectRepo->getAll($gradesIds, $stagesIds, true);
        $subjectsIds = array_column($subjects, 'id');

        $lessons = (empty($subjectsIds)) ? [] : $lessonRepo->getAll($subjectsIds, true);

        $data = [
            'stageId' => $stageId,
            'subjects' => $subjects,
            'lessons' => $lessons,
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
    public function listLessons(LessonRepository $lessonRepo, Request $request)
    {

        $subjectId = (int) $request->get('subjectId');
        $stageId = (int) $request->get('stageId');

        $lessons = $lessonRepo->getAll([$subjectId], true);

        $data = [
            'stageId' => $stageId,
            'lessons' => $lessons,
        ];

        return view('content.lesson._lessons_section', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @Get("/create", as="lesson.create")
     * @Middleware("auth")
     * 
     * @return View
     */
    public function create()
    {
        $form = FormBuilder::create(LessonForm::class, [
                'method' => 'POST',
                'url' => 'lesson/store'
        ]);

        return view('content.lesson.create', compact('form'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     *
     * @POST("/store", as="lesson.store")
     * @Middleware("auth")
     * 
     * @return RedirectResponse|Redirector
     */
    public function store(Request $request)
    {

        $form = $this->form(LessonForm::class);

        // Or automatically redirect on error. This will throw an HttpResponseException with redirect
        $form->redirectIfNotValid();

        $contentService = App::make(ContentService::class);
        $lesson = $contentService->addLesson($form->getFieldValues());

        Session::flash('flash_message', 'Lesson added!');

        return redirect(route('lesson.show', ['id' => $lesson->getId()]));
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return View
     */
    public function edit($id)
    {
        $post = Lesson::findOrFail($id);

        return view('content.lessons.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @param Request $request
     *
     * @return RedirectResponse|Redirector
     */
    public function update($id, Request $request)
    {

        $requestData = $request->all();

        $lesson = Post::findOrFail($id);
        $lesson->update($requestData);

        Session::flash('flash_message', 'Post updated!');

        return redirect(route('lesson.show', ['id' => $lesson->getId()]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return RedirectResponse|Redirector
     */
    public function destroy($id)
    {
        Post::destroy($id);

        Session::flash('flash_message', 'Post deleted!');

        return redirect(route('app.dashboard'));
    }
}
