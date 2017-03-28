<?php
/**
 * Created by PhpStorm.
 * User: development
 * Date: 23.03.2017
 * Time: 16:36
 */

namespace App\Model;


use Illuminate\Database\Eloquent\Model;

/**
 * Class UserStatus
 * @package App\Model
 *
 * @property string $name
 * @property Admin $admin
 * @property User $user
 */
class UserStatus extends Model
{
    protected $table = 'user_status';
    public $timestamps = false;

    public function admins()
    {
        return $this->hasMany('App\Model\Admin');
    }

    public function users()
    {
        return $this->hasMany('App\Model\User');
    }
}