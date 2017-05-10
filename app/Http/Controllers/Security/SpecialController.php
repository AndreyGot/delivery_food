<?php

namespace App\Http\Controllers\Security;

use App\Model\Special;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SpecialController extends Controller
    /* @var Special $special */
{
    public function specialList(){
        $specials = Special::all();
        return view('admin.special.listSpecial', [
            'specials' => $specials,
        ]);
    }

    public function getSpecialForm(){
        return view('admin.special.specialForm', [
            'action' => route('admin_add_special'),
        ]);
    }

    public function addSpecial(Request $request){
        $special = new Special();

        $requestData = $request->all();
        $imageObj = $request->file('image_field');
        $special->fill($requestData);
        $special->bonus_rate = 0; //default value
        $special->discount = 0; //default value

        $special->setUploadImage($imageObj);
        $special->save();

        return redirect(route('admin_special_list'));
    }

    public  function deleteSpecial(Special $special){

        $real_path = dirname(__FILE__);
        $path_to_project =  stristr($real_path, 'app', true);
        $path_to_image = 'public'.$special->image;
        $full_path = $path_to_project.$path_to_image;

        if (file_exists($full_path)) {
            unlink($full_path);
        }

        $special->delete();

        return redirect(route('admin_special_list'));
    }

    public function editFormSpecial(Special $special)
    {
        return view('admin.special.specialForm', [
            'special' => $special,
            'action' => route('admin_edit_special', [
                $special
            ]),
        ]);
    }

    public function editSpecial(Special $special, Request $request) {
        $real_path = dirname(__FILE__);
        $path_to_project =  stristr($real_path, 'app', true);
        $path_to_image = 'public'.$special->image;
        $full_path = $path_to_project.$path_to_image;

        $data = $request->all();
        $imageObj = $request->file('image_field');

        if (!is_null($imageObj)) {
            if (file_exists($full_path)) {
                unlink($full_path);
            }
            $special->setUploadImage($imageObj);
        }
        if (!is_null($imageObj)) {
            $special->setUploadImage($imageObj);
        }
        $special->fill($data);
        $special->save();

        return redirect(route('admin_special_list'));
    }
}
