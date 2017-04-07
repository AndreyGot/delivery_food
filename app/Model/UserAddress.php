<?php
/**
 * Created by PhpStorm.
 * User: development
 * Date: 23.03.2017
 * Time: 17:00
 */

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * Class UserAddress
 * @package App\Model
 *
 * @property string $region
 * @property string $city
 * @property string $street
 * @property string $house
 * @property string $flat
 * @property string $description
 */
class UserAddress extends Model
{
    protected $table = 'user_address';
    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo('App\Model\Profile');
    }
}