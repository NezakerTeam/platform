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
            ->add('name', 'text', [
                'label' => 'Name',
                'rules' => 'required|min:5',
            ])
            ->add('description', 'textarea', [
                'label' => 'Description',
                'attr' => ['rows' => 2],
            ])
            ->add('materialUrl', 'url', [
                'label' => 'Material Url',
                'rules' => 'required',
            ])
            ->add('subjectId', 'entity', [
                'label' => 'Subject',
                'class' => 'App\Entities\Subject',
                'property' => 'name',
                'query_builder' => function () {
                    $SubjectRepo = EntityManager::getRepository(Subject::class);
                    return $SubjectRepo->getList();
                },
                'empty_value' => 'Select',
                'rules' => 'required',
            ])
            ->add('semester', 'select', [
                'label' => 'Semester',
                'choices' => \App\Entities\Lesson::getSemestersList(),
                'empty_value' => 'Select',
                'rules' => 'required',
            ])
            ->add('submit', 'submit', ['label' => 'Add Lesson'])
        ;
    }
}
