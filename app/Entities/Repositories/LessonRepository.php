<?php
namespace App\Entities\Repositories;

class LessonRepository extends EntityRepository
{

    /**
     * @inheritdoc 
     */
    public function __construct()
    {
        parent::__construct(\App\Entities\Lesson::class);
    }

    public function store(\App\Entities\Lesson $lesson)
    {
        $this->getEntityManager()->persist($lesson);
        $this->getEntityManager()->flush();
    }

    public function getByAuthor(int $authorId, $offset = 0, $limit = 6)
    {
        $lessons = $this->createQueryBuilder('l')
                ->where('IDENTITY(l.author) = :authorId')
                ->orderBy('l.createdAt', 'DESC')
                ->setParameter('authorId', $authorId)
                ->setMaxResults($limit)
                ->setFirstResult($offset)
                ->getQuery()->execute();

        return $lessons;
    }

    public function findById($id)
    {
        return $this->find($id);
    }

    public function getAll($subjectsIds = [], $activeOnly = null, $offset = 0, $limit = 6)
    {
        $qb = $this->createQueryBuilder('s');

        if (!empty($subjectsIds)) {
            $qb->andWhere(
                $qb->expr()->in('IDENTITY(s.subject)', $subjectsIds)
            );
        }

        if ($activeOnly !== null) {
            $qb->andWhere(
                $qb->expr()->eq('s.status', \App\Entities\Lesson::STATUS_APPROVED)
            );
        }

        $lessons = $qb
                ->orderBy('s.ordering', 'ASC')
                ->setMaxResults($limit)
                ->setFirstResult($offset)
                ->getQuery()->execute();

        return $lessons;
    }
}
