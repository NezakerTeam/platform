<?php
namespace App\Models\Repositories;

use App\Models\User;

class UserRepository extends EntityRepository
{

    /**
     * @return Model 
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

    public static function getByEmail($email)
    {
        $user = self::getModel()->where('email', $email)->first();

        return $user;
    }
}
