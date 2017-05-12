<?php
/**
 * Created by PhpStorm.
 * User: development
 * Date: 23.03.2017
 * Time: 13:25
 */

namespace App\Model;

use App\Model\Helper\CyrToLatConverter;
use App\Model\Helper\ImageSaver;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

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
 * @property [] $categories
 * @property [] specials
 * @property [] paymentMethods
 * @property RestaurantContacts $restaurantContact
 * @property Collection $comments
 */
class Restaurant extends Model
{
    use ImageSaver, CyrToLatConverter;

    protected $table = 'restaurant';
    public $timestamps = false;
    protected $fillable = ['name', 'description', 'working_hours', 'image', 'rating'];

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
        return $this->belongsToMany('App\Model\Special', 'special_has_restaurant');
    }

    public function paymentMethods()
    {
        return $this->belongsToMany('App\Model\PaymentMethod', 'restaurant_has_payment');
    }

    public function save(array $options = [])
    {
        $newImageName = Auth::user()->id . '_' . time();
        $imagePath = config('custom.imageDirectories.restaurant') . $this->alias . '/';


        if ($isFileUploaded = $this->uploadImage != null) {

            $originalExtension = $this->uploadImage->getClientOriginalExtension();
            if ($originalExtension == 'jpeg') {
                $originalExtension = 'jpg';
            }
            $this->image = str_replace('/public', '', $imagePath . $newImageName . '.' . $originalExtension);
        }

        if ($saved = parent::save($options)) {
            if ($isFileUploaded) {
                $this->saveImage($this->uploadImage->getRealPath(),
                    $newImageName,
//                    $this->uploadImage->get
                    $imagePath,
                    config('custom.imageSize.restaurant')
                );
            }

        }

        return $saved;
    }

    public function getRouteKeyName()
    {
        return 'alias';
    }

    public function setAlias($cyrilicAlias)
    {
        return $this->alias = strtolower($this->convertCyrToLat($cyrilicAlias));
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}