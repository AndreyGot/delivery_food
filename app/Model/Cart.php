<?php
/**
 * Created by PhpStorm.
 * User: development
 * Date: 23.03.2017
 * Time: 16:46
 */

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Cart
 * @package App\Model
 *
 * @property integer $user_id
 */
class Cart extends Model
{
    protected $table = 'order_status';
    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo('App\Model\User');
    }

    public function foods()
    {
        return $this->belongsToMany('App\ModelFood', 'cart_has_food')->withPivot('quantity');
    }
}