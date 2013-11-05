<?php

class data
{
  public $info;
  public $success;
  public $filename;
};

$retVal = new data();

if ($handle = opendir('./csv')) {
							
	/* This is the correct way to loop over the directory. */
	$retVal->info = "";
	while (false !== ($file = readdir($handle))) {
		if( !is_dir($file) ) {
			if( !unlink("./csv/" . $file) ) {
			  $retVal->success   = false;
			  $retVal->info     .= $file . "<br />";
  			  $retVal->info     .= "<span style=\"color:#F00;\">Ainakin yhden tilapäistiedoton poistaminen epäonnistui!</span><br />";
			  echo json_encode($retVal);
  			  die();
			}
		}
	}					
}
else { 
  $retVal->success  = false;
  $retVal->info     = "<span style=\"color:#F00;\">Tilapäistiedostojen poistaminen epäonnistui!</span><br />";
  echo json_encode($retVal);
  die();
}

$retVal->success  = true; 
$retVal->info     = "<span style=\"color:#060;\">Tilapäistiedostojen poistaminen onnistui!</span><br />";
echo json_encode($retVal);

?>