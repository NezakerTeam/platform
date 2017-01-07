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
                'data'=>$this->getData()
            ])
            ->add('material_url', 'url', [
                'label' => trans('content.form.materialUrl'),
                'rules' => 'required',
            ])
            ->add('description', 'textarea', [
                'label' => trans('content.form.description'),
                'rules' => 'required',
            ])
            ->add('submit', 'submit', [
                'label' => ($this->getData('isEdit')) ? trans('content.form.submit.edit') : trans('content.form.submit.create'),
                'attr' => [
                    'class' => 'btn btn-primary btn-lg',
                    'width' => '40%'
                ]
            ])
        ;
    }
}
