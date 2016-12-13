<?php

namespace App\Entities;

/**
 * Comment
 */
class Comment
{
/**
 * @var string
 */
private $body;

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
 * @var \App\Entities\User
 */
private $author;

/**
 * @var \App\Entities\Thread
 */
private $thread;


/**
 * Set body
 *
 * @param string $body
 *
 * @return Comment
 */
public function setBody($body)
{
$this->body = $body;

return $this;
}

/**
 * Get body
 *
 * @return string
 */
public function getBody()
{
return $this->body;
}

/**
 * Set status
 *
 * @param boolean $status
 *
 * @return Comment
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
 * @return Comment
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
 * @return Comment
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
 * Set author
 *
 * @param \App\Entities\User $author
 *
 * @return Comment
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

/**
 * Set thread
 *
 * @param \App\Entities\Thread $thread
 *
 * @return Comment
 */
public function setThread(\App\Entities\Thread $thread = null)
{
$this->thread = $thread;

return $this;
}

/**
 * Get thread
 *
 * @return \App\Entities\Thread
 */
public function getThread()
{
return $this->thread;
}
}

