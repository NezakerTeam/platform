<?php
namespace Admin\Http\Controllers\Content;

use App\Entities\Lesson;
use Admin\Forms\LessonForm;
use App\Http\Controllers\Controller;
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
 * @Controller(prefix="/old_admin/lesson")
 * @Middleware("web")
 * @Middleware("auth")
 */
class LessonController extends Controller
{

    use FormBuilderTrait;

    /**
     * Display a listing of the resource.
     *
     * @Get("", as="admin.lesson.all")
     * 
     * @return View
     */
    public function index()
    {
        $lessons = EntityManager::getRepository(Lesson::class)->findAll();


        return view('admin::content.lesson.index', compact('lessons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @Get("/create", as="admin.lesson.create")
     *  
     * @return View
     */
    public function create()
    {
        $form = FormBuilder::create(LessonForm::class, [
                'method' => 'POST',
                'url' => route('admin.lesson.store')
        ]);

        return view('admin::content.lesson.create', compact('form'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     *
     * @POST("/store", as="admin.lesson.store")
     * 
     * @return RedirectResponse|Redirector
     */
    public function store(Request $request)
    {
        $form = $this->form(LessonForm::class);

        // Or automatically redirect on error. This will throw an HttpResponseException with redirect
        $form->redirectIfNotValid();

        $contentService = App::make(ContentService::class);
        $lesson = $contentService->addContent($form->getFieldValues());

        Session::flash('flash_message', 'Lesson added!');

        return redirect('lesson/posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return View
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);

        return view('admin::content.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @Get("/edit/{id}", as="admin.lesson.edit", where={"id": "[0-9]+"})
     * 
     * @param  int  $lessonId   The lesson id to be edited
     *
     * @return View
     */
    public function edit($lessonId)
    {
        $lesson = EntityManager::getRepository(Lesson::class)->findById($lessonId);

        $form = FormBuilder::create(LessonForm::class, [
                'method' => 'PATCH',
                'url' => route('admin.lesson.update', [$lesson->getId()]),
                'model' => $lesson
                ], [
                'isEdit' => true
                ]
        );

        return view('admin::content.lesson.edit', compact('lesson', 'form'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @Patch("/{id}", as="admin.lesson.update", where={"id": "[0-9]+"})
     * 
     * @param int     $lessonId
     * @param Request $request
     *
     * @return RedirectResponse|Redirector
     */
    public function update($lessonId, Request $request)
    {
        $form = $this->form(LessonForm::class, [], ['isEdit' => true]);

        // Or automatically redirect on error. This will throw an HttpResponseException with redirect
        $form->redirectIfNotValid();

        $lesson = EntityManager::getRepository(Lesson::class)->findById($lessonId);

        $contentService = App::make(ContentService::class);
        $lesson = $contentService->editLesson($lesson, $form->getFieldValues());

        Session::flash('flash_message', 'Lesson updated!');

        return redirect(route('admin.lesson.all'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @Delete("/{id}", as="admin.lesson.delete", where={"id": "[0-9]+"})
     * 
     * @param  int  $id
     *
     * @return RedirectResponse|Redirector
     */
    public function destroy($id)
    {
        Post::destroy($id);

        Session::flash('flash_message', 'Post deleted!');

        return redirect('lesson/posts');
    }
}
