<?php
namespace App\Entities\Repositories;

use Doctrine\ORM\EntityRepository;

class SubjectRepository extends EntityRepository
{

    /**
     * Get a list of subjects 
     * 
     * @return array [id => name]
     */
    public function getList()
    {
        $subjectsList = [];
        $subjects = $this->getAll();

        foreach ($subjects as $subject) {
            $grade = $subject->getGrade();
            $stage = $grade->getStage();
            $subjectsList[$subject->getId()] = $stage->getName() . ' - ' . $grade->getName() . ' - ' . $subject->getName();
        }

        return $subjectsList;
    }

    /**
     * Get all the subjects
     * 
     * @param int $gradeId  A specific grade id
     * 
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAll($gradeId = 0)
    {
        $criteria = [];

        if (!empty($gradeId)) {
            $criteria['gradeId'] = $gradeId;
        }

        return $this->findBy($criteria);
    }
}
