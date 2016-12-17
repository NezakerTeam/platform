<?php
namespace App\Services;

use App\Entities\Lesson;
use App\Entities\Subject;
use Illuminate\Support\Facades\Auth;
use LaravelDoctrine\ORM\Facades\EntityManager;

/**
 * Description of UserService
 *
 * @author Sherif Medhat <sherif.mohamed.medhat@gmail.com>
 */
class ContentService
{

    public function addLesson($data)
    {
        $lesson = new Lesson();

        $lesson->setName($data['name']);
        $lesson->setDescription($data['description']);
        $lesson->setMaterialUrl($data['materialUrl']);

        $subject = EntityManager::getReference(Subject::class, $data['subjectId']);
        $lesson->setSubject($subject);

        $lesson->setSemester($data['semester']);
        
        $lesson->setAuthor(Auth::user());

        // Save the entity
        $lesson = EntityManager::getRepository(Lesson::class)->create($lesson);

        return $lesson;
    }
}
