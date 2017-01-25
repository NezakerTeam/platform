<?php
namespace App\Models\Repositories;

class LessonRepository extends EntityRepository
{

    /**
     * @inheritdoc 
     */
    protected static function getModel()
    {
        return new \App\Models\Lesson();
    }

    public function store(Lesson $lesson)
    {
        $this->getEntityManager()->persist($lesson);
        $this->getEntityManager()->flush();

        return $lesson;
    }

    public function findById($id)
    {
        return $this->find($id);
    }

    public static function getAll($subjectsIds = [], $gradesIds = [], $stagesIds = [], $activeOnly = null, $offset = 0, $limit = 8)
    {

        $LessonQB = self::getModel()->select('lesson.*')
        ;

        if (!empty($subjectsIds)) {
            $LessonQB = $LessonQB->whereIn('subject_id', $subjectsIds);
        }

        if (!empty($gradesIds) || !empty($stagesIds)) {
            $LessonQB = $LessonQB->join('subject', 'subject.id', '=', 'lesson.subject_id');

            if (!empty($gradesIds)) {
                $LessonQB = $LessonQB->whereIn('grade_id', $gradesIds);
            }

            if (!empty($stagesIds)) {
                $LessonQB = $LessonQB->join('grade', 'grade.id', '=', 'subject.grade_id')
                    ->whereIn('stage_id', $stagesIds);
            }
        }

        if ($activeOnly !== null) {
            $LessonQB = $LessonQB->where('lesson.status', \App\Models\Lesson::STATUS_ACTIVE);
        }

        if ($limit >= 0) {
            $LessonQB = $LessonQB->limit($limit)
                ->offset($offset);
        }

        $lessons = $LessonQB
            ->orderBy('lesson.subject_id', 'ASC')
            ->orderBy('lesson.ordering', 'ASC')
            ->get();

        return $lessons;
    }
}
