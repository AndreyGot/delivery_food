<?php
/**
 * Created by PhpStorm.
 * User: development
 * Date: 28.03.2017
 * Time: 17:46
 */

namespace App\Model\Helper;

use Illuminate\Http\UploadedFile;

trait ImageSaver
{
    /**
     * @var UploadedFile
     */
    protected $uploadImage = null;

    protected function saveImage($tmpImagePath, $newImageName, $destinationDirectory, $width = 300)
    {
        $imageHandler = new \upload($tmpImagePath);
        $imageHandler->file_new_name_body = $newImageName;
        $imageHandler->image_convert = 'jpg';
        $imageHandler->image_resize = true;
        $imageHandler->image_ratio_y = true;
        $imageHandler->image_x = $width;
        $imageHandler->process(config('custom.directoryRoot') . $destinationDirectory);
    }

    public function setUploadImage(UploadedFile $imageFile)
    {
        $this->uploadImage = $imageFile;
    }
}