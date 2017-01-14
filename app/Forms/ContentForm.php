<?php
namespace App\Forms;

use App\Forms\Content\GradeDropdownForm;
use App\Models\Repositories\StageRepository;
use App\Models\Stage;
use Kris\LaravelFormBuilder\Form;

class ContentForm extends Form
{

    public function buildForm()
    {
        $this
            ->add('stage_id', 'entity', [
                'label' => trans('content.form.stage'),
                'class' => Stage::class,
                'property' => 'name',
                'query_builder' => function () {
                    return StageRepository::getAll(true, -1, -1);
                },
                'empty_value' => trans('general.select'),
                'rules' => 'required',
                'attr' => [
                    'class_append' => 'element-refresher',
                    'data-refresh-element' => 'grade_dropdown_form',
                    'data-refresh-url' => route('content.renderDropdownelement', ['grade']),
                ]
            ])
            ->compose(GradeDropdownForm::class, [
                'data' => $this->getData()
            ])
            ->add('how_to_upload', 'static', [
                'tag' => 'div', // Tag to be used for holding static data,
                'attr' => ['class' => ''], // This is the default
                'label' => trans('content.form.howToUpload'), // This is the default
                'value' => view('content.video._add_video_guide') // If nothing is passed, data is pulled from model if any
            ])
            ->add('material_url', 'url', [
                'label' => trans('content.form.materialUrl'),
                'rules' => 'required',
            ])
            ->add('description', 'textarea', [
                'label' => trans('content.form.description'),
                'rules' => 'required',
            ])
            ->add('agree', 'checkbox', [
                'value' => 1,
                'checked' => false,
                'rules' => 'required',
                'label' => trans('content.form.agree')
            ])
            ->add('submit', 'submit', [
                'label' => ($this->getData('isEdit')) ? trans('content.form.submit.edit') : trans('content.form.submit.create'),
                'attr' => [
                    'class' => 'input-button',
                ]
            ])
        ;
    }
}
