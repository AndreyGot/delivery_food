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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function profile()
    {
        return $this->belongsTo('App\Model\Profile');
    }

    public function foods()
    {
        return $this->belongsToMany('App\Model\Food', 'order_has_food')->withPivot('actual_price', 'quantity');
    }

    public function getTotal()
    {
        $totalPrice = 0;
        $foods = $this->foods;
        foreach ($foods as $food) {
            $foodPrice = (double)$food->pivot->actual_price;
            $quantity = (int)$food->pivot->quantity;
            $totalPrice += (int)$quantity * $foodPrice;
        }

        return $totalPrice;
    }
}