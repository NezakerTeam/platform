<?php
namespace App\Forms;

use App\Models\Repositories\CityRepository;
use App\Models\City;
use Kris\LaravelFormBuilder\Form;

class RegisterTeacherForm extends Form
{

    public function buildForm()
    {
        $this
            ->add('first_name', 'text', [
                'label' => trans('auth.form.first_name'),
                'rules' => 'required|min:2',
                'attr' => ['placeholder' => trans('auth.form.first_name')]
            ])
            ->add('last_name', 'text', [
                'label' => trans('auth.form.last_name'),
                'rules' => 'required|min:2',
                'attr' => ['placeholder' => trans('auth.form.last_name')]
            ])
            ->add('email', 'email', [
                'label' => trans('auth.form.email'),
                'rules' => 'required|unique:user',
                'attr' => ['placeholder' => trans('auth.form.email')]
            ])
            ->add('password', 'password', [
                'label' => trans('auth.form.password'),
                'rules' => 'required|min:5',
                'attr' => ['placeholder' => trans('auth.form.password')]
            ])
            ->add('city_id', 'entity', [
                'label' => trans('auth.form.city'),
                'attr' => ['placeholder' => trans('auth.form.city')],
                'class' => City::class,
                'property' => 'name',
                'empty_value' => trans('auth.form.city.select'),
                'query_builder' => function () {
                    return CityRepository::getAll();
                },
            ])
            ->add('phone_numbers', 'collection', [
                'type' => 'text',
                'label' => trans('auth.form.phoneNumber'),
                'options' => [
                    'label' => false,
                    'attr' => ['placeholder' => trans('auth.form.phoneNumber')]
                ]
            ])
            ->add('submit', 'submit', [
                'label' => trans('auth.register'),
                'attr' => ['class' => 'input-button', 'width' => '40%']
        ]);
    }
}
