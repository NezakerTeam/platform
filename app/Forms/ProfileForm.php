<?php
namespace App\Forms;

use App\Models\City;
use App\Models\Repositories\CityRepository;
use Kris\LaravelFormBuilder\Form;

class ProfileForm extends Form
{

    protected $languageName = 'user.form.edit';

    public function buildForm()
    {
        $this
            ->add('first_name', 'text', [
                'rules' => 'required|min:2',
            ])
            ->add('last_name', 'text', [
                'rules' => 'required|min:2',
            ])
            ->add('email', 'email')
            ->add('city_id', 'entity', [
                'class' => City::class,
                'property' => 'name',
                'property_key' => 'id',
                'empty_value' => trans($this->languageName . '.city.empty_value'),
                'query_builder' => function () {
                    return CityRepository::getAll();
                }
            ])
            ->add('phone_numbers', 'collection', [
                'type' => 'text',
                'options' => [// these are options for a single type
                    'label' => false,
                ]
            ])
            ->add('submit', 'submit', [
                'attr' => ['class' => 'input-button']
        ]);
    }
}
