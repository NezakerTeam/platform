<?php

namespace App\Entities;

/**
 * Category
 */
class Category
{
/**
 * @var string
 */
private $name;

/**
 * @var string
 */
private $description;

/**
 * @var boolean
 */
private $type;

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
 * @var \App\Entities\Category
 */
private $parent;


/**
 * Set name
 *
 * @param string $name
 *
 * @return Category
 */
public function setName($name)
{
$this->name = $name;

return $this;
}

/**
 * Get name
 *
 * @return string
 */
public function getName()
{
return $this->name;
}

/**
 * Set description
 *
 * @param string $description
 *
 * @return Category
 */
public function setDescription($description)
{
$this->description = $description;

return $this;
}

/**
 * Get description
 *
 * @return string
 */
public function getDescription()
{
return $this->description;
}

/**
 * Set type
 *
 * @param boolean $type
 *
 * @return Category
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
 * Set status
 *
 * @param boolean $status
 *
 * @return Category
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
 * @return Category
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
 * @return Category
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

/**
 * Set parent
 *
 * @param \App\Entities\Category $parent
 *
 * @return Category
 */
public function setParent(\App\Entities\Category $parent = null)
{
$this->parent = $parent;

return $this;
}

/**
 * Get parent
 *
 * @return \App\Entities\Category
 */
public function getParent()
{
return $this->parent;
}
}

