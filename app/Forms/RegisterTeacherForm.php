<?php
namespace App\Forms;

use App\Entities\City;
use Kris\LaravelFormBuilder\Form;
use LaravelDoctrine\ORM\Facades\EntityManager;

class RegisterTeacherForm extends Form
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
            ->add('password', 'password')
            ->add('cityId', 'entity', [
                'label' => 'City',
                'class' => 'App\Entities\City',
                'property' => 'name',
                'query_builder' => function () {
                    $cityRepo = EntityManager::getRepository(City::class);

                    return $cityRepo->getList();
                }
            ])
            ->add('phoneNumbers', 'text', [
                'label' => 'Phone Number',
            ])
            ->add('submit', 'submit', ['label' => 'Register']);
    }
}
