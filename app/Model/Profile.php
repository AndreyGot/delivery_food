<?php
/**
 * Created by PhpStorm.
 * User: development
 * Date: 23.03.2017
 * Time: 16:38
 */

namespace App\Model;


use Illuminate\Database\Eloquent\Model;
use App\Model\Helper\ImageSaver;
use Illuminate\Support\Facades\Auth;

/**
 * Class User
 * @package App\Model
 *
 * @property string $first_name
 * @property string $second_name
 * @property string $birth_date
 * @property string $registration_date
 * @property string $last_login_date
 * @property string $password
 * @property string $phone_1
 * @property string $phone_2
 * @property integer $bonus_score
 * @property integer $user_status_id
 * @property string $image
 */

class Profile extends Model
{
    use ImageSaver;
    protected $table = 'profile';
    public $timestamps = false;
    protected $fillable = [
        'first_name', 
        'second_name', 
        'birth_date', 
        'registration_date', 
        'last_login_date',  
        'phone_1', 
        'phone_2', 
        'bonus_score',
        'image'
    ];

    /*public function userStatus()
    {
        return $this->hasOne('App\Model\UserStatus');
    }*/

    public function cart()
    {
        return $this->belongsTo('App\Model\Cart');
    }

    public function orders()
    {
        return $this->hasMany('App\Model\Order');
    }

    public function userAddresses()
    {
        return $this->hasMany('App\Model\UserAddress');
    }

    public function user()
    {
        return $this->hasOne('App\Model\User');
    }

    public function save(array $options = [])
    {
        /* @var User $user*/
        $user = Auth::user();

        $newImageName = $user->id .'_'. time();
        $imagePath = config('custom.imageDirectories.user') . $user->nickname . '/';

        if ($isFileUploaded = $this->uploadImage != null) {
            // dd('here');
            $originalExtension = $this->uploadImage->getClientOriginalExtension();
            if ($originalExtension == 'jpeg') {
                $originalExtension = 'jpg';
            }
            $this->image = str_replace('/public', '', $imagePath . $newImageName . '.' . $originalExtension);
        }

        if (empty($this->registration_date)) {
            //        date_default_timezone_set('Europe/Kiev');
            $this->registration_date = date("Y-m-d H:i:s");
        }

        if ($saved = parent::save($options)) {
            if ($isFileUploaded) {
                $this->saveImage($this->uploadImage->getRealPath(),
                    $newImageName,
                    $imagePath,
                    config('custom.imageSize.user')
                );
            }

        }

        return $saved;
    }
}