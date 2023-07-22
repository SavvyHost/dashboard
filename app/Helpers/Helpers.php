<?php

use Intervention\Image\ImageManagerStatic as Image;

function uploadImage($image, $folder) {
	$image_name = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();  // 3434343443.jpg
	Image::make($image)->save('assets/' . $folder . "/" . $image_name);
	return "assets/" .  $folder . "/" . $image_name;
}