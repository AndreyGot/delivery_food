<?php
/**
 * Created by PhpStorm.
 * User: development
 * Date: 23.03.2017
 * Time: 13:50
 */

namespace App\Model;


use Illuminate\Database\Eloquent\Model;

/**
 * Class RestaurantContacts
 * @package App\Model
 *
 * @property string $email
 * @property string $phone_1
 * @property string $phone_2
 * @property string $description
 * @property integer $restaurant_id
 */
class RestaurantContacts extends Model
{
    protected $table = 'restaurant_contacts';
    public $timestamps = false;

    public function restaurant()
    {
        return $this->belongsTo('App\Model\Restaurant');
    }
}