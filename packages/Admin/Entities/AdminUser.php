<?php
namespace Admin\Entities;

use App\Entities\User;
use Doctrine\ORM\Mapping as ORM;

/**
 * Admin User.
 *
 * @ORM\Entity()
 */
class AdminUser extends User
{

    protected $type = self::TYPE_ADMIN_USER;

}
