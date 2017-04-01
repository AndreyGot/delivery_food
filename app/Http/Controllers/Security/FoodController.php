<?php
/**
 * Created by PhpStorm.
 * User: development
 * Date: 30.03.2017
 * Time: 17:16
 */

namespace App\Http\Controllers\Security;


use App\Http\Controllers\Controller;
use App\Model\Category;
use App\Model\Food;
use App\Model\Restaurant;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    public function getFormByCategory(Restaurant $restaurant, $categoryAlias)
    {
        $category = Category::where([
            'restaurant_id' => $restaurant->id,
            'alias' => $categoryAlias,
        ])->get()->first();
        return view('admin.food.foodForm',[
            'headingTitle' => 'Добавить блюдо',
            'action' => route('admin_food_add_byRestaurant', [
                'restaurant' => $restaurant,
                'categoryAlias' => $category->alias,
            ]),
            'category' => $category,
            'restaurant' => $category->restaurant
        ]);
    }

    public function addFoodByCategory(Restaurant $restaurant, $categoryAlias, Request $request)
    {
        $category = Category::where([
            'restaurant_id' => $restaurant->id,
            'alias' => $categoryAlias,
        ])->get()->first();
        $food = new Food();
        $requestData = $request->all();
        $food->fill($requestData);
        $food->setUploadImage($request->file('image_field'));
        $food->save();

        return redirect(route('admin_food_list_byCategory', [
            $restaurant,
            'categoryAlias' => $category
        ]));
    }

    public function foodListByCategory(Restaurant $restaurant, $categoryAlias)
    {
        $category = Category::where([
            'restaurant_id' => $restaurant->id,
            'alias' => $categoryAlias,
        ])->get()->first();
        return view('admin.food.foodList', [
            'headingTitle' => "Блюда ресторана \"{$category->restaurant->name}\", категории \"{$category->name}\"",
            'category' => $category,
            'foods' => $category->foods,
        ]);
    }

    public function showFood(Food $food)
    {
        return view('admin.food.show', [
            'category' => $food->category,
            'food' => $food,
        ]);
    }

    public function removeFood(Food $food)
    {
//        dd($food->category);
        $food->delete();
        return redirect()->route('admin_food_list_byCategory', [
            $food->category->restaurant,
            'categoryAlias' => $food->category->alias,
        ]);
    }

    public function editForm(Food $food)
    {
        return view('admin.food.foodForm', [
            'food' => $food,
            'restaurant' => $food->category->restaurant,
            'category' => $food->category,
            'action' => route('admin_food_edit', [$food]),
            'headingTitle' => 'Изменить блюдо'
        ]);
    }

    public function editFood(Food $food, Request $request)
    {
        $data = $request->all();
        $food->fill($data);
        $imageObj = $request->file('image_field');
        if (!is_null($imageObj)) {
            $food->setUploadImage($imageObj);
        }

        $food->fill($data);

        $food->save();

        return redirect()->route('admin_food_edit_form', [$food]);
    }
}