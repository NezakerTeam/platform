<?php
namespace App\Services;

use App\Entities\City;
use App\Entities\Repositories\TeacherRepository;
use App\Entities\Teacher;
use App\Entities\User;
use Illuminate\Support\Facades\Hash;
use LaravelDoctrine\ORM\Facades\EntityManager;

/**
 * Description of UserService
 *
 * @author Sherif Medhat <sherif.mohamed.medhat@gmail.com>
 */
class UserService
{

    public function register($data)
    {
        $teacher = new Teacher();

        $teacher->setFirstName($data['firstName']);
        $teacher->setLastName($data['lastName']);
        $teacher->setEmail($data['email']);

        // Hash the password
        $password = Hash::make($data['password']);
        $teacher->setPassword($password);

        // Set the city
        $city = EntityManager::getReference(City::class, $data['city']);
        $teacher->setCity($city);

        $teacher->setPhoneNumbers([$data['phoneNumbers']]);

        // Save the entity
        EntityManager::getRepository(Teacher::class)->create($teacher);

        return $teacher;
    }

    public function editProfile(User $user, $data)
    {
        $user = $this->bindUserData($user, $data);

        // Save the entity
        $user = (new TeacherRepository())->store($user);

        return $user;
    }

    private function bindUserData(User $user, $data)
    {
        $user->setFirstName($data['firstName']);
        $user->setLastName($data['lastName']);
        $user->setEmail($data['email']);

        // Hash & set the password
        if (isset($data['password'])) {
            $password = Hash::make($data['password']);
            $user->setPassword($password);
        }

        // Set the city
        $city = EntityManager::getReference(City::class, $data['city']);
        $user->setCity($city);

        $user->setPhoneNumbers($data['phoneNumbers']);

        // Save the entity
        EntityManager::getRepository(Teacher::class)->create($user);

        return $user;
    }
}
