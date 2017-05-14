<?php

namespace App\Model;

use App\Model\Helper\CyrToLatConverter;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\Auth;

/**
 * Class Association
 * @package App\Model
 * @property string $name
 * @property string $alias
 */
class Association extends Model
{
  use CyrToLatConverter;
    protected $table = 'association_category';
    public $timestamps = false;
    protected $fillable = ['name'];

    public function categories()
    {
        return $this->belongsToMany('App\Model\Category', 'category_has_association');
    }

    public function setAlias($name)
    {
        $this->alias = strtolower($this->convertCyrToLat($name));
    }
}
