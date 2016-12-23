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

    public function getAll($activeOnly = null, $offset = 0, $limit = 6)
    {
        $qb = $this->createQueryBuilder('g');

        if ($activeOnly !== null) {
            $qb->where(
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
