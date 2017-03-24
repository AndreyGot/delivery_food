<?php
/**
 * Created by PhpStorm.
 * User: development
 * Date: 23.03.2017
 * Time: 17:26
 */

namespace App\Model;


use Illuminate\Database\Eloquent\Model;

/**
 * Class Admin
 * @package App\Model
 *
 * @property string $name
 * @property string $email
 * @property string $password
 * @property integer $user_status_id
 */
class Admin extends Model
{
    protected $table = 'admin';
    public $timestamps = false;

    public function userStatus()
    {
        $this->belongsTo('App\Model\UserStatus');
    }
}