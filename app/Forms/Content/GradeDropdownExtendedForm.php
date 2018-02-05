<?php
namespace App\Forms\Content;

class GradeDropdownExtendedForm extends GradeDropdownForm
{

    public function buildForm()
    {
        parent::buildForm();

        $this
            ->compose(SubjectDropdownForm::class, [
                'data' => $this->getData()
            ])
        ;
    }
}
