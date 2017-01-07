<?php
namespace App\Forms\Content;

use App\Models\Repositories\SubjectRepository;
use App\Models\Subject;
use Kris\LaravelFormBuilder\Form;

class SubjectDropdownForm extends Form
{

    public function buildForm()
    {
        $gradeId = $this->getData('gradeId', request('grade_id', old('grade_id')));

        $this
            ->add('subject_id', 'entity', [
                'label' => trans('content.form.subject'),
                'class' => Subject::class,
                'property' => 'name',
                'query_builder' => function() use ($gradeId) {
                    $subjects = [];
                    if (!empty($gradeId)) {
                        $subjects = SubjectRepository::getAll([$gradeId], true);
                    }
                    return $subjects;
                },
                'empty_value' => trans('general.select'),
                'rules' => 'required',
                'attr' => [
                    'id' => 'subject_dropdown_form',
                    'class_append' => 'element-refresher',
                    'data-refresh-element' => 'lesson_dropdown_form',
                    'data-refresh-url' => route('content.renderDropdownelement', ['lesson']),
                ]
            ])
            ->compose(LessonDropdownForm::class, [
                'data' => $this->getData()
            ])
        ;
    }
}
