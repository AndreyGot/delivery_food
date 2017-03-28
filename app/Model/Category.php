<?php
/**
 * Created by PhpStorm.
 * User: development
 * Date: 23.03.2017
 * Time: 13:34
 */

namespace App\Model;


use Illuminate\Database\Eloquent\Model;

/**
 * Class Category
 * @package App\Model
 *
 * @property string $name
 * @property string $description
 * @property string $image
 * @property string $alias
 * @property integer $restaurant_id
 */
class Category extends Model
{
    protected $table = 'category';
    public $timestamps = false;

    public function restaurant()
    {
        return $this->belongsTo('App\Model\Restaurant');
    }

    public function foods()
    {
        return $this->hasMany('App\Model\Food');
    }

    public function specials()
    {
        return $this->belongsToMany('App\Model\Special', 'special_has_category');

    }
}