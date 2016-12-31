<?php
namespace App\Forms;

use App\Entities\Repositories\CityRepository;
use App\Models\City;
use Kris\LaravelFormBuilder\Form;

class RegisterTeacherForm extends Form
{

    public function buildForm()
    {
        $this
            ->add('first_name', 'text', [
                'label' => 'First Name',
                'rules' => 'required|min:5',
                'attr' => ['class' => 'form-control normal', 'placeholder' => 'الإسم الأول']
            ])
            ->add('last_name', 'text', [
                'label' => 'Last Name',
                'rules' => 'required|min:5',
                'attr' => ['class' => 'form-control normal', 'placeholder' => 'الإسم الثاني']
            ])
            ->add('email', 'email', [
                'label' => 'Email',
                'rules' => 'required',
                'attr' => ['class' => 'form-control normal', 'placeholder' => 'البريد الألكتروني']
            ])
            ->add('password', 'password', [
                'label' => 'Password',
                'rules' => 'required|min:5',
                'attr' => ['class' => 'form-control normal', 'placeholder' => 'كلمة السر']
            ])
            ->add('city_id', 'entity', [
                'label' => 'City',
                'attr' => ['class' => 'form-control normal', 'placeholder' => 'المدينة'],
                'class' => City::class,
                'property' => 'name',
                'empty_value' => 'Select',
                'query_builder' => function () {
                    return CityRepository::getAll();
                },
            ])
            ->add('phone_numbers', 'collection', [
                'type' => 'text',
                'label' => 'Phone Number',
                'options' => [// these are options for a single type
                    'label' => false,
                    'attr' => ['class' => 'form-control normal', 'placeholder' => 'رقم التليفون']
                ]
            ])
            ->add('submit', 'submit', [
                'label' => 'Register',
                'attr' => ['class' => 'input-button', 'width' => '40%']
        ]);
    }
}
