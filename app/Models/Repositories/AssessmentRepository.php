<?php
namespace App\Models\Repositories;

use App\Models\Assessment;

class AssessmentRepository extends EntityRepository
{

    /**
     * @inheritdoc 
     */
    protected static function getModel()
    {
        return new Assessment();
    }

    public static function getByAge($age)
    {
        $assessment = $contentsQB = self::getModel()
            ->where('age_from', '<=', $age)
            ->where('age_to', '>=', $age)
            ->first();

        return $assessment;
    }
}
