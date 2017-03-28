<?php
/**
 * Created by PhpStorm.
 * User: development
 * Date: 23.03.2017
 * Time: 17:19
 */

namespace App\Model;


use Illuminate\Database\Eloquent\Model;

/**
 * Class PaymentMethod
 * @package App\Model
 *
 *
 */
class PaymentMethod extends Model
{
    protected $table = 'payment_method';
    public $timestamps = false;
}