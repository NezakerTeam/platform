<?php
namespace App\Http\Controllers\Content;

use App\Forms\ContentForm;
use App\Http\Controllers\Controller;
use App\Models\Lesson;
use App\Models\Repositories\ContentRepository;
use App\Services\ContentService;
use Kris\LaravelFormBuilder\Facades\FormBuilder;
use Kris\LaravelFormBuilder\FormBuilderTrait;

/**
 * @Controller(prefix="content")
 * @Middleware("web")
 */
class ContentController extends Controller
{

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
                'url'    => route('content.store')
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
    public function store(ContentService $contentService)
    {
        $form = $this->form(ContentForm::class);

        // Or automatically redirect on error. This will throw an HttpResponseException with redirect
        $form->redirectIfNotValid();

        $lesson = $contentService->addContent($form->getFieldValues());

        \Illuminate\Support\Facades\Session::flash('flash_message', trans('content.form.submitted'));

        return redirect(route('app.dashboard'));
    }

    /**
     * Display the specified resource.
     *
     * @Get("/{id}/{slug?}", as="content.show", where={"id": "[0-9]+", "name":"[a-z]+"})
     * 
     * @param  int  $id
     *
     * @return View
     */
    public function show($id, $slug = '')
    {
        $content = ContentRepository::findById($id);

        if (strcmp($slug, $content->slug) !== 0) {
            return redirect(route('content.show', ['id' => $content->getId(), 'slug' => $content->slug]), 301);
        }

        $this->seo()->setTitle($content->getLesson()->getName());
        $this->seo()->setDescription($content->getDescription());
        $this->seo()->opengraph()->setUrl(route('content.show', ['id' => $content->getId()]));
        $this->seo()->opengraph()->addProperty('type', 'articles');
        $this->seo()->addImages([$content->getThumbnail()]);

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

    /**
     * Display the specified resource.
     *
     * @Get("/render-refresh-dropdown/{type}", as="content.renderDropdownelement", where={"type": "[A-Za-z]+"})
     * 
     * @param  Request  $request
     *
     * @return View
     */
    public function renderDropdownElement(\Illuminate\Http\Request $request, $type)
    {
        $selectedOptionId = $request->get('selectedOptionId', 0);

        switch ($type) {
            default:
            case 'grade':
                $subForm = FormBuilder::create(ContentForm::class, [], ['stageId' => $selectedOptionId])
                    ->getField('grade_id');
                break;
            case 'subject':
                $subForm = FormBuilder::create(ContentForm::class, [], ['gradeId' => $selectedOptionId])
                    ->getField('subject_id');
                break;
            case 'lesson':
                $subForm = FormBuilder::create(ContentForm::class, [], ['subjectId' => $selectedOptionId])
                    ->getField('lesson_id');
                break;
        }

        return $subForm->render([], false);
    }
}
