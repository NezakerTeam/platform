<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{

    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'country';

    /**
     * @var array
     */
    protected $fillable = ['name', 'is_enabled'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cities()
    {
        return $this->hasMany(City::class);
    }
}
