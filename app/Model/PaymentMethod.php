<?php
/**
 * Created by PhpStorm.
 * User: development
 * Date: 23.03.2017
 * Time: 17:19
 */

namespace App\Model;


use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PaymentMethod
 * @package App\Model
 *
 * @property string $name
 * @property Collection $orders
 */
class PaymentMethod extends Model
{
    protected $table = 'payment_method';
    public $timestamps = false;

    public function fastOrders()
    {
        return $this->hasMany('App\Model\FastOrder');
    }

    public function orders()
    {
        return $this->hasMany('App\Model\Order');
    }
}