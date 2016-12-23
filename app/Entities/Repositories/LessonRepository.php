<?php
namespace App\Entities\Repositories;

use Doctrine\ORM\EntityRepository;

class LessonRepository extends EntityRepository
{

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
}
