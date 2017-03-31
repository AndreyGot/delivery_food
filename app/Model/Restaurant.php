<?php
/**
 * Created by PhpStorm.
 * User: development
 * Date: 23.03.2017
 * Time: 13:25
 */

namespace App\Model;

use App\Model\Helper\ImageSaver;
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
 */
class Restaurant extends Model
{
    use ImageSaver;

    protected $table = 'restaurant';
    public $timestamps = false;
    protected $fillable = ['name', 'description', 'alias', 'working_hours', 'image', 'rating'];

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

    public function save(array $options = [])
    {
        $newImageName = Auth::user()->id . '_' . time();
        $imagePath = config('custom.imageDirectories.restaurant') . $this->alias . '/';

        if ($isFileUploaded = $this->uploadImage != null) {
            $this->image = str_replace('/public', '', $imagePath . $newImageName . '.jpg');
        }

        if ($saved = parent::save($options)) {
            if ($isFileUploaded) {
                $this->saveImage($this->uploadImage->getRealPath(),
                    $newImageName,
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
}