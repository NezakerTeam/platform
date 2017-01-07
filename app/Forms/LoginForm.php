<?php
namespace App\Forms;

use App\Models\Repositories\CityRepository;
use App\Models\City;
use Kris\LaravelFormBuilder\Form;

class LoginForm extends Form
{

    public function buildForm()
    {
        $this
            ->add('email', 'email', [
                'label' => trans('auth.form.email'),
                'rules' => 'required',
                'attr' => ['class' => 'form-control normal', 'placeholder' => trans('auth.form.email')]
            ])
            ->add('password', 'password', [
                'label' => trans('auth.form.password'),
                'rules' => 'required|min:5',
                'attr' => ['class' => 'form-control normal', 'placeholder' => trans('auth.form.password')]
            ])
            ->add('remember_me', 'checkbox', [
                'label' => trans('auth.form.login.rememberMe'),
                'value' => 1,
                'checked' => false
            ])
            ->add('submit', 'submit', [
                'label' => trans('auth.form.login.submit'),
                'attr' => ['class' => 'btn btn-primary', 'width' => '40%']
        ]);
    }
}
