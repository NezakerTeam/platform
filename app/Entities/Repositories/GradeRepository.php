<?php
namespace App\Entities\Repositories;

class GradeRepository extends EntityRepository
{

    /**
     * @inheritdoc 
     */
    public function __construct()
    {
        parent::__construct(\App\Entities\Grade::class);
    }

    public function getAll($stagesIds = [], $activeOnly = null, $offset = 0, $limit = 6)
    {
        $qb = $this->createQueryBuilder('g');

        if (!empty($stagesIds)) {
            $qb->andWhere(
                $qb->expr()->in('IDENTITY(g.stage)', $stagesIds)
            );
        }

        if ($activeOnly !== null) {
            $qb->andWhere(
                $qb->expr()->eq('g.status', \App\Entities\Grade::STATUS_ACTIVE)
            );
        }

        $stages = $qb
                ->orderBy('g.ordering', 'ASC')
                ->setMaxResults($limit)
                ->setFirstResult($offset)
                ->getQuery()->execute();

        return $stages;
    }
}
