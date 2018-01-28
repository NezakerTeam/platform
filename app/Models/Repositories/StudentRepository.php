<?php
namespace App\Models\Repositories;

use App\Models\Student;

class StudentRepository extends EntityRepository
{

    /**
     * @inheritdoc 
     */
    protected static function getModel()
    {
        return new Student();
    }

    public function create(Student $student)
    {
        return $this->store($student);
    }

    public static function store(Student $student)
    {
        $student->save();

        return $student;
    }
}
