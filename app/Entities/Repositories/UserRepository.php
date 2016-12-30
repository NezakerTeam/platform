<?php
namespace App\Entities\Repositories;

use App\Entities\User;

class UserRepository extends EntityRepository
{

    /**
     * @inheritdoc 
     */
    public function __construct($entityClassName = User::class)
    {
        parent::__construct($entityClassName);
    }

    public function create(User $user)
    {
        return $this->store($user);
    }

    public function store(User $user)
    {
        $this->getEntityManager()->persist($user);
        $this->getEntityManager()->flush();
        
        return $user;
    }
}
