<?php
namespace App\Http\Controllers;

use Illuminate\Http\Response;

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
