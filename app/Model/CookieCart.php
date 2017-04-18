<?php
/**
 * Created by PhpStorm.
 * User: development
 * Date: 10.04.2017
 * Time: 17:16
 */

namespace App\Model;


use Illuminate\Support\Facades\Cookie;

//use Symfony\Component\HttpFoundation\Cookie as SymfonyCookie;

class CookieCart
{
    private $cart = [];
    private $cartSummary = [];
    private $orderList = [];

    const CART_LIFETIME = 365 * 24 * 60;

    public function __construct()
    {
        $this->cart = Cookie::get('cart');
        $this->orderList = Cookie::get('orders');


        if (!empty($this->cart)) {

            $this->cartSummary = $this->buildCartSummary($this->cart);
        }

    }


    public function addProduct(Food $food, $quantity = 1)
    {

        if (empty($this->cart)) {
            $this->cart = [];
        }

        if (array_key_exists($food->id, $this->cart)) {
            $this->cart[$food->id]['quantity'] += $quantity;
        } else {
            $this->cart[$food->id] = $this->buildCartProduct($food, $quantity);
        }


        return $this->generateCartCookie();
    }

    private function buildCartProduct(Food $food, $quantity = 1)
    {
        return [
            'name' => $food->name,
            'quantity' => $quantity,
        ];
    }

    public function isEmpty()
    {
        return empty($this->cart);
    }

    /**
     * @return array|string
     */
    public function getCart()
    {
        return $this->cart;
    }

    /**
     * @return array
     */
    public function getCartSummary()
    {

        return !empty($this->cartSummary) ? $this->cartSummary : [
            'totalCost' => 0,
            'totalCount' => 0,
        ];
    }

    public function getCartFoodList()
    {
        $cartFoodList = [];
        if (!empty($foodList = $this->buildFoodList($this->cart))) {
            /* @var Food $food */
            foreach ($foodList as $food) {
                $cartFoodList[$food->id] = [
                    'food' => $food,
                    'quantity' => $this->cart[$food->id]['quantity']
                ];
            }
        }

        return $cartFoodList;
    }

    public function clearCart()
    {
        $this->cart = [];
        return $this->generateCartCookie();
    }

    public function removeProduct(Food $food, $removeAll = false)
    {
        if (key_exists($food->id, $this->cart)) {
            if ($removeAll) {
                unset($this->cart[$food->id]);
            } else {
                if (($this->cart[$food->id]['quantity'] -= 1) < 1) {
                    unset($this->cart[$food->id]);
                }
            }
        }

        return $this->generateCartCookie();
    }

    public function convertCartToOrder($orderNumber)
    {
        return $this->generateOrderCookie($orderNumber);
    }

    private function buildCartSummary(array $cartData)
    {
        $foodList = $this->buildFoodList($cartData);
        /* @var Food $food */
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

    private function buildFoodList($cartData)
    {
        $foodIdList = array_keys($cartData);
        $foodList = Food::find($foodIdList);

        return $foodList;
    }

    private function generateCartCookie()
    {
        $cartCookie = cookie('cart', $this->cart, self::CART_LIFETIME);
        $this->cartSummary = $this->buildCartSummary($cartCookie->getValue());

        return $cartCookie;
    }

    private function generateOrderCookie($orderNumber)
    {

        $this->orderList[$orderNumber] = $this->getCart();

        return cookie('orders', $this->orderList, self::CART_LIFETIME);
    }
}