<?php

use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManagerStatic as Image;

function uploadImage($image, $folder) {
	$path = createFolderIfNotExist($folder);
	return getImagePath($image, $path);
}

function getImagePath( $image, $path ) {
	$image_name = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
	Image::make($image)->save($path . "/" . $image_name);
	
	return $path . "/" . $image_name;
}

function createFolderIfNotExist($folder): string {
	$path = 'assets/' . $folder;
	
	if(!File::exists($path)) {
		File::makeDirectory($path);
	}
	
	return $path;
}