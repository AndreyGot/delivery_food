<?php
/**
 * Created by PhpStorm.
 * User: development
 * Date: 23.03.2017
 * Time: 16:52
 */

namespace App\Model;


use Illuminate\Database\Eloquent\Model;

/**
 * Class Order
 * @package App\Model
 *
 * @property string $number
 * @property string $creation_date
 * @property string $delivery_date
 * @property string $description
 * @property integer $user_id
 * @property integer $order_status_id
 */
class Order extends Model
{
    protected $table = 'order';
    public $timestamps = false;

    public function orderStatus()
    {
        return $this->belongsTo('App\Model\OrderStatus');
    }

    public function user()
    {
        return $this->belongsTo('App\Model\User');
    }

    public function foods()
    {
        return $this->belongsToMany('App\Model\Food', 'oder_has_food')->withPivot('actual_price', 'quantity');
    }
}