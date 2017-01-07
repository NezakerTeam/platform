<?php
namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class ForgotPasswordForm extends Form
{

    public function buildForm()
    {
        $this
            ->add('email', 'email', [
                'label' => trans('auth.form.email'),
                'rules' => 'required',
                'attr' => ['class' => 'form-control normal', 'placeholder' => trans('auth.form.email')]
            ])
            ->add('submit', 'submit', [
                'label' => trans('auth.form.forgetPassword.submit'),
                'attr' => ['class' => 'input-button', 'width' => '40%']
        ]);
    }
}
