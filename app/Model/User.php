<?php
/**
 * Created by PhpStorm.
 * User: development
 * Date: 23.03.2017
 * Time: 17:26
 */

namespace App\Model;


use App\Model\Helper\Validatable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


/**
 * Class Admin
 * @package App\Model
 *
 * @property string $nickname
 * @property string $email
 * @property string $password
 * @property string $remember_token
 * @property UserStatus $userStatus
 */
class User extends Authenticatable
{
    use Notifiable, Validatable;

    protected $table = 'user';
    public $timestamps = false;
    protected $fillable = ['nickname', 'email', 'password'];

    public function userStatus()
    {
        return $this->belongsTo('App\Model\UserStatus');
    }

    public function profile()
    {
        return $this->belongsTo('App\Model\Profile');
    }

    /*public static function getValidationRules()
    {
        return [
            'name' => 'bail|required',
            'email' => 'bail|required',
            'password' => 'bail|required',
            'user_status_id' => 'bail|required',
        ];
    }*/


}