<?php
namespace App\Forms;

use App\Entities\City;
use Kris\LaravelFormBuilder\Form;
use LaravelDoctrine\ORM\Facades\EntityManager;

class ProfileForm extends Form
{

    public function buildForm()
    {
        $this
            ->add('firstName', 'text', [
                'label' => 'First Name',
                'rules' => 'required|min:5',
            ])
            ->add('lastName', 'text', [
                'label' => 'Last Name',
                'rules' => 'required|min:5',
            ])
            ->add('email', 'email')
            ->add('city', 'entity', [
                'label' => 'City',
                'class' => City::class,
                'property' => 'name',
                'property_key' => 'id',
                'empty_value' => 'Select',
                'query_builder' => function () {
                    $cityRepo = new \App\Entities\Repositories\CityRepository();

                    return collect($cityRepo->getAll());
                }
            ])
            ->add('phoneNumbers', 'collection', [
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
