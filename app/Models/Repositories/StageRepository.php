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

    public static function getAll($activeOnly = false, $isGeneral = null, $offset = -1, $limit = -1)
    {
        $stagesQB = self::getModel()->with('grades');

        if ($activeOnly !== false) {
            $stagesQB = $stagesQB->where('status', \App\Models\Stage::STATUS_ACTIVE);
        }

        if ($isGeneral !== null) {
            $stagesQB = $stagesQB->where('is_general', (bool) $isGeneral);
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
