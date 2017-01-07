<?php
namespace App\Forms;

use App\Models\Repositories\CityRepository;
use App\Models\City;
use Kris\LaravelFormBuilder\Form;

class ContactUsForm extends Form
{

    public function buildForm()
    {
        $this
            ->add('name', 'text', [
                'label' => 'Your Name',
                'rules' => 'required|min:5',
                'attr' => ['class' => 'form-control normal', 'placeholder' => 'الإسم']
            ])
            ->add('email', 'email', [
                'label' => 'Your Email',
                'rules' => 'required',
                'attr' => ['class' => 'form-control normal', 'placeholder' => 'البريد الألكتروني']
            ])
            ->add('comment', 'textarea', [
                'label' => 'Your comment',
                'rules' => 'required|min:5',
                'attr' => ['class' => 'form-control normal', 'placeholder' => 'السؤال']
            ])
            ->add('submit', 'submit', [
                'label' => trans('general.contactUs.send'),
                'attr' => ['class' => 'input-button', 'width' => '40%', 'placeholder' => trans('general.contactUs.send')]
        ]);
    }
}
