<?php
namespace App\Forms\Content;

use App\Models\Lesson;
use App\Models\Repositories\LessonRepository;
use Kris\LaravelFormBuilder\Form;

class LessonDropdownForm extends Form
{

    public function buildForm()
    {
        $subjectId = $this->getData('subjectId', request('subject_id', old('subject_id')));
        
        $this
            ->add('lesson_id', 'entity', [
                'label' => trans('content.form.lesson'),
                'class' => Lesson::class,
                'property' => 'name',
                'query_builder' => function() use ($subjectId) {
                    $lessons = [];
                    if (!empty($subjectId)) {
                        $lessons = LessonRepository::getAll([$subjectId]);
                    }
                    return $lessons;
                },
                'empty_value' => trans('general.select'),
                'rules' => 'required',
                'attr' => [
                    'id' => 'lesson_dropdown_form',
                ]
            ])

        ;
    }
}
