<?php
namespace App\Forms;

use App\Models\Repositories\CityRepository;
use App\Models\City;
use Kris\LaravelFormBuilder\Form;

class ResetPasswordForm extends Form
{

    public function buildForm()
    {
        $this
            ->add('email', 'email', [
                'label' => trans('auth.form.email'),
                'rules' => 'required',
                'attr' => ['class' => 'form-control normal', 'placeholder' => trans('auth.form.email')]
            ])
            ->add('password', 'repeated', [
                'type' => 'password',
                'second_name' => 'password_confirmation',
                'first_options' => [
                    'label' => trans('auth.form.password'),
                    'rules' => 'required|min:5',
                    'attr' => ['class' => 'form-control normal', 'placeholder' => trans('auth.form.password')]
                ],
                'second_options' => [
                    'label' => trans('auth.form.resetPassword.passwordConfirm'),
                    'rules' => 'required|min:5',
                    'attr' => ['class' => 'form-control normal', 'placeholder' => trans('auth.form.resetPassword.passwordConfirm')]
                ],
            ])
            ->add('token', 'hidden', [
                'rules' => 'required',
            ])
            ->add('submit', 'submit', [
                'label' => trans('auth.form.resetPassword.submit'),
                'attr' => ['class' => 'input-button', 'width' => '40%']
        ]);
    }
}
