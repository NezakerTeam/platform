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

    public static function getAll($activeOnly = false, $generalOnly = false, $offset = -1, $limit = -1)
    {
        $stagesQB = self::getModel()->with('grades');

        if ($activeOnly !== false) {
            $stagesQB = $stagesQB->where('status', \App\Models\Stage::STATUS_ACTIVE);
        }

        if ($generalOnly !== false) {
            $stagesQB = $stagesQB->where('is_general', true);
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
