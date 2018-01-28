<?php
namespace App\Models\Repositories;

class EducationTypeRepository extends EntityRepository
{

    /**
     * @inheritdoc 
     */
    protected static function getModel()
    {
        return new \App\Models\EducationType();
    }

    public static function getAll()
    {
        $type = self::getModel()
            ->orderBy('id', 'ASC')
            ->get();

        return $type;
    }
}
