<?php
namespace App\Models;

use Backpack\CRUD\CrudTrait;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $link
 * @property boolean $age_from
 * @property boolean $age_to
 */
class Assessment extends Model
{

    use CrudTrait;

    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'assessment';

    /**
     * @var array
     */
    protected $fillable = ['link', 'age_from', 'age_to'];

}
