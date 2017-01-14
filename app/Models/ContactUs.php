<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

/**
 * @property integer $id
 * @property string $name
 * @property string $email
 * @property string $phone_number
 * @property string $message
 * @property string $created_at
 * @property string $updated_at
 */
class ContactUs extends Model
{

    use Notifiable;

    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'contact_us';

    /**
     * @var array
     */
    protected $fillable = ['name', 'email', 'phone_number', 'message', 'created_at', 'updated_at'];

}
