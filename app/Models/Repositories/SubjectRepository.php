<?php
namespace App\Models\Repositories;

class SubjectRepository extends EntityRepository
{

    /**
     * @inheritdoc 
     */
    protected static function getModel()
    {
        return new \App\Models\Subject();
    }

    /**
     * Get a list of subjects 
     * 
     * @return array [id => name]
     */
    public static function getList()
    {

        $subjects = self::getModel()::
            orderBy('ordering', 'ASC')
            ->get();

        return $subjects;
    }

    /**
     * Get all the subjects
     * 
     * @param int $gradeId  A specific grade id
     * 
     * @return \Doctrine\Common\Collections\Collection
     */
    public static function getAll($gradeIds = [], $activeOnly = null, $offset = 0, $limit = 6)
    {

        $subjectQB = self::getModel();

        if (!empty($gradeIds)) {
            $subjectQB = $subjectQB->whereIn('grade_id', $gradeIds);
        }

        if ($activeOnly !== null) {
            $subjectQB = $subjectQB->where('subject.status', \App\Models\Subject::STATUS_ACTIVE);
        }

        if ($limit >= 0) {
            $subjectQB = $subjectQB->limit($limit)
                ->offset($offset);
        }

        $subjects = $subjectQB
            ->orderBy('subject.ordering', 'ASC')
            ->orderBy('subject.grade_id', 'ASC')
            ->get();

        return $subjects;
    }
}
