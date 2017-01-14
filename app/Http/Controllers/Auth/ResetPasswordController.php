<?php
namespace App\Http\Controllers\Auth;

use App\Forms\ResetPasswordForm;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Kris\LaravelFormBuilder\FormBuilder;

class ResetPasswordController extends Controller
{
    /*
      |--------------------------------------------------------------------------
      | Password Reset Controller
      |--------------------------------------------------------------------------
      |
      | This controller is responsible for handling password reset requests
      | and uses a simple trait to include this behavior. You're free to
      | explore this trait and override any methods you wish to tweak.
      |
     */

use ResetsPasswords;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showResetForm(Request $request, FormBuilder $formBuilder, $token = null)
    {
        $resetPasswordForm = $formBuilder->create(ResetPasswordForm::class, [
            'method' => 'POST',
            'url' => 'password/reset',
            'model' => [
                'email' => $request->get('email', old('email')),
                'token' => $token,
            ]
        ]);

        return view('auth.passwords.reset')->with(
                ['token' => $token, 'email' => $request->email, 'resetPasswordForm' => $resetPasswordForm]
        );
    }
}
