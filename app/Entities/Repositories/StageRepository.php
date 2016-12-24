<?php
namespace App\Entities\Repositories;

class StageRepository extends EntityRepository
{

    /**
     * @inheritdoc 
     */
    public function __construct()
    {
        parent::__construct(\App\Entities\Stage::class);
    }

    public function getAll($activeOnly = null, $offset = 0, $limit = 6)
    {
        $qb = $this->createQueryBuilder('s');

        if ($activeOnly !== null) {
            $qb->where(
                $qb->expr()->eq('s.status', \App\Entities\Stage::STATUS_ACTIVE)
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
