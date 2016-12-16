<?php
namespace App\Entities\Repositories;

use Doctrine\ORM\EntityRepository;

class TeacherRepository extends EntityRepository
{

    public function create(\App\Entities\Teacher $teacher)
    {
        $this->getEntityManager()->persist($teacher);
        $this->getEntityManager()->flush();
    }
}
