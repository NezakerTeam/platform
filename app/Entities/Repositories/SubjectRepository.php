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
    public function getAll($gradeIds = [], $stageIds = [], $activeOnly = null, $offset = 0, $limit = 6)
    {
        $qb = $this->createQueryBuilder('s');

        if (!empty($gradeIds)) {
            $qb->andwhere(
                $qb->expr()->in('IDENTITY(s.grade)', $gradeIds)
            );
        }

        if (!empty($stageIds)) {
            $qb->innerJoin('s.grade', 'g')
                ->andwhere(
                    $qb->expr()->in('IDENTITY(g.stage)', $stageIds)
            );
        }

        if ($activeOnly !== null) {
            $qb->andwhere(
                $qb->expr()->eq('s.status', \App\Entities\Subject::STATUS_ACTIVE)
            );
        }
        $stages = $qb
                ->orderBy('s.ordering', 'ASC')
                ->setMaxResults($limit)
                ->setFirstResult($offset)
                ->getQuery()->execute();

        return $stages;
    }
}
