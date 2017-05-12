<?php

namespace App\Http\Controllers\Shop;

use App\Http\Requests\Shop\CommentRequest;
use App\Model\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\Association;
use App\Model\Restaurant;
use App\Model\Category;
use App\Model\Profile;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;

class ShopRestaurantController extends Controller
{
    public function listRestaurant()
    {
        $restaurants = Restaurant::all();
        $associations = Association::all();

        return view('shop.restaurant.mediumListRestaurant', [
            'restaurants' => $restaurants,
            'associations'=> $associations,
        ]);
    }

    public function showRestaurant(Restaurant $restaurant)
    {
        $specials = $restaurant->specials;
        $categories = Category::where('restaurant_id', $restaurant->id)->get();

        return view('shop.restaurant.showRestaurant')->with([
                'restaurant' => $restaurant,
                'categories' => $categories,
                'specials' => $specials]
        );
    }

    public function searchByRestaurants(Request $request)
    {
        $restaurants = Restaurant::where('name', 'like', "%{$request->search_request}%")->get();


        return view('shop.restaurant.liveResult', [
            'restaurants' => $restaurants
        ]);
    }

    public function getComments(Restaurant $restaurant)
    {
        return view('shop.restaurant.comments.commentsList', [
            'restaurant' => $restaurant,
            'specials' => $restaurant->specials,
            'categories' => $restaurant->categories,
            'comments' => Comment::where('restaurant_id', $restaurant->id)->orderBy('content', 'desc')->paginate(5),
        ]);
    }

    public function addComment(Restaurant $restaurant, CommentRequest $request)
    {
        /* @var Profile $profile*/
        $profile = Auth::user()->profile;
        if ($profile->hasCommentPermission($restaurant)) {
            $commentData = $request->comment;
            $comment = new Comment();
            $comment->fill($commentData);
            $comment->profile()->associate($profile);
            $comment->restaurant()->associate($restaurant);
//        dd($restaurant->hasCast('name'));
//        dd($comment->getOriginal('content'));
            $comment->save();
        }

        return redirect()->route('shop_restaurant_comment_list', [$restaurant]);
    }

}
