<?php
namespace Admin\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

/**
 * 
 * @Controller(prefix="/admin")
 * @Middleware("guest:admin", except={"logout"})
 */
class LoginController extends Controller
{
    /*
      |--------------------------------------------------------------------------
      | Login Controller
      |--------------------------------------------------------------------------
      |
      | This controller handles authenticating users for the application and
      | redirecting them to your home screen. The controller uses a trait
      | to conveniently provide its functionality to your applications.
      |
     */

use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/admin';

    /**
     * Show the application's login form.
     *
     * @Get("/login", as="admin.login")
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        $form = \FormBuilder::plain([
            'method' => 'POST',
            'url' => route('login')
        ])->add('username', 'text')->add('password', 'password')->add('login', 'submit');
        
        return view('admin::auth.login', compact('form'));
    }
}
