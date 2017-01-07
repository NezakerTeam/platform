<?php
namespace App\Http\Controllers\Auth;

use App\Forms\ForgotPasswordForm;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Kris\LaravelFormBuilder\FormBuilder;

class ForgotPasswordController extends Controller
{
    /*
      |--------------------------------------------------------------------------
      | Password Reset Controller
      |--------------------------------------------------------------------------
      |
      | This controller is responsible for handling password reset emails and
      | includes a trait which assists in sending these notifications from
      | your application to your users. Feel free to explore this trait.
      |
     */

use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showLinkRequestForm(FormBuilder $formBuilder)
    {
        $forgotPasswordForm = $formBuilder->create(ForgotPasswordForm::class, [
            'method' => 'POST',
            'url' => 'password/email'
        ]);

        $data = [
            'forgotPasswordForm' => $forgotPasswordForm
        ];
        return view('auth.passwords.email', $data);
    }
}
