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
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Model\Helper\CyrToLatConverter;
use App\Model\Category;
use App\Model\Restaurant;
use App\Model\Association;


class CategoryController extends Controller
{
    public function getForm()
    {
        $associations = Association::all();
        $checkAssociations = array();

        return view('admin.category.categoryForm', [
            'action' => route('admin_category_add'),
            'headingTitle' => 'Добавить категорию',
            'associations' => $associations,
            'checkAssociations' => $checkAssociations,
        ]);
    }

    public function getFormByRestaurant(Restaurant $restaurant)
    {
        $associations = Association::all();
        $checkAssociations = array();

        return view('admin.category.categoryForm', [
            'action' => route('admin_category_add_category_byRestaurant', ['restaurant' => $restaurant]),
            'headingTitle' => 'Добавить категорию',
            'restaurant' => $restaurant,
            'associations' => $associations,
            'checkAssociations' => $checkAssociations,
        ]);
    }

    public function addCategoryByRestaurant(Restaurant $restaurant, CategoryRequest $request)
    {
        $requestData = $request->all();
        Validator::make($request->all(),
            [
                'image_field' => 'required',
            ],
            [
                'image_field.required' => 'Выберите изображение!'
            ])->validate();
        $category = new Category();
        $category->fill($requestData);
        $category->setUploadImage($request->file('image_field'));
        $category->setAlias($category->name);
        $category->save();
        
        $newAssociation['name'] = $requestData['association'][0];

        if (!empty($newAssociation['name'])) {
            $association = new Association();

            $association->fill($newAssociation);
            $association->save();
            $associationId = "$association->id";
            $requestData['association'][0] = $associationId;;
            $associations = Association::find($requestData['association']);
        }
        else{
            unset($requestData['associations'][0]);
            $associations = Association::find($requestData['association']);
            if ($associations->isEmpty()){
                return redirect(route('admin_category_add_form'));
            }
        }
        foreach ($associations as $association) {
            try {
                $category->associations()->attach($association);

            } catch (QueryException $e) {
                continue;
//                $message = $e->getMessage();
//                if (preg_match("/Duplicate/", $message)){
//                    $messageError = 'Попытка создать существующую ассоциацию';
//                }
            }
        }
        
        return redirect(route('admin_category_list_byRestaurant', ['restaurant' => $restaurant]));
    }

    public function editForm(Restaurant $restaurant, $categoryAlias)
    {
        /* @var Category $category */
        $category = Category::where([
            'restaurant_id' => $restaurant->id,
            'alias' => $categoryAlias
        ])->first();

        /* @var Association $association */
        $checkAssociations = $category->associations;
        $associations = Association::all();

        return view('admin.category.categoryForm', [
            'category' => $category,
            'restaurant' => $category->restaurant,
            'checkAssociations' => $checkAssociations,
            'associations' => $associations,
            'action' => route('admin_category_edit', [
                $category->restaurant,
                'categoryAlias' => $category->alias
            ]),
            'headingTitle' => 'Изменить категорию'
        ]);
    }

    public function editCategory(Restaurant $restaurant, $categoryAlias, CategoryRequest $request)
    {
        /** @var Category $category */
        $category = Category::where([
            'restaurant_id' => $restaurant->id,
            'alias' => $categoryAlias
        ])->first();

        $category->associations()->detach();
        $newIdAssociations = $request->association;
        if(empty($newIdAssociations[0])){
            unset($newIdAssociations[0]);
            foreach ($newIdAssociations as $association) {
                try {
                    $category->associations()->attach($association);
                } catch (QueryException $e) {
                    continue;
//                $message = $e->getMessage();
//                if (preg_match("/Duplicate/", $message)){
//                    $messageError = 'Попытка создать существующую ассоциацию';
//                }
                }
            }
        }
        else {
            $requestData = $request->all();
            $newAssociation['name'] = $requestData['association'][0];

            $association = new Association();

            $association->fill($newAssociation);
            $association->save();
            $associationId = "$association->id";
            $requestData['association'][0] = $associationId;;
            $associations = Association::find($requestData['association']);
            foreach ($associations as $association) {
                try {
                    $category->associations()->attach($association);
                } catch (QueryException $e) {
                    continue;
                }
            }
        }

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
        /* @var $category Category */
        $category = Category::where([
            'restaurant_id' => $restaurant->id,
            'alias' => $categoryAlias
        ])->first();
        foreach ($category->foods as $food) {
            $food->delete();
        }

        $category->associations()->detach();
        $category->delete();

        return redirect(route('admin_category_list_byRestaurant', [
            'restaurant' => $category->restaurant,
            'category' => $category->alias,
        ]));
    }
}