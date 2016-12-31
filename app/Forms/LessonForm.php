<?php
namespace App\Forms;

use App\Entities\Subject;
use Kris\LaravelFormBuilder\Form;
use LaravelDoctrine\ORM\Facades\EntityManager;

class LessonForm extends Form
{

    public function buildForm()
    {
        $this
            ->add('Stage', 'entity', [
                'label' => 'Stage',
                'class' => \App\Models\Stage::class,
                'property' => 'name',
                'query_builder' => function () {
                    return \App\Entities\Repositories\StageRepository::getAll(true, -1, -1);
                },
                'empty_value' => 'Select',
                'rules' => 'required',
            ])
            ->add('Grade', 'entity', [
                'label' => 'Grade',
                'class' => \App\Models\Grade::class,
                'property' => 'name',
                'query_builder' => function () {
                    return \App\Entities\Repositories\GradeRepository::getAll([], true, -1, -1);
                },
                'empty_value' => 'Select',
                'rules' => 'required',
                'options' => [
                    'attr' => ['class' => '7oksh']
                ]
            ])
            ->add('subject', 'entity', [
                'label' => 'Subject',
                'class' => \App\Models\Subject::class,
                'property' => 'name',
                'query_builder' => function () {
                    return \App\Entities\Repositories\SubjectRepository::getAll([], true, -1, -1);
                },
                'empty_value' => 'Select',
                'rules' => 'required',
            ])
            ->add('lesson_id', 'entity', [
                'label' => 'Lesson',
                'class' => \App\Models\Lesson::class,
                'property' => 'name',
                'query_builder' => function () {
                    return \App\Entities\Repositories\LessonRepository::getAll([], true, -1, -1);
                },
                'empty_value' => 'Select',
                'rules' => 'required',
            ])
            ->add('material_url', 'url', [
                'label' => 'Material Url',
                'rules' => 'required',
            ])
            ->add('submit', 'submit', ['label' => 'Add Video'])
        ;
    }
}
