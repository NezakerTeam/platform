<?php
namespace App\Services;

use App\Models\Lesson;
use App\Models\Repositories\ContentRepository;
use App\Models\User;
use App\Models\Content;
use Google_Client;
use Google_Service_YouTube;
use Illuminate\Support\Facades\Auth;

/**
 * Description of UserService
 *
 * @author Sherif Medhat <sherif.mohamed.medhat@gmail.com>
 */
class ContentService
{

    private function bindContentData(Content $content, $data)
    {
        $content->setLessonId($data['lesson_id']);

        $content->setMaterialUrl($data['material_url']);

        if (isset($data['youtube_video_id']) && Auth::User()->hasRole('Admin')) {
            $youtubeVideoId = $data['youtube_video_id'];
            $content->setYoutubeVideoId($youtubeVideoId);

            $thumb = $this->fetchYoutubeVideoThumb($youtubeVideoId);
            $content->setThumbnail($thumb);
        }

        $content->setDescription($data['description']);

        $content->setAuthorId(Auth::id());

        if (isset($data['stauts']) &&
            ($data['status'] == Lesson::STATUS_PENDIND_APPROVAL || Auth::User()->hasRole('Admin'))
        ) {
            $content->setStatus($data['status']);
        }


        return $content;
    }

    public function addContent($data)
    {
        $content = $this->bindContentData(new Content(), $data);

        // Save the entity
        $content = ContentRepository::store($content);

        return $content;
    }

    public function editLesson(Content $content, $data)
    {
        $content = $this->bindContentData($content, $data);

        // Save the entity
        $content = ContentRepository::store($content);

        return $content;
    }

    public function fetchYoutubeVideoThumb($videoId)
    {
        $videoThumb = '';

        $client = new Google_Client();
        $client->setDeveloperKey(config('app.google_api_key'));

        // Define an object that will be used to make all API requests.
        $youtube = new Google_Service_YouTube($client);

        // Call the YouTube Data API's videos.list method to retrieve videos.
        $videos = $youtube->videos->listVideos('snippet', ['id' => $videoId]);

        // If $videos is empty, the specified video was not found.
        if ($videos->count() <= 0) {
            
        } else {
            $video      = $videos->current();
            $videoThumb = $video->getSnippet()->getThumbnails()->getHigh()->getUrl();
        }

        return $videoThumb;
    }

    /**
     * Get the recent posted contents
     * 
     * @param int $limit    MAx number of contents
     * @return type
     */
    public static function getRecentContents($limit = 8)
    {
        $recentContents = ContentRepository::getRecent($limit);

        return $recentContents;
    }
}
