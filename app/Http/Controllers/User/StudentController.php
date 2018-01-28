<?php
namespace App\Http\Controllers\User;

use App\Forms\ProfileForm;
use App\Forms\StudentForm;
use App\Http\Controllers\Controller;
use App\Models\Repositories\ContentRepository;
use App\Models\Student;
use App\Services\StudentService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;
use Kris\LaravelFormBuilder\Facades\FormBuilder;
use Kris\LaravelFormBuilder\FormBuilderTrait;
use function redirect;
use function route;
use function trans;
use function view;

/**
 * @Controller(prefix="student")
 * @Middleware("web")
 * @Middleware("auth")
 */
class StudentController extends Controller
{

    use FormBuilderTrait;

    /**
     * Show the form for creating a new resource.
     *
     * @Get("/create", as="student.create")
     * @Middleware("auth")
     * 
     * @return View
     */
    public function create()
    {
        $form = FormBuilder::create(StudentForm::class, [
                'method' => 'POST',
                'url'    => route('student.store')
        ]);

        return view('user.student.create', compact('form'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @POST("/store", as="student.store")
     * 
     * @return RedirectResponse|Redirector
     */
    public function store(StudentService $studentService)
    {
        $form = $this->form(StudentForm::class);

        // Or automatically redirect on error. This will throw an HttpResponseException with redirect
        $form->redirectIfNotValid();

        $student = $studentService->add($form->getFieldValues());

        return redirect(route('app.dashboard'));
    }

    /**
     * Display the specified resource.
     *
     * @Get("/{id}", as="student.show", where={"id": "[0-9]+"})
     * 
     * @param  int  $id
     *
     * @return View
     */
    public function show($id)
    {
        $content = ContentRepository::findById($id);

        $this->seo()->setTitle($content->getLesson()->getName());
        $this->seo()->setDescription($content->getDescription());
        $this->seo()->opengraph()->setUrl(route('student.show', ['id' => $content->getId()]));
        $this->seo()->opengraph()->addProperty('type', 'articles');
        $this->seo()->addImages([$content->getThumbnail()]);

        $data = [
            'content' => $content
        ];

        return view('student.video.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @Get("/{id}/edit", as="student.edit", where={"id": "[0-9]+"})
     * 
     * @param  int  $id
     *
     * @return View
     */
    public function edit($id)
    {
        $student = Student::findOrFail($id);

        $form = FormBuilder::create(StudentForm::class, [
                'method' => 'PATCH',
                'url'    => route('user.profile.update'),
                'model'  => $student
                ], [
                'isEdit' => true
                ]
        );

        $data = [
            'student' => $student,
            'form'    => $form
        ];

        return view('user.student.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @Patch("/{id}", as="student.update", where={"id": "[0-9]+"})
     * 
     * @param  int  $id
     * @param Request $request
     *
     * @return RedirectResponse|Redirector
     */
    public function update($id, Request $request)
    {
        $requestData = $request->all();

        $lesson = Student::findOrFail($id);
        $lesson->update($requestData);

        return redirect(route('student.show', ['id' => $lesson->getId()]));
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
        Student::destroy($id);

        Session::flash('flash_message', 'Post deleted!');

        return redirect(route('app.dashboard'));
    }
}
