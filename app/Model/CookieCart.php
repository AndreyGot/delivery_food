<?php
/**
 * Created by PhpStorm.
 * User: development
 * Date: 10.04.2017
 * Time: 17:16
 */

namespace App\Model;


use Illuminate\Support\Facades\Cookie;
use Symfony\Component\HttpFoundation\Cookie as SymfonyCookie;

class CookieCart
{
    private $cart = [];

    public function __construct()
    {
        $this->cart = Cookie::get('cart');

    }


    public function addProduct(Food $food, $quantity)
    {

        if (is_null($this->cart)) {
            $this->cart = [];
        } else{
            if (array_key_exists($food->id, $this->cart)) {
                $this->cart[$food->id]['quantity'] += $quantity;
            } else {
                $this->cart[$food->id] = $this->buildCartProduct($food, $quantity);
            }

        }
        $cartCookie = cookie('cart', $this->cart, 365 * 24 * 60);

        return $cartCookie;
    }

    private function buildCartProduct(Food $food, $quantity = 1)
    {
        return [
            'name' => $food->name,
            'quantity' => $quantity,
        ];
    }

    private function buildCartSummary(SymfonyCookie $cartCookie)
    {
        /* @var array $cartData */
        $cartData = $cartCookie->getValue();
        $foodIdList = array_keys($cartData);
        $foodList = Food::find($foodIdList);
        /* @var Food $food*/
        $summaryData = [
            'totalCount' => 0,
            'totalCost' => 0,
        ];
        foreach ($foodList as $food) {
            $foodPrice = (double)$food->price;
            $summaryData['totalCost'] += (int)$cartData[$food->id]['quantity'] * $foodPrice;
            $summaryData['totalCount'] += (int)$cartData[$food->id]['quantity'];
        }
        return $summaryData;
    }
}