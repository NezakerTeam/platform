<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContentController extends Controller
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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Create a new content
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('home');
    }
}
