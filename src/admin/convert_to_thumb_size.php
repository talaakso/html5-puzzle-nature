<?php

function createOneThumb($imageFile, $fbool = 0)
{
  $thumbWidth   = 800;
  $thumbHeight  = 600;
 
  // load image and get image size
  $img = imagecreatefromjpeg($imageFile);
  
  if( !$img ) {
    $img    = imagecreatefrompng($imageFile);
  }
  
  $width  = imagesx( $img );
  $height = imagesy( $img );
  
  $src_x = 0;
  $src_y = 0;
  $new_dest_width  = $width;
  $new_dest_height = $height;
  
  if( $width > $height ) {
    $thumbHeight  = round(800 * ($height/$width) ) ;
  }
  else {
    $thumbHeight = 800;	
    $thumbWidth  = round(800 * ($width/$height)) ;
  }
  
  // create a new temporary image
  $tmp_img = imagecreatetruecolor( $thumbWidth, $thumbHeight );

  // copy and resize old image into new image
  imagecopyresized( $tmp_img, $img, 0, 0, $src_x, $src_y, $thumbWidth, $thumbHeight, $new_dest_width, $new_dest_height );

	// save thumbnail into a file
  imagejpeg( $tmp_img,  $imageFile);
	  
}

function createOneThumb2($imageFile, $imageFile_thumba, $fbool = 0)
{
  $thumbWidth   = 320;
  $thumbHeight  = 192;
 
  // load image and get image size
  $img = imagecreatefromjpeg($imageFile);
  
  if( !$img ) {
    $img    = imagecreatefrompng($imageFile);
  }
  
  $width  = imagesx( $img );
  $height = imagesy( $img );
  
  $src_x = 0;
  $src_y = 0;
  $new_dest_width  = $width;
  $new_dest_height = $height;
  
  if( $width > $height ) {
    $thumbHeight  = round(320 * ($height/$width) ) ;
  }
  else {
    $thumbHeight = 320;	
    $thumbWidth  = round(320 * ($width/$height)) ;
  }
  
  // create a new temporary image
  $tmp_img = imagecreatetruecolor( $thumbWidth, $thumbHeight );

  // copy and resize old image into new image
  imagecopyresized( $tmp_img, $img, 0, 0, $src_x, $src_y, $thumbWidth, $thumbHeight, $new_dest_width, $new_dest_height );

	// save thumbnail into a file
  imagejpeg( $tmp_img,  $imageFile_thumba);
	  
}

//createOneThumb("./0000/gfx/mansikkakirjosiipi.jpg");

?>