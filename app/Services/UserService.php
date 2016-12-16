<?php
namespace App\Services;

use App\Entities\City;
use App\Entities\Teacher;
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
        $city = EntityManager::getReference(City::class, $data['cityId']);
        $teacher->setCity($city);

        $teacher->setPhoneNumbers([$data['phoneNumbers']]);

        // Save the entity
        EntityManager::getRepository(Teacher::class)->create($teacher);
        
        return $teacher;
    }
}
