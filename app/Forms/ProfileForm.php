<?php
namespace App\Forms;

use App\Models\City;
use App\Models\Repositories\CityRepository;
use Kris\LaravelFormBuilder\Form;

class ProfileForm extends Form
{

    public function buildForm()
    {
        $this
            ->add('first_name', 'text', [
                'label' => 'First Name',
                'rules' => 'required|min:5',
            ])
            ->add('last_name', 'text', [
                'label' => 'Last Name',
                'rules' => 'required|min:5',
            ])
            ->add('email', 'email')
            ->add('city_id', 'entity', [
                'label' => 'City',
                'class' => City::class,
                'property' => 'name',
                'property_key' => 'id',
                'empty_value' => 'Select',
                'query_builder' => function () {
                    return CityRepository::getAll();
                }
            ])
            ->add('phone_numbers', 'collection', [
                'type' => 'text',
                'label' => 'Phone Number',
                'options' => [// these are options for a single type
                    'label' => false,
                    'attr' => ['class' => 'form-control']
                ]
            ])
            ->add('submit', 'submit', ['label' => 'Edit profile']);
    }
}
