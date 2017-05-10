<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\Auth;

/**
 * Class Association
 * @package App\Model
 * @property string $name
 *
 */

class Association extends Model
{
  protected $table = 'association_category';
  public $timestamps = false;
  protected $fillable = ['name'];

  public function categories()
  {
    return $this->belongsToMany('App\Model\Category', 'category_has_association');
  }
}
