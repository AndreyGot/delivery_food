<?php
/**
 * Created by PhpStorm.
 * User: development
 * Date: 23.03.2017
 * Time: 13:38
 */

namespace App\Model;

use App\Model\Helper\CyrToLatConverter;
use App\Model\Helper\ImageSaver;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

/**
 * Class Food
 * @package App\Model
 * @property string $name
 * @property string $image
 * @property string $description
 * @property double $price
 * @property integer $bonus
 * @property integer $rating
 * @property integer $category_id
 * @property Category $category
 */
class Food extends Model
{
    use ImageSaver, CyrToLatConverter;

    protected $table = 'food';
    public $timestamps = false;
    protected $fillable = ['name', 'description', 'price', 'bonus', 'rating', 'category_id',];

    public function category()
    {
        return $this->belongsTo('App\Model\Category');
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

    public function fastOrders()
    {
        return $this->belongsToMany('App\Model\Order', 'fast_order_has_food')->withPivot('actual_price', 'quantity');
    }

    public function save(array $options = [])
    {
        if ($isFileUploaded = $this->uploadImage != null) {
            $newImageName = Auth::user()->id . '_' . time();
            $imagePath = config('custom.imageDirectories.food') . $this->convertCyrToLat($this->name) . '/';

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
                    $imagePath,
                    config('custom.imageSize.food')
                );
            }
        }

        return $saved;
    }
}