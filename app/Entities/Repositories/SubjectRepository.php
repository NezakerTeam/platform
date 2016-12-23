<?php
namespace App\Entities\Repositories;

class SubjectRepository extends EntityRepository
{

    /**
     * @inheritdoc 
     */
    public function __construct()
    {
        parent::__construct(\App\Entities\Subject::class);
    }

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
    public function getAll($gradeId = null, $activeOnly = null, $offset = 0, $limit = 6)
    {
        $qb = $this->createQueryBuilder('s');

        if ($gradeId !== null) {
            $qb->andwhere(
                $qb->expr()->eq('s.grade_id', $gradeId)
            );
        }

        if ($activeOnly !== null) {
            $qb->andwhere(
                $qb->expr()->eq('s.status', \App\Entities\Subject::STATUS_ACTIVE)
            );
        }
        $stages = $qb
                ->orderBy('s.ordering', 'DESC')
                ->setMaxResults($limit)
                ->setFirstResult($offset)
                ->getQuery()->execute();

        return $stages;
    }
}
