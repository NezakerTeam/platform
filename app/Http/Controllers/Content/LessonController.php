<?php
namespace App\Http\Controllers\Content;

use App\Entities\Lesson;
use App\Forms\LessonForm;
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
 * @Controller(prefix="lesson")
 */
class LessonController extends Controller
{

    use FormBuilderTrait;

    /**
     * Display a listing of the resource.
     *
     * @Get("", as="profiles.show")
     * 
     * @return View
     */
    public function index()
    {
        $posts = EntityManager::getRepository(Lesson::class)->findAll();


        return view('content.lesson.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        $form = FormBuilder::create('App\Forms\LessonForm', [
                'method' => 'POST',
                'url' => 'lesson/posts'
        ]);

        return view('content.lesson.create', compact('form'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
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

        Session::flash('flash_message', 'Post added!');

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

        return view('content.posts.show', compact('post'));
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
        $post = Post::findOrFail($id);

        return view('content.posts.edit', compact('post'));
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

        $post = Post::findOrFail($id);
        $post->update($requestData);

        Session::flash('flash_message', 'Post updated!');

        return redirect('lesson/posts');
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

        return redirect('lesson/posts');
    }
}
