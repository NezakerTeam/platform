<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

/**
 * @Controller(prefix="")
 */
class HomeController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @Get("", as="app.index")
     * @Get("/home", as="app.home")
     * 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('welcome');
    }

    /**
     * Show the application dashboard.
     *
     * @Get("/dashboard", as="app.dashboard")
     * 
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        dd(Auth::user());
        return view('home');
    }
}
