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
class GeneralController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @Get("/about-us", as="general.aboutUs")
     * 
     * @return Response
     */
    public function aboutUs()
    {
        return view('general.about_us');
    }

    /**
     * Show the application dashboard.
     *
     * @Get("/how-it-works", as="general.howItWorks")
     * 
     * @return Response
     */
    public function howItWorks()
    {
        return view('general.how_it_works');
    }
}
