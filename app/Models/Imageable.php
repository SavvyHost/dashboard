<?php

namespace App\Models;

use Intervention\Image\ImageManagerStatic as Image;

trait Imageable {
	public static function uploadImage($imgae, $folder) {
		$image_name = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();  // 3434343443.jpg
		Image::make($image)->save('assets/' . $folder . "/" . $image_name);
		return "assets/" .  $folder . "/" . $image_name;
	}
}