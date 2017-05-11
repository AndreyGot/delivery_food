<?php
/**
 * Created by PhpStorm.
 * User: development
 * Date: 10.05.2017
 * Time: 17:21
 */

namespace App\Model;


use Illuminate\Database\Eloquent\Model;

/**
 * Class Comment
 * @package App\Model
 *
 * @property integer $id
 * @property string $content
 * @property string $rating
 * @property string $creation_date
 * @property Profile $profile
 * @property Restaurant $restaurant
 */
class Comment extends Model
{
    protected $table = 'comment';
    public $timestamps = false;
    protected $fillable = [
        'content',
        'rating',
    ];

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }

    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }

    public function save(array $options = [])
    {
        if (is_null($this->creation_date)) {
            $date = new \DateTime();

            $this->creation_date = $date->format('Y-m-d H:i:s');
        }

        return parent::save($options);
    }


}