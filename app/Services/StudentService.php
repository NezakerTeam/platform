<?php
namespace App\Services;

use App\Models\Repositories\StudentRepository;
use App\Models\Student;
use App\Models\StudentRelation;
use Illuminate\Support\Facades\Auth;

/**
 * Description of StudentService
 *
 * @author Sherif Medhat <sherif.mohamed.medhat@gmail.com>
 */
class StudentService
{

    public function add($data)
    {
        $student = $this->bindData(new Student(), $data);

        // Save the entity
        StudentRepository::store($student);

        $studentRelation = new StudentRelation();
        $studentRelation->setStudentId($student->getId());
        $studentRelation->setUserId(Auth::user()->getId());
        $studentRelation->setTypeId(StudentRelation::TYPE_PARENT);

        $studentRelation->save();

        return $student;
    }

    public function edit(Student $student, $data)
    {
        $student = $this->bindData($student, $data);

        // Save the entity
        $student = StudentRepository::store($student);

        return $student;
    }

    private function bindData(Student $student, $data)
    {
        $student->setName($data['name']);
        $student->setEducationType($data['education_type_id']);
        $student->setGradeId($data['grade_id']);
        $student->setGender($data['gender']);
        $student->setBirthDate($data['birthdate']);

        return $student;
    }
}
