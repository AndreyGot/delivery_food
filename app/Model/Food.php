<?php
/**
 * Created by PhpStorm.
 * User: development
 * Date: 23.03.2017
 * Time: 13:38
 */

namespace App\Model;


use Illuminate\Database\Eloquent\Model;

/**
 * Class Food
 * @package App\Model
 *
 * @property string $name
 * @property string $image
 * @property string $description
 * @property double $price
 * @property integer $bonus
 * @property integer $rating
 * @property integer $category_id
 */
class Food extends Model
{
    protected $table = 'food';
    public $timestamps = false;

    public function categories()
    {
        return $this->belongsTo('App\Model\Categories');
    }

    public function cart()
    {
        return $this->belongsToMany('App\Model\Cart', 'cart_has_food')->withPivot('quantity');
    }

    public function orders()
    {
        return $this->belongsToMany('App\Model\Order', 'oder_has_food')->withPivot('actual_price', 'quantity');
    }

    public function specials()
    {
        return $this->belongsToMany('App\Model\Special', 'special_has_food');
    }
}