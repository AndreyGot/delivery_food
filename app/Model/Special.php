<?php
/**
 * Created by PhpStorm.
 * User: development
 * Date: 23.03.2017
 * Time: 17:21
 */

namespace App\Model;


use Illuminate\Database\Eloquent\Model;
use App\Model\Helper\CyrToLatConverter;
use App\Model\Helper\ImageSaver;
use Illuminate\Support\Facades\Auth;

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
    use ImageSaver, CyrToLatConverter;

    protected $table = 'special';
    public $timestamps = false;
    protected $fillable = ['name', 'description', 'start_date', 'end_date', 'image', 'status', 'bonus_rate'];

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

    public function save(array $options = [])
    {
        /* @var User $user*/
        $user = Auth::user();
        
        $newImageName = $user->id .'_'. time();
        $imagePath = config('custom.imageDirectories.special');

        if ($isFileUploaded = $this->uploadImage != null) {
            // dd('here');
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
                    config('custom.imageSize.special')
                );
            }
        }

        return $saved;
    }
}