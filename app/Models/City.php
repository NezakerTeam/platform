<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $country_id
 * @property string $name
 * @property boolean $is_enabled
 * @property Country $country
 * @property User[] $users
 */
class City extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'city';

    /**
     * @var array
     */
    protected $fillable = ['country_id', 'name', 'is_enabled'];

    /**
     * The storage format of the model's date columns.
     * 
     * @var string
     */
    protected $dateFormat = 'U';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function country()
    {
        return $this->belongsTo('App\Models\Country');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function users()
    {
        return $this->hasMany('App\Models\User');
    }
}
