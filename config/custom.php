<?php
/**
 * Created by PhpStorm.
 * User: development
 * Date: 28.03.2017
 * Time: 17:24
 */
define('BASE_UPLOADS_PATH', '/public/uploads/');
define('IMAGES_PATH', BASE_UPLOADS_PATH . 'images/');
return[
    'directoryRoot' => __DIR__ . '/../',
    'imageDirectories' => [
        'restaurant' => IMAGES_PATH . 'restaurants/',
        'category' => IMAGES_PATH . 'categories/',
        'food' => IMAGES_PATH . 'food/',
        'user' => IMAGES_PATH . 'user/'
    ],

    'imageSize' => [
        'restaurant' => 500,
        'category' => 500,
        'food' => 500,
        'user' => 500
    ],
];