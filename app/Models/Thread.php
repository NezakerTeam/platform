<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property boolean $type
 * @property integer $related_entity_id
 * @property boolean $status
 * @property string $created_at
 * @property string $updated_at
 * @property Comment[] $comments
 */
class Thread extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'thread';

    /**
     * @var array
     */
    protected $fillable = ['type', 'related_entity_id', 'status', 'created_at', 'updated_at'];

    /**
     * The storage format of the model's date columns.
     * 
     * @var string
     */
    protected $dateFormat = 'U';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }
}
