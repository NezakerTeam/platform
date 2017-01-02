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

    public static function getAll($subjectsIds = [], $activeOnly = null, $offset = 0, $limit = 8)
    {

        $LessonQB = self::getModel();

        if (!empty($subjectsIds)) {
            $LessonQB = $LessonQB->whereIn('subject_id', $subjectsIds);
        }

        if ($activeOnly !== null) {
            $LessonQB = $LessonQB->where('status', \App\Models\Lesson::STATUS_ACTIVE);
        }

        if ($limit >= 0) {
            $LessonQB = $LessonQB->limit($limit)
                ->offset($offset);
        }

        $lessons = $LessonQB
            ->orderBy('subject_id', 'ASC')
            ->orderBy('ordering', 'ASC')
            ->get();

        return $lessons;
    }
}
