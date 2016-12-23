<?php
namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Lesson.
 *
 * @ORM\Table(name="lesson", indexes={@ORM\Index(name="subject_id", columns={"subject_id"}), @ORM\Index(name="author", columns={"author_id"})})
 * @ORM\Entity(repositoryClass="App\Entities\Repositories\LessonRepository") 
 * @ORM\HasLifecycleCallbacks
 */
class Lesson
{

    const STATUS_PENDIND_APPROVAL = 1;
    const STATUS_APPROVED = 2;
    const STATUS_DISAPPROVED = 3;
    const TYPE_VIDEO = 1;
    const SEMESTER_FIRST = 1;
    const SEMESTER_SECOND = 2;

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", length=65535, nullable=false)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="youtube_url", type="text", length=1000, nullable=true)
     */
    private $youtubeUrl;

    /**
     * @var string
     *
     * @ORM\Column(name="material_url", type="text", length=1000, nullable=false)
     */
    private $materialUrl;

    /**
     * @var bool
     *
     * @ORM\Column(name="status", type="smallint", nullable=false)
     */
    private $status = self::STATUS_PENDIND_APPROVAL;

    /**
     * @var bool
     *
     * @ORM\Column(name="type", type="smallint", nullable=false)
     */
    private $type = self::TYPE_VIDEO;

    /**
     * @var int
     *
     * @ORM\Column(name="ordering", type="smallint", nullable=false)
     */
    private $ordering = 1;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=false)
     */
    private $createdAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated_at", type="datetime", nullable=false)
     */
    private $updatedAt;

    /**
     * @var Subject
     *
     * @ORM\ManyToOne(targetEntity="Subject")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="subject_id", referencedColumnName="id", nullable=false)
     * })
     */
    private $subject;

    /**
     * @var int
     *
     * @ORM\Column(name="semester", type="smallint", nullable=false)
     */
    private $semester = self::SEMESTER_FIRST;

    /**
     * @var User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="author_id", referencedColumnName="id", nullable=false)
     * })
     */
    private $author;

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
     * Set Youtube URL.
     *
     * @param string $youtubeUrl
     *
     * @return Lesson
     */
    public function setYoutubeUrl($youtubeUrl)
    {
        $this->youtubeUrl = $youtubeUrl;

        return $this;
    }

    /**
     * Get Youtube URL.
     *
     * @return string
     */
    public function getYoutubeUrl()
    {
        return $this->youtubeUrl;
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
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt.
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
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
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt.
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
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
            self::STATUS_PENDIND_APPROVAL => 'Pending Approval',
            self::STATUS_APPROVED => 'Approved',
            self::STATUS_DISAPPROVED => 'Disapproved',
        ];
    }

    public function __get($name)
    {
        if (property_exists($this, $name)) {
            return $this->$name;
        }
    }

    public function __isset($name)
    {
        return isset($this->$name);
    }
    
    public function __toString()
    {
        'asd';
    }
}
