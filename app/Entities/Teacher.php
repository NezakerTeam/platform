<?php
namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * User.
 *
 * @ORM\Entity(repositoryClass="App\Entities\Repositories\TeacherRepository")
 */
class Teacher extends User
{

    protected $type = self::TYPE_TEACHER;

}
