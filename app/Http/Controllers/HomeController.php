<?php
namespace App\Http\Controllers;

use App\Entities\Lesson;
use App\Entities\User;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
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
     * @Get("/")
     * @Get("/home")
     * 
     * @return Response
     */
    public function index()
    {
        return view('welcome');
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

        $data['lessons'] = EntityManager::getRepository(Lesson::class)->getByAuthor(Auth::id());

        return view('user.teacher.dashboard', $data);
    }
}
