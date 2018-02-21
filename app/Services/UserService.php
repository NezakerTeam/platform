<?php
namespace App\Services;

use App\Models\Repositories\UserRepository;
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
        if (isset($data['type'])) {
            $user->setType($data['type']);
        }

        $user->setFirstName($data['first_name']);
        $user->setLastName($data['last_name']);
        $user->setEmail($data['email']);

        // Hash & set the password
        if (isset($data['password'])) {
            $password = Hash::make($data['password']);
            $user->setPassword($password);
        }

        if (!empty($data['city_id'])) {
            // Set the city
            $user->setCityId($data['city_id']);
        }

        if (!empty($data['phone_numbers'])) {
            $user->setPhoneNumbers($data['phone_numbers']);
        }

        return $user;
    }

    public function getBySocialUser(\Laravel\Socialite\Two\User $socialUser)
    {
        $user = null;

        $socialEmail = $socialUser->getEmail();

        if (!empty($socialEmail)) {
            $user = UserRepository::getByEmail($socialEmail);

            if (empty($user)) {
                list($firstName, $lastName) = explode(' ', $socialUser->getName());

                $data = [
                    'type'       => User::TYPE_STUDENT_PARENT,
                    'first_name' => $firstName,
                    'last_name'  => $lastName,
                    'email'      => $socialUser->getEmail(),
                    'password'   => md5($socialUser->getId())
                ];

                $user = $this->register($data);
            }
        }

        return $user;
    }
}
