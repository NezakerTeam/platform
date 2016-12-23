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

    private function bindLessonData(Lesson $lesson, $data)
    {
        $lesson->setName($data['name']);
        $lesson->setDescription($data['description']);
        $lesson->setMaterialUrl($data['materialUrl']);

        if (isset($data['youtubeVideoId']) && Auth::User()->hasType(\App\Entities\User::TYPE_ADMIN_USER)) {
            $youtubeVideoId = $data['youtubeVideoId'];
            $lesson->setYoutubeVideoId($youtubeVideoId);
        }

        $subject = EntityManager::getReference(Subject::class, $data['subject']);
        $lesson->setSubject($subject);

        $lesson->setSemester($data['semester']);

        $lesson->setAuthor(Auth::user());

        if ((isset($data['stauts']) && $data['status'] == Lesson::STATUS_PENDIND_APPROVAL) ||
            Auth::User()->hasType(\App\Entities\User::TYPE_ADMIN_USER)) {
            $lesson->setStatus($data['status']);
        }


        return $lesson;
    }

    public function addLesson($data)
    {
        $lesson = $this->bindLessonData(new Lesson(), $data);

        // Save the entity
        $lesson = EntityManager::getRepository(Lesson::class)->store($lesson);

        return $lesson;
    }

    public function editLesson(Lesson $lesson, $data)
    {
        $lesson = $this->bindLessonData($lesson, $data);

        // Save the entity
        $lesson = EntityManager::getRepository(Lesson::class)->store($lesson);

        return $lesson;
    }

    private function fetchYoutubeVideoThumb($videoId)
    {
        $videoThumb = '';

        $client = new \Google_Client();
        $client->setDeveloperKey('AIzaSyC9mvkNGG80_yA-c-2_1Ttak1OtI1ryV2o');

        // Define an object that will be used to make all API requests.
        $youtube = new \Google_Service_YouTube($client);

        // Call the YouTube Data API's videos.list method to retrieve videos.
        $videos = $youtube->videos->listVideos('snippet', ['id' => $videoId]);

        // If $videos is empty, the specified video was not found.
        if ($videos->count() <= 0) {
            
        } else {
            $video = $videos->current();
            $videoThumb = $video->getSnippet()->getThumbnails()->getDefault()->getUrl();
        }

        return $videoThumb;
    }
}
