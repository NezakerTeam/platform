<?php
namespace App\Models;

use Backpack\CRUD\CrudTrait;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * @property integer $id
 * @property integer $city_id
 * @property string $username
 * @property string $email
 * @property integer $status
 * @property string $password
 * @property string $last_login
 * @property string $first_name
 * @property string $last_name
 * @property string $birth_date
 * @property integer $gender
 * @property string $photo_name
 * @property string $address
 * @property string $phone_numbers
 * @property integer $type
 * @property string $created_at
 * @property string $updated_at
 * @property City $city
 * @property Comment[] $comments
 * @property Content[] $contents
 */
class User extends Authenticatable
{

    use CrudTrait;

    const TYPE_NONE = 0;
    const TYPE_STUDENT_PARENT = 1;
    const TYPE_TEACHER = 2;
    const TYPE_ADMIN_USER = 3;
    // Define the gender values
    const GENDER_UNDEFINED = 0;
    const GENDER_MALE = 1;
    const GENDER_FEMALE = 2;
    // Status values
    const STATUS_PENDIND_CONFIRMATION = 1;
    const STATUS_CONFIRMED = 2;

    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'user';

    /**
     * Default values for attributes
     * @var  array an array with attribute as key and default as value
     */
    protected $attributes = [
        'status' => self::STATUS_PENDIND_CONFIRMATION,
        'gender' => self::GENDER_UNDEFINED,
    ];

    /**
     * @var array
     */
    protected $fillable = ['city_id', 'username', 'email', 'status', 'password', 'last_login', 'first_name', 'last_name', 'birth_date', 'gender', 'photo_name', 'address', 'phone_numbers', 'type', 'created_at', 'updated_at'];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'phone_numbers' => 'array',
    ];
    protected $dates = ['last_login'];

    protected static function boot()
    {
        parent::boot();

        static::updating(function(User $user) {
            $now = new \DateTime();
            $user->setUpdatedAt($now);
        });

        static::creating(function(User $user) {
            $now = new \DateTime();
            $user->setCreatedAt($now);
            $user->setUpdatedAt($now);
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
     * Set firstName.
     *
     * @param string $firstName
     *
     * @return self
     */
    public function setFirstName($firstName)
    {
        $this->first_name = $firstName;

        return $this;
    }

    /**
     * Get firstName.
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->first_name;
    }

    /**
     * Set lastName.
     *
     * @param string $lastName
     *
     * @return self
     */
    public function setLastName($lastName)
    {
        $this->last_name = $lastName;

        return $this;
    }

    /**
     * Get lastName.
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->last_name;
    }

    /**
     * Get the full name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->getFirstName() . ' ' . $this->getLastName();
    }

    /**
     * Set birthDate.
     *
     * @param \DateTime $birthDate
     *
     * @return self
     */
    public function setBirthDate($birthDate)
    {
        $this->birthDate = $birthDate;

        return $this;
    }

    /**
     * Get birthDate.
     *
     * @return \DateTime
     */
    public function getBirthDate()
    {
        return $this->birthDate;
    }

    /**
     * Set type.
     *
     * @param int $type
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
     * @return int
     */
    public function getType()
    {
        return $this->type;
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
     * Set photoName.
     *
     * @param string $photoName
     *
     * @return self
     */
    public function setPhotoName($photoName)
    {
        $this->photo_name = $photoName;

        return $this;
    }

    /**
     * Get photoName.
     *
     * @return string
     */
    public function getPhotoName()
    {
        return $this->photo_name;
    }

    /**
     * Set address.
     *
     * @param string $address
     *
     * @return self
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address.
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set city.
     *
     * @param int $cityId
     *
     * @return self
     */
    public function setCityId($cityId)
    {
        $this->city_id = $cityId;

        return $this;
    }

    /**
     * Get city.
     *
     * @return City
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set phoneNumbers.
     *
     * @param array $phoneNumbers
     *
     * @return self
     */
    public function setPhoneNumbers($phoneNumbers)
    {
        $this->phone_numbers = $phoneNumbers;

        return $this;
    }

    /**
     * Get phoneNumbers.
     *
     * @return array
     */
    public function getPhoneNumbers()
    {
        return $this->phone_numbers;
    }

    /**
     * {@inheritdoc}
     */
    public function addRole($role)
    {
        $role = strtoupper($role);
        if ($role === static::ROLE_DEFAULT) {
            return $this;
        }

        if (!in_array($role, $this->roles, true)) {
            $this->roles[] = $role;
        }

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function serialize()
    {
        return serialize(array(
            $this->username,
            $this->expired,
            $this->locked,
            $this->credentialsExpired,
            $this->status,
            $this->id,
            $this->expiresAt,
            $this->credentialsExpireAt,
            $this->email,
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function unserialize($serialized)
    {
        $data = unserialize($serialized);
        // add a few extra elements in the array to ensure that we have enough keys when unserializing
        // older data which does not include all properties.
        $data = array_merge($data, array_fill(0, 2, null));

        list(
            $this->username,
            $this->expired,
            $this->locked,
            $this->status,
            $this->id,
            $this->email,
            ) = $data;
    }

    /**
     * Gets the  username in search and sort queries.
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Gets email.
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * {@inheritdoc}
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Gets the last login time.
     *
     * @return \DateTime
     */
    public function getLastLogin()
    {
        return $this->last_login;
    }

    /**
     * {@inheritdoc}
     */
    public function getConfirmationToken()
    {
        return $this->confirmationToken;
    }

    /**
     * {@inheritdoc}
     */
    public function getRoles()
    {
        $roles = $this->roles;

        foreach ($this->getGroups() as $group) {
            $roles = array_merge($roles, $group->getRoles());
        }

        // we need to make sure to have at least one role
        $roles[] = static::ROLE_DEFAULT;

        return array_unique($roles);
    }

    /**
     * Never use this to check if this user has access to anything!
     *
     * Use the AuthorizationChecker, or an implementation of AccessDecisionManager
     * instead, e.g.
     *
     *         $authorizationChecker->isGranted('ROLE_USER');
     *
     * @param string $role
     *
     * @return bool
     */
    public function hasRole($role)
    {
        return in_array(strtoupper($role), $this->getRoles(), true);
    }

    /**
     * @return bool
     */
    public function isCredentialsExpired()
    {
        return !$this->isCredentialsNonExpired();
    }

    /**
     * {@inheritdoc}
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @return bool
     */
    public function isExpired()
    {
        return !$this->isAccountNonExpired();
    }

    /**
     * @return bool
     */
    public function isLocked()
    {
        return !$this->isAccountNonLocked();
    }

    /**
     * Tells if the the given user has the super admin role.
     *
     * @return bool
     */
    public function isSuperAdmin()
    {
        return $this->hasRole(static::ROLE_SUPER_ADMIN);
    }

    /**
     * Removes a role to the user.
     *
     * @param string $role
     *
     * @return self
     */
    public function removeRole($role)
    {
        if (false !== $key = array_search(strtoupper($role), $this->roles, true)) {
            unset($this->roles[$key]);
            $this->roles = array_values($this->roles);
        }

        return $this;
    }

    /**
     * Sets the username.
     *
     * @param string $username
     *
     * @return self
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Sets the email.
     *
     * @param string $email
     *
     * @return self
     */
    public function setEmail($email)
    {
        $this->email = $email;

        $this->setUsername($email);

        return $this;
    }

    /**
     * @param int $status
     *
     * @return self
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Sets this user to expired.
     *
     * @param bool $boolean
     *
     * @return self
     */
    public function setExpired($boolean)
    {
        $this->expired = (bool) $boolean;

        return $this;
    }

    /**
     * @param \DateTime $date
     *
     * @return self
     */
    public function setExpiresAt(\DateTime $date = null)
    {
        $this->expiresAt = $date;

        return $this;
    }

    /**
     * Sets the hashed password.
     *
     * @param string $password
     *
     * @return self
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Sets the super admin status.
     *
     * @param bool $boolean
     *
     * @return self
     */
    public function setSuperAdmin($boolean)
    {
        if (true === $boolean) {
            $this->addRole(static::ROLE_SUPER_ADMIN);
        } else {
            $this->removeRole(static::ROLE_SUPER_ADMIN);
        }

        return $this;
    }

    /**
     * Sets the last login time.
     *
     * @param \DateTime $time
     *
     * @return self
     */
    public function setLastLogin(\DateTime $time = null)
    {
        if ($time == null) {
            $time = new \DateTime();
        }

        $this->last_login = $time;

        return $this;
    }

    /**
     * Sets the locking status of the user.
     *
     * @param bool $boolean
     *
     * @return self
     */
    public function setLocked($boolean)
    {
        $this->locked = $boolean;

        return $this;
    }

    /**
     * Sets the confirmation token.
     *
     * @param string $confirmationToken
     *
     * @return self
     */
    public function setConfirmationToken($confirmationToken)
    {
        $this->confirmationToken = $confirmationToken;

        return $this;
    }

    /**
     * Sets the timestamp that the user requested a password reset.
     *
     * @param null|\DateTime $date
     *
     * @return self
     */
    public function setPasswordRequestedAt(\DateTime $date = null)
    {
        $this->passwordRequestedAt = $date;

        return $this;
    }

    /**
     * Gets the timestamp that the user requested a password reset.
     *
     * @return null|\DateTime
     */
    public function getPasswordRequestedAt()
    {
        return $this->passwordRequestedAt;
    }

    /**
     * Checks whether the password reset request has expired.
     *
     * @param int $ttl Requests older than this many seconds will be considered expired
     *
     * @return int
     */
    public function isPasswordRequestNonExpired($ttl)
    {
        return $this->getPasswordRequestedAt() instanceof \DateTime &&
            $this->getPasswordRequestedAt()->getTimestamp() + $ttl > time();
    }

    /**
     * Sets the roles of the user.
     *
     * This overwrites any previous roles.
     *
     * @param array $roles
     *
     * @return self
     */
    public function setRoles(array $roles)
    {
        $this->roles = array();

        foreach ($roles as $role) {
            $this->addRole($role);
        }

        return $this;
    }

    /**
     * @ORM\PrePersist 
     */
    public function prePersist()
    {
        $now = new \DateTime();
        $this->setLastLogin($now);

        $this->setUsername($this->getEmail());
    }

    /**
     * Check whether this user has a specific type
     * 
     * @param int $userType The checked user type
     * 
     * @return bool
     */
    public function hasType(int $userType)
    {
        return true;
        return (bool) ($this->getType() == $userType);
    }

    /**
     * Get the user's first name.
     *
     * @param  string  $value
     * @return string
     */
    public function getNameAttribute()
    {
        return ucfirst($this->first_name . ' ' . $this->last_name);
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
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function city()
    {
        return $this->belongsTo('App\Models\City');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany('App\Models\Comment', 'author_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function contents()
    {
        return $this->hasMany('App\Models\Content', 'author_id');
    }
}
