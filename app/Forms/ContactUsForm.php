<?php
namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class ContactUsForm extends Form
{

    protected $languageName = 'general.form.contactUs';

    public function buildForm()
    {
        $this
            ->add('name', 'text', [
                'rules' => 'required|min:5',
                'attr' => ['placeholder' => trans($this->languageName . '.name')],
            ])
            ->add('email', 'email', [
                'rules' => 'required',
                'attr' => ['placeholder' => trans($this->languageName . '.email')],
            ])
            ->add('phone_number', 'tel', [
                'rules' => '',
                'attr' => ['placeholder' => trans($this->languageName . '.phone_number')],
            ])
            ->add('message', 'textarea', [
                'rules' => 'required|min:5',
                'attr' => ['placeholder' => trans($this->languageName . '.message')],
            ])
            ->add('submit', 'submit', [
                'label' => trans('general.contactUs.send'),
                'attr' => ['class' => 'input-button']
        ]);
    }
}
