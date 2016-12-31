<?php
namespace App\Entities\Repositories;

use App\Models\Content;
use Illuminate\Database\Eloquent\Model;

class EntityRepository
{

    protected static $model = null;

    /**
     * @inheritdoc 
     */
    public function __construct($modelClass = Content::class)
    {
        self::setModel($modelClass);
    }

    protected static function setModel($modelClass)
    {
        self::$model = new $modelClass();
    }

    /**
     * @return Model 
     */
    protected static function getModel()
    {
        return self::$model;
    }
}
