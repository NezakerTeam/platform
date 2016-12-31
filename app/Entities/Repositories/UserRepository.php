<?php
namespace App\Entities\Repositories;

use App\Models\User;

class UserRepository extends EntityRepository
{

    /**
     * @inheritdoc 
     */
    protected static function getModel()
    {
        return new \App\Models\User();
    }

    public function create(User $user)
    {
        return $this->store($user);
    }

    public static function store(User $user)
    {
        $user->save();

        return $user;
    }
}
