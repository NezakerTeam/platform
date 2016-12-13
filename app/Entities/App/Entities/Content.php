<?php

namespace App\Entities;

/**
 * Content
 */
class Content
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
private $status;

/**
 * @var boolean
 */
private $type;

/**
 * @var boolean
 */
private $ordering;

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
private $category;

/**
 * @var \App\Entities\User
 */
private $author;


/**
 * Set name
 *
 * @param string $name
 *
 * @return Content
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
 * @return Content
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
 * Set status
 *
 * @param boolean $status
 *
 * @return Content
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
 * Set type
 *
 * @param boolean $type
 *
 * @return Content
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
 * Set ordering
 *
 * @param boolean $ordering
 *
 * @return Content
 */
public function setOrdering($ordering)
{
$this->ordering = $ordering;

return $this;
}

/**
 * Get ordering
 *
 * @return boolean
 */
public function getOrdering()
{
return $this->ordering;
}

/**
 * Set createdAt
 *
 * @param \DateTime $createdAt
 *
 * @return Content
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
 * @return Content
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
 * Set category
 *
 * @param \App\Entities\Category $category
 *
 * @return Content
 */
public function setCategory(\App\Entities\Category $category = null)
{
$this->category = $category;

return $this;
}

/**
 * Get category
 *
 * @return \App\Entities\Category
 */
public function getCategory()
{
return $this->category;
}

/**
 * Set author
 *
 * @param \App\Entities\User $author
 *
 * @return Content
 */
public function setAuthor(\App\Entities\User $author = null)
{
$this->author = $author;

return $this;
}

/**
 * Get author
 *
 * @return \App\Entities\User
 */
public function getAuthor()
{
return $this->author;
}
}

