<?php
/**
 * Created by PhpStorm.
 * User: colbymchenry
 * Date: 2019-03-14
 * Time: 20:14
 */

namespace App;


class ImageHelper {

    public static function compress($source, $destination, $quality) {

        $info = getimagesize($source);

        if ($info['mime'] == 'image/jpeg')
            $image = imagecreatefromjpeg($source);

        elseif ($info['mime'] == 'image/gif')
            $image = imagecreatefromgif($source);

        elseif ($info['mime'] == 'image/png')
            $image = imagecreatefrompng($source);

        imagejpeg($image, $destination, $quality);

        return $destination;
    }

}