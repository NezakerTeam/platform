<?php
namespace App\Models;

use App\Models\Repositories\AssessmentRepository;
use DateTime;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property string $name
 * @property boolean $education_type_id
 * @property int $grade_id
 * @property boolean $gender
 * @property string $birthdate
 * @property string $created_at
 * @property string $updated_at
 * @property Grade $grade
 * @property EducationType $educationType
 * @property StudentRelation[] $studentRelations
 */
class Student extends Model
{

    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'student';

    /**
     * @var array
     */
    protected $fillable = ['name', 'education_type_id', 'grade_id', 'gender', 'birthdate', 'created_at', 'updated_at'];

    protected static function boot()
    {
        parent::boot();

        static::updating(function(Student $student) {
            $now = new DateTime();
            $student->setUpdatedAt($now);
        });

        static::creating(function(Student $student) {
            $now = new DateTime();
            $student->setCreatedAt($now);
            $student->setUpdatedAt($now);
        });
    }

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
     * Get the key name.
     *
     * @return string
     */
    public function getKeyName()
    {
        return 'id';
    }

    /**
     * Get the key value.
     *
     * @return int
     */
    public function getKey()
    {
        return $this->getId();
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
     * Get firstName.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the education type id.
     *
     * @param integer $educationTypeId
     *
     * @return self
     */
    public function setEducationType($educationTypeId)
    {
        $this->education_type_id = $educationTypeId;

        return $this;
    }

    /**
     * Get education type id.
     *
     * @return integer
     */
    public function getEducationTypeId()
    {
        return $this->education_type_id;
    }

    /**
     * Set grade id
     *
     * @param integer $gradeId
     *
     * @return self
     */
    public function setGradeId($gradeId)
    {
        $this->grade_id = $gradeId;

        return $this;
    }

    /**
     * Get grade id
     *
     * @return integer
     */
    public function getGradeId()
    {
        return $this->grade_id;
    }

    /**
     * Set birthdate.
     *
     * @param DateTime $birthdate
     *
     * @return self
     */
    public function setBirthDate($birthdate)
    {
        $this->birthdate = $birthdate;

        return $this;
    }

    /**
     * Get birthdate.
     *
     * @return DateTime
     */
    public function getBirthDate()
    {
        return $this->birthdate;
    }

    public function getAge()
    {
        return Carbon::parse($this->getBirthDate())->age;
    }

    /**
     * Set gender.
     *
     * @param int $gender
     *
     * @return self
     */
    public function setGender($gender)
    {
        $this->gender = $gender;

        return $this;
    }

    /**
     * Get gender.
     *
     * @return int
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * @return BelongsTo
     */
    public function grade()
    {
        return $this->belongsTo('App\Models\Grade');
    }

    /**
     * @return BelongsTo
     */
    public function educationType()
    {
        return $this->belongsTo('App\Models\EducationType');
    }

    /**
     * @return HasMany
     */
    public function studentRelations()
    {
        return $this->hasMany('App\Models\StudentRelation');
    }

    public function getAssessment()
    {
        $age = $this->getAge();

        $assessment = AssessmentRepository::getByAge($age);
        
        return $assessment;
    }
}
