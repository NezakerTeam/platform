<?php
namespace App\Models\Repositories;

use App\Models\Content;

class ContentRepository extends EntityRepository
{

    /**
     * @inheritdoc 
     */
    protected static function getModel()
    {
        return new Content();
    }

    public static function store(Content $content)
    {
        $content->save();

        return $content;
    }

    public static function getByAuthor(int $authorId, $status = Content::STATUS_APPROVED, $offset = 0, $limit = 8)
    {

        $contentsQB = self::getModel()->where('author_id', $authorId);

        if ($status != null) {
            $contentsQB->where('status', $status);
        }

        $contents = $contentsQB->orderBy('created_at', 'DESC')
            ->limit($limit)
            ->offset($offset)
            ->get();

        return $contents;
    }

    public static function findById($id)
    {
        return self::getModel()->find($id);
    }

    public static function getAll($lessonsIds = [], $activeOnly = null, $offset = 0, $limit = 8)
    {

        $contentsQB = self::getModel()->with('lesson');

        if (!empty($lessonsIds)) {
            $contentsQB = $contentsQB->whereIn('lesson_id', $lessonsIds);
        }

        if ($activeOnly !== null) {
            $contentsQB = $contentsQB->where('status', Content::STATUS_APPROVED);
        }

        if ($limit >= 0) {
            $contentsQB = $contentsQB->limit($limit)
                ->offset($offset);
        }

        $contents = $contentsQB
            ->orderBy('created_at', 'DESC')
            ->get();

        return $contents;
    }

    public static function getRecent($limit = 8)
    {
        $recentContents = self::getModel()->where('status', Content::STATUS_APPROVED)
            ->orderBy('created_at', 'DESC')
            ->take($limit)
            ->get();

        return $recentContents;
    }
}
