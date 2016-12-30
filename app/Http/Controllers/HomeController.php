<?php
namespace App\Http\Controllers;

use App\Entities\Lesson;
use App\Entities\Repositories\LessonRepository;
use App\Entities\User;
use App\Forms\RegisterTeacherForm;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Kris\LaravelFormBuilder\FormBuilder;
use LaravelDoctrine\ORM\Facades\EntityManager;

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
    public function index(FormBuilder $formBuilder, LessonRepository $lessonRepo)
    {
        $form = $formBuilder->create(RegisterTeacherForm::class, [
            'method' => 'POST',
            'url' => 'register'
        ]);

        $recentLesson = $lessonRepo->getRecentLessons();

        $data = [
            'form' => $form,
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
        }
    }

    /**
     * Show the teacher dashboard.
     *
     * @return Response
     */
    private function teacherDashboard()
    {
        $data = [];

        $lessonRepo = new LessonRepository();
        $data['lessons'] = $lessonRepo->getByAuthor(Auth::id());

        return view('user.teacher.dashboard', $data);
    }
}
