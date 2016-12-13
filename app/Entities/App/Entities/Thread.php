<?php

namespace App\Entities;

/**
 * Thread
 */
class Thread
{
/**
 * @var boolean
 */
private $type;

/**
 * @var integer
 */
private $relatedEntityId;

/**
 * @var boolean
 */
private $status;

/**
 * @var \DateTime
 */
private $createdAt;

/**
 * @var \DateTime
 */
private $updatedAt;

/**
 * @var integer
 */
private $id;


/**
 * Set type
 *
 * @param boolean $type
 *
 * @return Thread
 */
public function setType($type)
{
$this->type = $type;

return $this;
}

/**
 * Get type
 *
 * @return boolean
 */
public function getType()
{
return $this->type;
}

/**
 * Set relatedEntityId
 *
 * @param integer $relatedEntityId
 *
 * @return Thread
 */
public function setRelatedEntityId($relatedEntityId)
{
$this->relatedEntityId = $relatedEntityId;

return $this;
}

/**
 * Get relatedEntityId
 *
 * @return integer
 */
public function getRelatedEntityId()
{
return $this->relatedEntityId;
}

/**
 * Set status
 *
 * @param boolean $status
 *
 * @return Thread
 */
public function setStatus($status)
{
$this->status = $status;

return $this;
}

/**
 * Get status
 *
 * @return boolean
 */
public function getStatus()
{
return $this->status;
}

/**
 * Set createdAt
 *
 * @param \DateTime $createdAt
 *
 * @return Thread
 */
public function setCreatedAt($createdAt)
{
$this->createdAt = $createdAt;

return $this;
}

/**
 * Get createdAt
 *
 * @return \DateTime
 */
public function getCreatedAt()
{
return $this->createdAt;
}

/**
 * Set updatedAt
 *
 * @param \DateTime $updatedAt
 *
 * @return Thread
 */
public function setUpdatedAt($updatedAt)
{
$this->updatedAt = $updatedAt;

return $this;
}

/**
 * Get updatedAt
 *
 * @return \DateTime
 */
public function getUpdatedAt()
{
return $this->updatedAt;
}

/**
 * Get id
 *
 * @return integer
 */
public function getId()
{
return $this->id;
}
}

