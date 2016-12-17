<?php
namespace App\Entities\Repositories;

use Doctrine\ORM\EntityRepository;

class LessonRepository extends EntityRepository
{

    public function create(\App\Entities\Lesson $lesson)
    {
        $this->getEntityManager()->persist($lesson);
        $this->getEntityManager()->flush();
    }
}
