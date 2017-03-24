<?php
/**
 * Created by PhpStorm.
 * User: development
 * Date: 23.03.2017
 * Time: 17:21
 */

namespace App\Model;


use Illuminate\Database\Eloquent\Model;

/**
 * Class Special
 * @package App\Model
 *
 * @property string $name
 * @property string $description
 * @property string $start_date
 * @property string $end_date
 * @property string $image
 * @property boolean $status
 * @property integer $bonus_rate
 * @property integer $discount
 */
class Special extends Model
{
    protected $table = 'special';
    public $timestamps = false;

    public function restaurants()
    {
        return $this->belongsToMany('App\Model\Restaurant', 'special_has_restaurant');
    }

    public function categories()
    {
        return $this->belongsToMany('App\Model\Category', 'special_has_category');
    }

    public function foods()
    {
        return $this->belongsToMany('App\Model\Food', 'special_has_food');
    }
}