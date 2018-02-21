<?php
namespace App\Http\Controllers;

use App\Forms\ContactUsForm;
use App\Forms\RegisterTeacherForm;
use App\Models\Content;
use App\Models\Repositories\ContentRepository;
use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Kris\LaravelFormBuilder\FormBuilder;

/**
 * @Controller(prefix="")
 * @Middleware("web")
 */
class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @Get("/", as="app.home")
     * @Middleware("guest")
     * 
     * @return Response
     */
    public function index(FormBuilder $formBuilder)
    {
        $registerForm = $formBuilder->create(RegisterTeacherForm::class, [
            'method' => 'POST',
            'url'    => 'register'
        ]);

        $contactUsForm = $formBuilder->create(ContactUsForm::class, [
            'method' => 'POST',
            'url'    => route('general.postContactUs')
        ]);

        $recentLesson = \App\Services\ContentService::getRecentContents(8);

        $data = [
            'registerForm'  => $registerForm,
            'contactUsForm' => $contactUsForm,
            'recentLessons' => $recentLesson
        ];

        return view('home', $data);
    }

    /**
     * Show the application dashboard.
     *
     * @Get("/dashboard", as="app.dashboard")
     * @Middleware("auth")
     * 
     * @return Response
     */
    public function dashboard()
    {
        if (Auth::user()->hasType(User::TYPE_TEACHER)) {
            return $this->teacherDashboard();
        } else {
            return $this->parentDashboard();
        }
    }

    /**
     * Show the teacher dashboard.
     *
     * @return Response
     */
    private function teacherDashboard()
    {
        $activeContent  = ContentRepository::getByAuthor(Auth::id());
        $pendingContent = ContentRepository::getByAuthor(Auth::id(), Content::STATUS_PENDIND_APPROVAL);
        $generalStages  = \App\Models\Repositories\StageRepository::getAll(true, true);

        $data = [
            'activeContents' => $activeContent,
            'pendingContent' => $pendingContent,
            'generalStages'  => $generalStages,
        ];

        return view('user.teacher.dashboard', $data);
    }

    /**
     * Show the teacher dashboard.
     *
     * @return Response
     */
    private function parentDashboard()
    {
        $activeContent = ContentRepository::getByAuthor(Auth::id());
        $generalStages  = \App\Models\Repositories\StageRepository::getAll(true, true);

        $studentRelations = Auth::user()->StudentRelations;

        $data = [
            'activeContents'   => $activeContent,
            'studentRelations' => $studentRelations,
            'generalStages'    => $generalStages,
        ];

        return view('user.parent.dashboard', $data);
    }
}
