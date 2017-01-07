<?php
namespace App\Http\Controllers\Content;

use App\Models\Lesson;
use App\Models\Repositories\GradeRepository;
use App\Models\Repositories\LessonRepository;
use App\Models\Repositories\StageRepository;
use App\Models\Repositories\SubjectRepository;
use App\Forms\ContentForm;
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
use Session;
use function redirect;
use function view;

/**
 * @Controller(prefix="content")
 * @Middleware("web")
 */
class ContentController extends Controller
{

    use FormBuilderTrait;

    /**
     * Show the form for creating a new resource.
     *
     * @Get("/create", as="content.create")
     * @Middleware("auth")
     * 
     * @return View
     */
    public function create()
    {
        $form = FormBuilder::create(ContentForm::class, [
                'method' => 'POST',
                'url' => route('content.store')
        ]);

        return view('content.video.create', compact('form'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     *
     * @POST("/store", as="content.store")
     * @Middleware("auth")
     * 
     * @return RedirectResponse|Redirector
     */
    public function store(Request $request, ContentService $contentService)
    {

        $form = $this->form(ContentForm::class);

        // Or automatically redirect on error. This will throw an HttpResponseException with redirect
        $form->redirectIfNotValid();

        $lesson = $contentService->addContent($form->getFieldValues());

        Session::flash('flash_message', 'Lesson added!');

        return redirect(route('content.show', ['id' => $lesson->getId()]));
    }

    /**
     * Display the specified resource.
     *
     * @Get("/{id}", as="content.show", where={"id": "[0-9]+"})
     * 
     * @param  int  $id
     *
     * @return View
     */
    public function show($id)
    {
        $content = \App\Models\Repositories\ContentRepository::findById($id);

        $data = [
            'content' => $content
        ];

        return view('content.video.show', $data);
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

        return redirect(route('content.show', ['id' => $lesson->getId()]));
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
