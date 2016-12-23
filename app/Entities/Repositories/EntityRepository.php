<?php
namespace App\Entities\Repositories;

use Doctrine\ORM\EntityRepository as BaseEntityRepository;

class EntityRepository extends BaseEntityRepository
{

    /**
     * @inheritdoc 
     */
    public function __construct($entityClassName)
    {
        $em = app('em');
        $classMetadata = $em->getClassMetaData($entityClassName);

        parent::__construct($em, $classMetadata);
    }
}
