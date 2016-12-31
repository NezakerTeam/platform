<?php
namespace App\Entities\Repositories;

class GradeRepository extends EntityRepository
{

    /**
     * @inheritdoc 
     */
    protected static function getModel()
    {
        return new \App\Models\Grade();
    }

    public static function getAll($stagesIds = [], $activeOnly = null, $offset = 0, $limit = 6)
    {

        $gradesQB = self::getModel();

        if (!empty($stagesIds)) {
            $gradesQB = $gradesQB->whereIn('stage_id', $stagesIds);
        }

        if ($activeOnly !== null) {
            $gradesQB = $gradesQB->where('status', \App\Models\Grade::STATUS_ACTIVE);
        }

        if ($limit >= 0) {
            $gradesQB = $gradesQB->limit($limit)
                ->offset($offset);
        }

        $grades = $gradesQB
            ->orderBy('stage_id', 'ASC')
            ->orderBy('ordering', 'ASC')
            ->get();

        return $grades;
    }
}
