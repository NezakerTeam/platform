<?php
namespace App\Models\Repositories;

class StageRepository extends EntityRepository
{

    /**
     * @inheritdoc 
     */
    protected static function getModel()
    {
        return new \App\Models\Stage();
    }

    public static function getAll($activeOnly = null, $offset = 0, $limit = 6)
    {
        $stagesQB = self::getModel()
            ->with('grades')
        ;

        if ($activeOnly !== null) {
            $stagesQB = $stagesQB->where('status', \App\Models\Stage::STATUS_ACTIVE);
        }

        if ($limit >= 0) {
            $stagesQB = $stagesQB->limit($limit)
                ->offset($offset);
        }

        $stages = $stagesQB
            ->orderBy('ordering', 'ASC')
            ->get();

        return $stages;
    }
}
