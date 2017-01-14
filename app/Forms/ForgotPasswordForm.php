<?php
namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class ForgotPasswordForm extends Form
{

    protected $languageName = 'passwords.form.forgot';

    public function buildForm()
    {
        $this
            ->add('email', 'email', [
                'label' => trans('auth.form.email'),
                'rules' => 'required|exists:user,email',
                'attr' => ['placeholder' => trans('passwords.form.forgot.email.placeholder')],
                'error_messages' => [
                    'email.exists' => trans('passwords.form.forgot.error.email.exists')
                ]   // Validation error messages
            ])
            ->add('submit', 'submit', [
                'label' => trans('auth.form.forgetPassword.submit'),
                'attr' => ['class' => 'input-button', 'width' => '40%']
        ]);
    }
}
