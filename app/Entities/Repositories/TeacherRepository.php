<?php
namespace App\Entities\Repositories;

class TeacherRepository extends UserRepository
{

    /**
     * @inheritdoc 
     */
    public function __construct()
    {
        parent::__construct(\App\Entities\Teacher::class);
    }

    public function create(\App\Entities\Teacher $teacher)
    {
        $this->getEntityManager()->persist($teacher);
        $this->getEntityManager()->flush();
    }
}
