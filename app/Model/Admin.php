<?php
/**
 * Created by PhpStorm.
 * User: development
 * Date: 23.03.2017
 * Time: 17:26
 */

namespace App\Model;


use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


/**
 * Class Admin
 * @package App\Model
 *
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $remember_token
 * @property UserStatus $userStatus
 */
class Admin extends Authenticatable
{
    use Notifiable;

    protected $table = 'admin';
    public $timestamps = false;

    public function userStatus()
    {
        return $this->belongsTo('App\Model\UserStatus');
    }
}