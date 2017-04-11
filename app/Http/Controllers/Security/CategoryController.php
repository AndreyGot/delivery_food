<?php
/**
 * Created by PhpStorm.
 * User: development
 * Date: 30.03.2017
 * Time: 10:05
 */

namespace App\Http\Controllers\Security;


use App\Http\Controllers\Controller;
use App\Http\Requests\Security\CategoryRequest;
use App\Model\Category;
use App\Model\Helper\CyrToLatConverter;
use App\Model\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class CategoryController extends Controller
{
    public function getForm()
    {
        return view('admin.category.categoryForm', [
            'action' => route('admin_category_add'),
            'headingTitle' => 'Добавить категорию'
        ]);
    }

    public function getFormByRestaurant(Restaurant $restaurant)
    {
        return view('admin.category.categoryForm', [
            'action' => route('admin_category_add_category_byRestaurant', ['restaurant' => $restaurant]),
            'headingTitle' => 'Добавить категорию',
            'restaurant' => $restaurant,
        ]);
    }

    public function addCategoryByRestaurant(Restaurant $restaurant, CategoryRequest $request)
    {
        Validator::make($request->all(),
            [
                'image_field' => 'required',
            ],
            [
                'image_field.required' => 'Выберите изображение!'
            ])->validate();
        $category = new Category();
        $requestData = $request->all();
        $category->fill($requestData);
        $category->setUploadImage($request->file('image_field'));
        $category->setAlias($category->name);
        $category->save();

        return redirect(route('admin_category_list_byRestaurant', ['restaurant' => $restaurant]));
    }

    public function categoryListByRestaurant(Restaurant $restaurant)
    {
        return view('admin.category.categoryList', [
            'headingTitle' => "Категории ресторана \"{$restaurant->name}\"",
            'restaurant' => $restaurant,
            'categories' => $restaurant->categories,
        ]);
    }

    public function showCategory(Restaurant $restaurant, $categoryAlias)
    {
        $category = Category::where([
            'restaurant_id' => $restaurant->id,
            'alias' => $categoryAlias
        ])->first();
        return view('admin.category.show', [
            'restaurant' => $category->restaurant,
            'category' => $category,
        ]);
    }

    public function removeCategory(Restaurant $restaurant, $categoryAlias)
    {
        /* @var $category Category*/
        $category = Category::where([
            'restaurant_id' => $restaurant->id,
            'alias' => $categoryAlias
        ])->first();
        foreach ($category->foods as $food) {
            $food->delete();
        }
        $category->delete();

        return redirect(route('admin_category_list_byRestaurant', [
            'restaurant' => $category->restaurant,
            'category' => $category->alias,
        ]));
    }

    public function editForm(Restaurant $restaurant, $categoryAlias)
    {
        $category = Category::where([
            'restaurant_id' => $restaurant->id,
            'alias' => $categoryAlias
        ])->first();
        return view('admin.category.categoryForm', [
            'category' => $category,
            'restaurant' => $category->restaurant,
            'action' => route('admin_category_edit', [
                $category->restaurant,
                'categoryAlias' => $category->alias
            ]),
            'headingTitle' => 'Изменить категорию'
        ]);
    }

    public function editCategory(Restaurant $restaurant, $categoryAlias, CategoryRequest $request)
    {
        /**
         * @var Category $category
         */
        $category = Category::where([
            'restaurant_id' => $restaurant->id,
            'alias' => $categoryAlias
        ])->first();
        $data = $request->all();
        $category->fill($data);
        $imageObj = $request->file('image_field');
        if (!is_null($imageObj)) {
            $category->setUploadImage($imageObj);
        }

        $category->fill($data);
        $category->setAlias($category->name);

        $category->save();

        return redirect(route('admin_category_edit_form', [ $restaurant, 'categoryAlias' => $category->alias ]));
    }


}