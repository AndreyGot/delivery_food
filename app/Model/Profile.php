<?php
/**
 * Created by PhpStorm.
 * User: development
 * Date: 23.03.2017
 * Time: 16:38
 */

namespace App\Model;


use Illuminate\Database\Eloquent\Model;

/**
 * Class User
 * @package App\Model
 *
 * @property string $first_name
 * @property string $second_name
 * @property string $birth_date
 * @property string $registration_date
 * @property string $last_login_date
 * @property string $password
 * @property string $phone_1
 * @property string $phone_2
 * @property integer $bonus_score
 * @property integer $user_status_id
 *
 */
class Profile extends Model
{
    protected $table = 'profile';
    public $timestamps = false;

    /*public function userStatus()
    {
        return $this->hasOne('App\Model\UserStatus');
    }*/

    public function cart()
    {
        return $this->belongsTo('App\Model\Cart');
    }

    public function orders()
    {
        return $this->hasMany('App\Model\Order');
    }

    public function userAddresses()
    {
        return $this->hasMany('App\Model\UserAddress');
    }

    public function user()
    {
        return $this->hasOne('App\Model\User');
    }
}