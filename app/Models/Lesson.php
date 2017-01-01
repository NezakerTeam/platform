<?php
namespace App\Models;

use Backpack\CRUD\CrudTrait;
use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $subject_id
 * @property string $name
 * @property string $description
 * @property integer $status
 * @property integer $ordering
 * @property string $created_at
 * @property string $updated_at
 * @property integer $semester
 * @property Subject $subject
 * @property Content[] $contents
 */
class Lesson extends Model
{

    use CrudTrait;

    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 2;
    const SEMESTER_FIRST = 1;
    const SEMESTER_SECOND = 2;

    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'lesson';

    /**
     * @var array
     */
    protected $fillable = ['subject_id', 'name', 'description', 'status', 'ordering', 'created_at', 'updated_at', 'semester'];

    /**
     * The storage format of the model's date columns.
     * 
     * @var string
     */
    protected $dateFormat = 'U';

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
        $this->youtubeVideoId = $youtubeVideoId;

        return $this;
    }

    /**
     * Get Youtube video id.
     *
     * @return string
     */
    public function getYoutubeVideoId()
    {
        return $this->youtubeVideoId;
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
        $this->materialUrl = $materialUrl;

        return $this;
    }

    /**
     * Get material Url.
     *
     * @return string
     */
    public function getMaterialUrl()
    {
        return $this->materialUrl;
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
     * Set subject.
     *
     * @param Subject $subject
     *
     * @return self
     */
    public function setSubject(Subject $subject = null)
    {
        $this->subject = $subject;

        return $this;
    }

    /**
     * Get subject.
     *
     * @return Subject
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * Set author.
     *
     * @param User $author
     *
     * @return Lesson
     */
    public function setAuthor(User $author = null)
    {
        $this->author = $author;

        return $this;
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

    /**
     * @ORM\PrePersist 
     */
    public function prePersist()
    {
        $now = new \DateTime();
        $this->setCreatedAt($now);
        $this->setUpdatedAt($now);
    }

    /**
     * @ORM\PreUpdate
     */
    public function preUpdate()
    {
        $now = new \DateTime();
        $this->setUpdatedAt($now);
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
            self::STATUS_ACTIVE => 'Active',
            self::STATUS_INACTIVE => 'InActive',
        ];
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function subject()
    {
        return $this->belongsTo('App\Models\Subject');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function contents()
    {
        return $this->hasMany('App\Models\Content');
    }
}
