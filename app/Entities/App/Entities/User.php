<?php

namespace App\Entities;

/**
 * User
 */
class User
{
/**
 * @var integer
 */
private $id;

/**
 * @var string
 */
private $firstName;

/**
 * @var string
 */
private $lastName;

/**
 * @var \DateTime
 */
private $birthDate;

/**
 * @var integer
 */
private $gender;

/**
 * @var string
 */
private $photoName;

/**
 * @var string
 */
private $address;

/**
 * @var integer
 */
private $cityId;

/**
 * @var array
 */
private $phoneNumbers;


/**
 * Get id
 *
 * @return integer
 */
public function getId()
{
return $this->id;
}

/**
 * Set firstName
 *
 * @param string $firstName
 *
 * @return User
 */
public function setFirstName($firstName)
{
$this->firstName = $firstName;

return $this;
}

/**
 * Get firstName
 *
 * @return string
 */
public function getFirstName()
{
return $this->firstName;
}

/**
 * Set lastName
 *
 * @param string $lastName
 *
 * @return User
 */
public function setLastName($lastName)
{
$this->lastName = $lastName;

return $this;
}

/**
 * Get lastName
 *
 * @return string
 */
public function getLastName()
{
return $this->lastName;
}

/**
 * Set birthDate
 *
 * @param \DateTime $birthDate
 *
 * @return User
 */
public function setBirthDate($birthDate)
{
$this->birthDate = $birthDate;

return $this;
}

/**
 * Get birthDate
 *
 * @return \DateTime
 */
public function getBirthDate()
{
return $this->birthDate;
}

/**
 * Set gender
 *
 * @param integer $gender
 *
 * @return User
 */
public function setGender($gender)
{
$this->gender = $gender;

return $this;
}

/**
 * Get gender
 *
 * @return integer
 */
public function getGender()
{
return $this->gender;
}

/**
 * Set photoName
 *
 * @param string $photoName
 *
 * @return User
 */
public function setPhotoName($photoName)
{
$this->photoName = $photoName;

return $this;
}

/**
 * Get photoName
 *
 * @return string
 */
public function getPhotoName()
{
return $this->photoName;
}

/**
 * Set address
 *
 * @param string $address
 *
 * @return User
 */
public function setAddress($address)
{
$this->address = $address;

return $this;
}

/**
 * Get address
 *
 * @return string
 */
public function getAddress()
{
return $this->address;
}

/**
 * Set cityId
 *
 * @param integer $cityId
 *
 * @return User
 */
public function setCityId($cityId)
{
$this->cityId = $cityId;

return $this;
}

/**
 * Get cityId
 *
 * @return integer
 */
public function getCityId()
{
return $this->cityId;
}

/**
 * Set phoneNumbers
 *
 * @param array $phoneNumbers
 *
 * @return User
 */
public function setPhoneNumbers($phoneNumbers)
{
$this->phoneNumbers = $phoneNumbers;

return $this;
}

/**
 * Get phoneNumbers
 *
 * @return array
 */
public function getPhoneNumbers()
{
return $this->phoneNumbers;
}
}

