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
        // $profiles = Profile::all();
        // $profile = Profile::where('id', $user->profile_id)->get();
        // $profile = $user->profile->user;
        $profile = $user->profile;

    return view('shop.user.mediumProfileUser', ['profile'=>$profile, 'user'=>$user]);
  }

  public function setingsProfileUser(Profile $profile)
  {
    $user = $profile->user;

    return view('shop.user.mediumProfileForm', ['profile'=>$profile,
      'userEmail'=>$user->email,
      'action' => route('shop_profile_edit', [$profile])
    ]);
  }

  public function editProfileUser(Profile $profile, UserRequest $request)
  {
    $data = $request->all();
    $profileNew = $profile->fill($data);
    $profileOld = Profile::where('id', $profileNew->id)->get();
    $profileOld = $profileNew;
    $profileOld->save();
    
    return redirect(route('shop_profile_user'));
    // $userEmail = $profileNew->user->email;
    // dd($profileNew->id);
  }

  public function addressUser(Profile $profile, UserAddressRequest $request)
  {
    $userAddress = $profile->userAddresses;
    // dd($userAddress);
    return view('shop.user.mediumAddressUser', ['profile'=>$profile, 
      'userAddress'=>$userAddress]
    );
  }

  public function saveUserAddress(UserAddress $userAddress)
  {
    dd($userAddress);
  }
}

