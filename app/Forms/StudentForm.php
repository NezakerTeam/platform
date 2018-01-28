<?php
namespace App\Forms;

use App\Models\EducationType;
use App\Models\Grade;
use App\Models\Repositories\GradeRepository;
use App\Models\Repositories\StageRepository;
use App\Models\Stage;
use App\Models\User;
use Kris\LaravelFormBuilder\Form;
use function old;
use function request;
use function route;
use function trans;

class StudentForm extends Form
{

    public function buildForm()
    {
        $stageId = null;

        if (null != $student = $this->getModel()) {
            $stageId = $this->getModel()->grade->stage_id;
        }

        $this
            ->add('name', 'text', [
                'label' => trans('student.form.all.name'),
                'rules' => 'required|min:2',
                'attr'  => ['placeholder' => trans('student.form.all.name')]
            ])
            ->add('education_type_id', 'entity', [
                'label'       => trans('student.form.all.education_type'),
                'class'       => EducationType::class,
                'property'    => 'name',
                'empty_value' => trans('general.select'),
                'rules'       => 'required',
            ])
            ->add('stage_id', 'entity', [
                'label'         => trans('content.form.stage'),
                'class'         => Stage::class,
                'property'      => 'name',
                'query_builder' => function () {
                    return StageRepository::getAll(true, -1, -1);
                },
                'selected'    => $stageId,
                'empty_value' => trans('general.select'),
                'rules'       => 'required',
                'attr'        => [
                    'class_append'         => 'element-refresher',
                    'data-refresh-element' => 'grade_dropdown_form',
                    'data-refresh-url'     => route('content.renderDropdownelement', ['grade']),
                ]
            ])
            ->add('grade_id', 'entity', [
                'label'         => trans('content.form.grade'),
                'class'         => Grade::class,
                'property'      => 'name',
                'query_builder' => function () use ($stageId) {
                    $grades = ($stageId) ? GradeRepository::getAll([$stageId], true, -1, -1) : [];

                    return $grades;
                },
                'empty_value' => trans('general.select'),
                'rules'       => 'required',
                'attr'        => [
                    'id'           => 'grade_dropdown_form',
                    'class_append' => 'element-refresher',
                ]
            ])
            ->add('gender', 'choice', [
                'label'          => trans('student.form.all.gender'),
                'choices'        => User::getGendersList(),
                'choice_options' => [
                    'wrapper'    => ['class' => 'choice-wrapper'],
                    'label_attr' => ['class' => 'label-class'],
                ],
                'expanded'       => true,
                'multiple'       => false
            ])
            ->add('birthdate', 'date', [
                'label' => trans('student.form.all.birthdate'),
            ])
            ->add('submit', 'submit', [
                'label' => ($this->getData('isEdit')) ? trans('student.form.edit.submit') : trans('student.form.create.submit'),
                'attr'  => [
                    'class' => 'input-button',
                ]
            ])
        ;
    }
}
