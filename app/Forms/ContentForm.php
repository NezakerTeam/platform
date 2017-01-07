<?php
namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class ContentForm extends Form
{

    public function buildForm()
    {
        $this
            ->add('Stage', 'entity', [
                'label' => trans('content.form.stage'),
                'class' => \App\Models\Stage::class,
                'property' => 'name',
                'query_builder' => function () {
                    return \App\Models\Repositories\StageRepository::getAll(true, -1, -1);
                },
                'empty_value' => trans('general.select'),
                'rules' => 'required',
            ])
            ->add('Grade', 'entity', [
                'label' => trans('content.form.grade'),
                'class' => \App\Models\Grade::class,
                'property' => 'name',
                'query_builder' => function () {
                    return \App\Models\Repositories\GradeRepository::getAll([], true, -1, -1);
                },
                'empty_value' => trans('general.select'),
                'rules' => 'required',
                'options' => [
                    'attr' => ['class' => '7oksh']
                ]
            ])
            ->add('subject', 'entity', [
                'label' => trans('content.form.subject'),
                'class' => \App\Models\Subject::class,
                'property' => 'name',
                'query_builder' => function () {
                    return \App\Models\Repositories\SubjectRepository::getAll([], true, -1, -1);
                },
                'empty_value' => trans('general.select'),
                'rules' => 'required',
            ])
            ->add('lesson_id', 'entity', [
                'label' => trans('content.form.lesson'),
                'class' => \App\Models\Lesson::class,
                'property' => 'name',
                'query_builder' => function () {
                    return \App\Models\Repositories\LessonRepository::getAll([], true, -1, -1);
                },
                'empty_value' => trans('general.select'),
                'rules' => 'required',
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
