<?php
/**
 * Created by PhpStorm.
 * User: development
 * Date: 23.03.2017
 * Time: 13:25
 */

namespace App\Model;


use Illuminate\Database\Eloquent\Model;

/**
 * Class Restaurant
 * @package App\Model
 *
 * @property string $name
 * @property string $image
 * @property string $description
 * @property string $alias
 * @property string $working_hours
 * @property float $rating
 */
class Restaurant extends Model
{
    protected $table = 'restaurant';
    public $timestamps = false;

    public function restaurantContact()
    {
        return $this->hasOne('App\Model\RestaurantContacts');
    }

    public function categories()
    {
        return $this->hasMany('App\Model\Category');
    }

    public function specials()
    {
        return $this->belongsToMany('App\Model\Restaurant', 'special_has_restaurant');

    }
}