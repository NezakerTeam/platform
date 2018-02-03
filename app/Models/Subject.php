<?php
namespace App\Models;

use Backpack\CRUD\CrudTrait;
use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $grade_id
 * @property string $name
 * @property string $description
 * @property boolean $status
 * @property string $created_at
 * @property string $updated_at
 * @property integer $ordering
 * @property Grade $grade
 * @property Lesson[] $lessons
 */
class Subject extends Model
{

    use CrudTrait;

    const STATUS_ACTIVE   = 1;
    const STATUS_INACTIVE = 2;

    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'subject';

    /**
     * @var array
     */
    protected $fillable = ['grade_id', 'name', 'description', 'status', 'image', 'created_at', 'updated_at', 'ordering'];

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
     * @return self
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
     * @return self
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
     * Set type.
     *
     * @param bool $type
     *
     * @return self
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
     * Set status.
     *
     * @param bool $status
     *
     * @return self
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
     * Get statuses.
     *
     * @return array()
     */
    public static function getStatusesList()
    {
        return [
            self::STATUS_ACTIVE   => 'Active',
            self::STATUS_INACTIVE => 'InActive',
        ];
    }

    public function getStatusName()
    {
        return $this->getStatusesList()[$this->getStatus()];
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
     * @return self
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
     * @return self
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
     * Set grade.
     *
     * @param Grade $grade
     *
     * @return Grade
     */
    public function setGrade(Grade $grade = null)
    {
        $this->grade = $grade;

        return $this;
    }

    /**
     * Get grade.
     *
     * @return Grade
     */
    public function getGrade()
    {
        return $this->grade;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function grade()
    {
        return $this->belongsTo('App\Models\Grade', 'grade_id');
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
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }

    public function setImageAttribute($value)
    {
        $attributeName    = "image";
        $disk             = "s3";
        $destination_path = "uploads/subject/image";

        // if the image was erased
        if ($value == null) {
            // delete the image from disk
            \Storage::disk($disk)->delete($this->{$attributeName});

            // set null in the database column
            $this->attributes[$attributeName] = null;
        }

        // if a base64 was sent, store it in the db
        if (starts_with($value, 'data:image')) {
            // 0. Make the image
            $image                            = \Image::make($value);
            // 1. Generate a filename.
            $filename                         = md5($value . time()) . '.jpg';
            // 2. Store the image on disk.
            \Storage::disk($disk)->put($destination_path . '/' . $filename, (string) $image->stream(), 'public');
            // 3. Save the path to the database
            $this->attributes[$attributeName] = $filename;
        }
    }

    public static function getImagePath()
    {
        return \Illuminate\Support\Facades\Storage::cloud()->url("uploads/subject/image/");
    }

    public function getImageUrl()
    {
        $this->getImagePath() . '/' . $this->image;
    }
}
