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

        $subjects = self::getModel()->
            orderBy('ordering', 'ASC')
            ->get();

        return $subjects;
    }

    /**
     * Get all the subjects
     * 
     * @param int $gradeId  A specific grade id
     * 
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public static function getAll($gradeIds = [], $stagesIds = [], $activeOnly = null, $offset = 0, $limit = 6)
    {
        $subjectQB = self::getModel()->select('subject.*');

        if (!empty($gradeIds)) {
            $subjectQB->whereIn('grade_id', $gradeIds);
        }

        if (!empty($stagesIds)) {
            $subjectQB->join('grade', 'subject.grade_id', '=', 'grade.id')->whereIn('grade.stage_id', $stagesIds);
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
