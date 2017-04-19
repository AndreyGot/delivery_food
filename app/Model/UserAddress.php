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
 * @property string $id
 * @property string $region
 * @property string $city
 * @property string $street
 * @property string $house
 * @property string $flat
 * @property string $description
 * @property string $profile_id
 */
class UserAddress extends Model
{
    protected $table = 'user_address';
    public $timestamps = false;
    protected $fillable =[
    		'region', 
				'city',
				'street',
				'house',
				'flat',
				'description',
				'profile_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\Model\Profile');
    }
}