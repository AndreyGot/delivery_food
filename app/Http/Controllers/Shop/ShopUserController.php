<?php

namespace App\Http\Controllers\Shop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

use App\Http\Requests\Security\UserRequest;
use App\Http\Requests\Security\UserAddressRequest;
use Illuminate\Support\Facades\Auth;
use App\Model\Restaurant;
use App\Model\Profile;
use App\Model\User;
use App\Model\UserAddress;

class ShopUserController extends Controller
{

	public function profileUser()
	{
    $user = Auth::user();
    $message = null;
    if (is_null($user->profile_id)) {
      $message = 'Пожалуйста введите свои данные';
      $profile = new Profile;
      $profile->first_name = $user->nickname;
      return view('shop.user.mediumProfileForm', ['profile'=>$profile,
        'userEmail'=>$user->email,
        'message' => $message,
        'action' => route('shop_profile_edd')
      ]);
    }

    $profile = $user->profile;

    return view('shop.user.mediumProfileUser', ['profile'=>$profile, 'user'=>$user, ]);
  }

  public function addProfileUser(UserRequest $request)
  {
    $profile = new Profile();
    $user = Auth::user();

    if (!$user->profile_id == null) {
      return redirect(route('shop_profile_user'));
    }

    $data = $request->all();
    $imageObj = $request->file('image_field');
    // dd($data);
    $profile->fill($data);
    $profile->setUploadImage($imageObj);
    $profile->registration_date = date("Y-m-d H:i:s");

//    $profile->registration_date = date("Y-m-d H:i:s");
    $profile->save();

    $user->profile_id = $profile->id;
    $user->save();

    return redirect(route('shop_profile_user'));
  }

  public function setingsProfileUser()
  {
    $user = Auth::user();
    // dd($user->nickname);

    if (empty ($user->profile_id)) {
      $message = 'Пожалуйста введите свои данные';
      $profile = new Profile;
      // dd($profile);
      $profile->first_name = $user->nickname;
      return view('shop.user.mediumProfileForm', ['profile'=>$profile,
        'userEmail'=>$user->email, 'message' => $message,  
        'action' => route('shop_profile_edd')
      ]);
    }

    $profile = $user->profile;
    $message = null;

    return view('shop.user.mediumProfileForm', ['profile'=>$profile,
      'userEmail'=>$user->email,
      'message' => $message,
      'action' => route('shop_profile_edit', [$profile])
    ]);
  }

  public function editProfileUser(Profile $profile, UserRequest $request)
  {
    $data = $request->all();
    // dd($data);
    $imageObj = $request->file('image_field');
    if (!is_null($imageObj)) {
        $profile->setUploadImage($imageObj);
    }
    $profile->fill($data);
    $profile->save();
    
    return redirect(route('shop_profile_user'));
  }

  public function addressUser()
  {
    $user = Auth::user();
    // dd($user->profile_id);
    $message = 'Пожалуйста введите свои данные';

    if (empty ($user->profile_id)) {
      $profile = new Profile;
      $profile->first_name = $user->nickname;
      return view('shop.user.mediumProfileForm', ['profile'=>$profile,
        'userEmail'=>$user->email,
        'message' => $message,  
        'action' => route('shop_profile_edd', [$profile])
      ]);
    }

    $profile = $user->profile;
    $userAddresses = $user->profile->userAddresses;
    // dd($profile);
    return view('shop.user.mediumAddressUser', ['profile'=>$profile, 
      'userAddresses'=>$userAddresses, 
      'action' => route('shop_add_user_address')
    ]);
  }

  public function saveUserAddress(UserAddressRequest $request)
  {
    $user = Auth::user();
    
    $data = $request->all();
    $userAddress = new UserAddress();
    $userAddress->fill($data);
    // dd($userAddress->profile_id);
    $userAddress->profile_id = $user->profile_id;
    $userAddress->save();
    return redirect(route('shop_address_user'));
  }

  public function deleteUserAddress(UserAddress $userAddress)
  {
    $userAddress->delete();
    return redirect(route('shop_address_user'));
    // dd($userAddress);
  }

  public function getEditFormUserAddress(UserAddress $userAddress)
  {
    $user = Auth::user();
    $profile = $user->profile;
    // dd($userAddress);
    return view('shop.user.mediumAddressForm', ['profile'=>$profile,
      'userAddress'=>$userAddress,
      'action' => route('shop_edit_user_address', [$userAddress])
    ]);
  }

  public function editUserAddress(UserAddress $userAddress, UserAddressRequest $request)
  {
    $user = Auth::user();
    $data = $request->all();
    $userAddress->fill($data);
    // dd($userAddress);
    $userAddress->profile_id = $user->profile->id;
    $userAddress->save();
    return redirect(route('shop_address_user'));
  }
}

