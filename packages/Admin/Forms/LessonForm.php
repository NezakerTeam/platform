<?php
namespace Admin\Forms;

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
            ->add('youtubeVideoId', 'text', [
                'label' => 'Youtube Video Id',
                'rules' => 'required',
            ])
            ->add('subject', 'entity', [
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
            ->add('semester', 'choice', [
                'label' => 'Semester',
                'choices' => \App\Entities\Lesson::getSemestersList(),
                'empty_value' => 'Select',
                'rules' => 'required',
                'expanded' => true,
                'multiple' => false
            ])
            ->add('status', 'choice', [
                'label' => 'Status',
                'choices' => \App\Entities\Lesson::getStatusesList(),
                'empty_value' => 'Select',
                'rules' => 'required',
                'expanded' => true,
                'multiple' => false
            ])
            ->add('submit', 'submit', ['label' => ($this->getData('isEdit')) ? 'Edit Lesson' : 'Add Lesson'])
        ;
    }
}
