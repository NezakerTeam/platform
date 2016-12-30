<?php
namespace App\Entities\Repositories;

use App\Entities\Lesson;

class LessonRepository extends EntityRepository
{

    /**
     * @inheritdoc 
     */
    public function __construct()
    {
        parent::__construct(Lesson::class);
    }

    public function store(Lesson $lesson)
    {
        $this->getEntityManager()->persist($lesson);
        $this->getEntityManager()->flush();

        return $lesson;
    }

    public function getByAuthor(int $authorId, $status = Lesson::STATUS_APPROVED, $offset = 0, $limit = 8)
    {
        $qb = $this->createQueryBuilder('l')
            ->where('IDENTITY(l.author) = :authorId')
            ->setParameter(':authorId', $authorId);

        if ($status != null) {
            $qb->andWhere('l.status = :status')
                ->setParameter('status', $status);
        }

        $lessons = $qb
                ->orderBy('l.createdAt', 'DESC')
                ->setMaxResults($limit)
                ->setFirstResult($offset)
                ->getQuery()->execute();

        return $lessons;
    }

    public function findById($id)
    {
        return $this->find($id);
    }

    public function getAll($subjectsIds = [], $activeOnly = null, $offset = 0, $limit = 8)
    {
        $qb = $this->createQueryBuilder('s');

        if (!empty($subjectsIds)) {
            $qb->andWhere(
                $qb->expr()->in('IDENTITY(s.subject)', $subjectsIds)
            );
        }

        if ($activeOnly !== null) {
            $qb->andWhere(
                $qb->expr()->eq('s.status', Lesson::STATUS_APPROVED)
            );
        }

        $lessons = $qb
                ->orderBy('s.ordering', 'ASC')
                ->setMaxResults($limit)
                ->setFirstResult($offset)
                ->getQuery()->execute();

        return $lessons;
    }

    public function getRecentLessons($limit = 8)
    {
        $lessons = $this->createQueryBuilder('l')
                ->andWhere('l.status = :status')
                ->setParameter(':status', Lesson::STATUS_APPROVED)
                ->orderBy('l.createdAt', 'DESC')
                ->setMaxResults($limit)
                ->getQuery()->execute();

        return $lessons;
    }
}
