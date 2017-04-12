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

        if (is_null($user->profile_id)) {
          $profile = new Profile;
        // dd($profile);

          return view('shop.user.mediumProfileForm', ['profile'=>$profile,
            'userEmail'=>$user->email,
            'action' => route('shop_profile_edd')
          ]);
        }

        $profile = $user->profile;

    return view('shop.user.mediumProfileUser', ['profile'=>$profile, 'user'=>$user]);
  }

  public function eddProfileUser(Profile $profile, UserRequest $request)
  {
    $user = Auth::user();
    if (!$user->profile_id==null) {
      return redirect(route('shop_profile_user'));
    }
    $data = $request->all();
    $profile = $profile->fill($data);
    $profile->registration_date = date("Y-m-d H:i:s");
    $profile->save();
    // dd($profile->id);
    $user->profile_id = $profile->id;
    $user->save();
    // dd($user->profile_id);

    return redirect(route('shop_profile_user'));

  }

  public function setingsProfileUser()
  {
    $user = Auth::user();
    // dd($user->profile_id);

    if (empty ($user->profile_id)) {
      dd('here profile_id = null');
    }
    $profile = $user->profile;

    return view('shop.user.mediumProfileForm', ['profile'=>$profile,
      'userEmail'=>$user->email,
      'action' => route('shop_profile_edit', [$profile])
    ]);
  }

  public function editProfileUser(Profile $profile, UserRequest $request)
  {

    $data = $request->all();
    $profile->fill($data);
    // dd($profile);
    $profile->save();
    
    return redirect(route('shop_profile_user'));
    // $userEmail = $profileNew->user->email;
    // dd($profileNew->id);
  }

  public function addressUser(UserAddressRequest $request)
  {
    $user = Auth::user();
    $profile = $user->profile;
    $userAddress = $user->profile->userAddresses;
    // dd($profile);
    return view('shop.user.mediumAddressUser', ['profile'=>$profile, 
      'userAddress'=>$userAddress]
    );
  }

  public function saveUserAddress(UserAddress $userAddress)
  {
    dd($userAddress);
  }
}

