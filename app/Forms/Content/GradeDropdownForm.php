<?php
namespace App\Forms\Content;

use App\Models\Grade;
use App\Models\Repositories\GradeRepository;
use Kris\LaravelFormBuilder\Form;

class GradeDropdownForm extends Form
{

    public function buildForm()
    {
        $stageId = $this->getData('stageId', request('stage_id', old('stage_id')));

        $this
            ->add('grade_id', 'entity', [
                'label' => trans('content.form.grade'),
                'class' => Grade::class,
                'property' => 'name',
                'query_builder' => function () use ($stageId) {
                    $grades = [];
                    if (!empty($stageId)) {
                        $grades = GradeRepository::getAll([$stageId], true, -1, -1);
                    }
                    return $grades;
                },
                'empty_value' => trans('general.select'),
                'rules' => 'required',
                'attr' => [
                    'id' => 'grade_dropdown_form',
                    'class_append' => 'element-refresher',
                    'data-refresh-element' => 'subject_dropdown_form',
                    'data-refresh-url' => route('content.renderDropdownelement', ['subject']),
                ]
            ])
            ->compose(SubjectDropdownForm::class, [
                'data' => $this->getData()
            ])
        ;
    }
}
