<?php

$FOLDER_SIZE_MAX = 52428800;

//$FOLDER_SIZE_MAX = 52935;
$FILE_SIZE_MAX   = 52428800;

function getfoldersize($path) {
	$total_size = 0;
	$files = scandir($path);
	$cleanPath = rtrim($path, '/'). '/';

	foreach($files as $t) {
		if ($t<>"." && $t<>"..") {
			$currentFile = $cleanPath . $t;
			if (is_dir($currentFile)) {
				$size = foldersize($currentFile);
				$total_size += $size;
			}
			else {
				$size = filesize($currentFile);
				$total_size += $size;
			}
		}   
	}

	return $total_size;
}

function getfilesize($path) {
	$size = filesize($path);

	return $size;
}

function checkMimeType($str)
{
  if( empty($str) ) {
    return false;
  }
  
  $isvalidbool = true;
  	
  $exclude_mime_array = array('application/x-httpd-php','application/octet-stream', 'application/x-binary', 'application/x-bsh', 'application/x-sh','application/x-shar',
  'text/x-script.sh','application/x-bsh','application/x-shar', 'text/x-script.phyton','applicaiton/x-bytecode.python','text/x-script.perl','text/pascal','text/x-pascal',
  'text/x-script.ksh','application/x-ksh','text/x-script','text/x-script.elisp','text/html');
  
  for($i=0;$i<count($exclude_mime_array);$i++) {
    if( $str == $exclude_mime_array[$i] ) {
	  $isvalidbool = false;
	}
  }
  	
  return $isvalidbool;
}

function checkImageMimeType($str)
{
 
  if( empty($str) ) {
    return false;
  }
  
  $isvalidbool = false;	
  $include_mime_array = array('image/jpeg','image/png','image/pjpeg');
  
  for($i=0;$i<count($include_mime_array);$i++) {
    if( $str == $include_mime_array[$i] ) {
	  $isvalidbool = true;
	}
  }
  	
  return $isvalidbool;
}

function checkPdfMimeType($str)
{
  if( empty($str) ) {
    return false;
  }	
	
  $isvalidbool = false;
  	
  $include_mime_array = array('application/pdf');
  
  for($i=0;$i<count($include_mime_array);$i++) {
    if( $str == $include_mime_array[$i] ) {
	  $isvalidbool = true;
	}
  }
  	
  return $isvalidbool;
}

function checkMovMimeType($str)
{
  if( empty($str) ) {
    return false;
  }	
	
  $isvalidbool = false;
  	
  $include_mime_array = array('video/quicktime');
  
  for($i=0;$i<count($include_mime_array);$i++) {
    if( $str == $include_mime_array[$i] ) {
	  $isvalidbool = true;
	}
  }
  	
  return $isvalidbool;
}

function checkF4VMimeType($str)
{
  if( empty($str) ) {
    return false;
  }	
	
  $isvalidbool = false;
  	
  $include_mime_array = array('video/mp4');
  
  for($i=0;$i<count($include_mime_array);$i++) {
    if( $str == $include_mime_array[$i] ) {
	  $isvalidbool = true;
	}
  }
  	
  return $isvalidbool;
}

?>