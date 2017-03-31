<?php
/**
 * Created by PhpStorm.
 * User: development
 * Date: 23.03.2017
 * Time: 16:50
 */

namespace App\Model;


use Illuminate\Database\Eloquent\Model;

/**
 * Class OrderStatus
 * @package App\Model
 *
 * @property string $name
 */
class OrderStatus extends Model
{
    protected $table = 'order_status';
    public $timestamps = false;

    public function orders()
    {
        return $this->hasMany('App\Model\Order');
    }
}