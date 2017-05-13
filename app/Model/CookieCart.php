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
        $this->cart = json_decode(Cookie::get('cart'), true);
        $this->orderList = Cookie::get('orders');

        $this->cartSummary = $this->buildCartSummary($this->getCartFoodIdList());

    }


    public function addProduct(Food $food, $quantity = 1)
    {
        if (!$this->isRestaurantValid($food->category->restaurant)) {
            $this->cart['food'] = [];
        }
        $this->setRestaurantId($food->category->restaurant_id);

        if (array_key_exists($food->id, $this->getCartFoodIdList())) {
            $this->cart['food'][$food->id]['quantity'] += $quantity;
        } else {
            $this->cart['food'][$food->id] = $this->buildCartProduct($food, $quantity);
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
        return empty($this->cart) || empty($this->cart['food']);
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
        if (!empty($foodList = $this->buildFoodList($this->cart['food']))) {
            /* @var Food $food */
            foreach ($foodList as $food) {
                $cartFoodList[$food->id] = [
                    'food' => $food,
                    'quantity' => $this->cart['food'][$food->id]['quantity']
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
        if (key_exists($food->id, $this->cart['food'])) {
            if ($removeAll) {
                unset($this->cart['food'][$food->id]);
            } else {
                if (($this->cart['food'][$food->id]['quantity'] -= 1) < 1) {
                    unset($this->cart['food'][$food->id]);
                }
            }
        }

        return $this->generateCartCookie();
    }

    public function convertCartToOrder($orderNumber)
    {
        return $this->generateOrderCookie($orderNumber);
    }

    public function isRestaurantValid(Restaurant $restaurant)
    {
        return $this->getRestaurantId() == 0 || $this->getRestaurantId() == $restaurant->id;
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
        $foodList = [];
        if (!empty($cartData)) {
            $foodIdList = array_keys($cartData);
            $foodList = Food::find($foodIdList);
        }


        return $foodList;
    }

    private function generateCartCookie()
    {
        $cartCookie = cookie('cart', json_encode($this->cart), self::CART_LIFETIME, $path = null, $domain = null, $secure = false, $httpOnly = false);
        $this->cartSummary = $this->buildCartSummary($this->getCartFoodIdList());

        return $cartCookie;
    }

    private function generateOrderCookie($orderNumber)
    {

        $this->orderList[$orderNumber] = $this->getCart();

        return cookie('orders', $this->orderList, self::CART_LIFETIME, $path = null, $domain = null, $secure = false, $httpOnly = false);
    }

    private function getCartData()
    {
        if (empty($this->cart)) {
            $this->cart = [
                'restaurant_id' => 0,
                'food' => [],
            ];
        }

        return $this->cart;
    }

    private function getCartFoodIdList()
    {
        return $this->getCartData()['food'];
    }

    private function getRestaurantId()
    {
        return  $this->getCartData()['restaurant_id'];
    }

    private function setRestaurantId($restaurantId)
    {
//        dump(empty($this->cart) || !isset($this->cart['restaurant_id']));
        if (empty($this->cart) || !isset($this->cart['restaurant_id'])) {
            $this->cart = [
                'restaurant_id' => 0,
                'food' => [],
            ];
        }
//        dump($this->cart['restaurant_id']);
        $this->cart['restaurant_id'] = $restaurantId;
//        dump($this->cart['restaurant_id']);

    }
}