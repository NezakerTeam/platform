<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * User.
 *
 * @ORM\Entity(repositoryClass="UserBundle\Repository\TeacherRepository")
 */
class Teacher extends User
{
}
