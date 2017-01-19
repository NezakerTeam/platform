<?php
namespace App\Models;

use App\Services\ContentService;
use Backpack\CRUD\CrudTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

/**
 * @property integer $id
 * @property integer $lesson_id
 * @property integer $author_id
 * @property string $description
 * @property integer $status
 * @property integer $type
 * @property string $created_at
 * @property string $updated_at
 * @property string $youtube_video_id
 * @property string $material_url
 * @property string $thumbnail
 * @property Lesson $lesson
 * @property User $user
 */
class Content extends Model
{

    use CrudTrait;

    const STATUS_PENDIND_APPROVAL = 1;
    const STATUS_APPROVED = 2;
    const STATUS_DISAPPROVED = 3;
    const TYPE_VIDEO = 1;

    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'content';

    /**
     * @var array
     */
    protected $fillable = ['lesson_id', 'author_id', 'description', 'status', 'type', 'created_at', 'updated_at', 'youtube_video_id', 'material_url', 'thumbnail'];

    /**
     * Default values for attributes
     * @var  array an array with attribute as key and default as value
     */
    protected $attributes = [
        'description' => '',
        'status' => self::STATUS_PENDIND_APPROVAL,
        'type' => self::TYPE_VIDEO,
    ];

    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name.
     *
     * @param string $name
     *
     * @return Lesson
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set description.
     *
     * @param string $description
     *
     * @return Lesson
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description.
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set Youtube video id.
     *
     * @param string $youtubeVideoId
     *
     * @return Lesson
     */
    public function setYoutubeVideoId($youtubeVideoId)
    {
        $this->youtube_video_id = $youtubeVideoId;

        return $this;
    }

    /**
     * Get Youtube video id.
     *
     * @return string
     */
    public function getYoutubeVideoId()
    {
        return $this->youtube_video_id;
    }

    /**
     * Set lesson thumb.
     *
     * @param string $thumbnail
     *
     * @return Lesson
     */
    public function setThumbnail($thumbnail)
    {
        $this->thumbnail = $thumbnail;

        return $this;
    }

    /**
     * Get lesson thumb.
     *
     * @return string
     */
    public function getThumbnail()
    {
        return $this->thumbnail;
    }

    /**
     * Set material URL.
     *
     * @param string $materialUrl
     *
     * @return Lesson
     */
    public function setMaterialUrl($materialUrl)
    {
        $this->material_url = $materialUrl;

        return $this;
    }

    /**
     * Get material Url.
     *
     * @return string
     */
    public function getMaterialUrl()
    {
        return $this->material_url;
    }

    /**
     * Set status.
     *
     * @param bool $status
     *
     * @return Lesson
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status.
     *
     * @return bool
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set type.
     *
     * @param bool $type
     *
     * @return Lesson
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type.
     *
     * @return bool
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set ordering.
     *
     * @param bool $ordering
     *
     * @return Lesson
     */
    public function setOrdering($ordering)
    {
        $this->ordering = $ordering;

        return $this;
    }

    /**
     * Get ordering.
     *
     * @return bool
     */
    public function getOrdering()
    {
        return $this->ordering;
    }

    /**
     * Set createdAt.
     *
     * @param \DateTime $createdAt
     *
     * @return Lesson
     */
    public function setCreatedAt($createdAt)
    {
        $this->created_at = $createdAt;

        return $this;
    }

    /**
     * Get createdAt.
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * Set updatedAt.
     *
     * @param \DateTime $updatedAt
     *
     * @return Lesson
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updated_at = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt.
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    /**
     * Set the lesson id.
     *
     * @param int $lessonId
     *
     * @return self
     */
    public function setLessonId($lessonId)
    {
        $this->lesson_id = $lessonId;

        return $this;
    }

    /**
     * Get lesson id.
     *
     * @return int
     */
    public function getLessonId()
    {
        return $this->lesson_id;
    }

    /**
     * Set author.
     *
     * @param int $authorId
     *
     * @return self
     */
    public function setAuthorId(int $authorId)
    {
        $this->author_id = $authorId;

        return $this;
    }

    /**
     * Set semester.
     *
     * @param int $semester
     *
     * @return Lesson
     */
    public function setSemester($semester)
    {
        $this->semester = $semester;

        return $this;
    }

    /**
     * Get semester.
     *
     * @return int
     */
    public function getSemester()
    {
        return $this->semester;
    }

    /**
     * Get semesters.
     *
     * @return array()
     */
    public static function getSemestersList()
    {
        return [
            self::SEMESTER_FIRST => 'First',
            self::SEMESTER_SECOND => 'Second'
        ];
    }

    /**
     * Get statuses.
     *
     * @return array()
     */
    public static function getStatusesList()
    {
        return [
            self::STATUS_PENDIND_APPROVAL => 'Pending Approval',
            self::STATUS_APPROVED => 'Approved',
            self::STATUS_DISAPPROVED => 'Disapproved',
        ];
    }

    public function getStatusName()
    {
        return $this->getStatusesList()[$this->getStatus()];
    }

    public function getYoutubeUrl()
    {
        $url = '';
        $youtubeVideoId = $this->getYoutubeVideoId();

        if (!empty($youtubeVideoId)) {
            $url = "https://www.youtube.com/watch?v=$youtubeVideoId";
        }

        return $url;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function lesson()
    {
        return $this->belongsTo('App\Models\Lesson');
    }

    public function getLesson()
    {
        return $this->lesson;
    }

    public function getSubject()
    {
        return $this->getLesson()->getSubject();
    }

    public function getSubjectId()
    {
        return $this->getSubject()->getId();
    }

    public function getGrade()
    {
        return $this->getSubject()->getGrade();
    }

    public function getGradeId()
    {
        return $this->getGrade()->getId();
    }

    public function getStage()
    {
        return $this->getGrade()->getStage();
    }

    public function getStageId()
    {
        return $this->getStage()->getId();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function author()
    {
        return $this->belongsTo('App\Models\User', 'author_id');
    }

    /**
     * Get author.
     *
     * @return User
     */
    public function getAuthor()
    {
        return $this->author;
    }

    protected static function boot()
    {
        parent::boot();

        static::saving(function(Content $content) {
            if (empty($content->author_id)) {
                $content->setAuthorId(Auth::id());
            }

            $oldYoutubeVideoId = $content->getOriginal('youtube_video_id');
            $currentYoutubeVideoId = $content->youtube_video_id;
            if (!empty($currentYoutubeVideoId) && $oldYoutubeVideoId != $currentYoutubeVideoId) {
                $thumbnail = app(ContentService::class)->fetchYoutubeVideoThumb($currentYoutubeVideoId);
                $content->setThumbnail($thumbnail);
            }
        });
    }
}
