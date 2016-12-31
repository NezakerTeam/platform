<?php
namespace App\Services;

use App\Entities\Repositories\UserRepository;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

/**
 * Description of UserService
 *
 * @author Sherif Medhat <sherif.mohamed.medhat@gmail.com>
 */
class UserService
{

    public function register($data)
    {
        $user = $this->bindUserData(new User(), $data);

        $user->setType(User::TYPE_TEACHER);
        $user->setLastLogin();

        // Save the entity
        UserRepository::store($user);

        return $user;
    }

    public function editProfile(User $user, $data)
    {
        $user = $this->bindUserData($user, $data);

        // Save the entity
        $user = UserRepository::store($user);

        return $user;
    }

    private function bindUserData(User $user, $data)
    {
        $user->setFirstName($data['first_name']);
        $user->setLastName($data['last_name']);
        $user->setEmail($data['email']);

        // Hash & set the password
        if (isset($data['password'])) {
            $password = Hash::make($data['password']);
            $user->setPassword($password);
        }

        // Set the city
        $user->setCityId($data['city_id']);

        $user->setPhoneNumbers($data['phone_numbers']);

        return $user;
    }
}
