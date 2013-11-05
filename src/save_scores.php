<?php

class data
{
  public $info;
  public $success;
};

/*
$msg = var_export($_POST, true);

$file = "./server_debug.txt";

$fh = fopen($file, 'w+') or die("can't open file logi.txt");
fwrite($fh, $msg);
fclose($fh);  
*/

if( $_POST['nO9xUwnSnfytL7AzuW'] != "mIxY7aZiqPwDiEmsEfS") {
	$retVal           = new data();
	$retVal->success  = false;
	$retVal->info     = "";
	echo json_encode($retVal);
	die();
}

$replace = "";
$order = array("\r\n","\n","\r","'","\"",";");

$selName = trim($_POST['selName']);
if( empty($selName) ) {
	$retVal           = new data();
	$retVal->success  = false;
	$retVal->info     = "";
	echo json_encode($retVal);
	die();
}

$selName = str_replace($order,$replace,$selName);

$selImage = trim($_POST['selImage']);
if( empty($selImage) ) {
	$retVal           = new data();
	$retVal->success  = false;
	$retVal->info     = "";
	echo json_encode($retVal);
	die();
}

$selImage = str_replace($order,$replace,$selImage);

$name = trim($_POST['name']);
if( empty($name) ) {
	$retVal           = new data();
	$retVal->success  = false;
	$retVal->info     = "";
	echo json_encode($retVal);
	die();
}

$name = str_replace($order,$replace,$name);

$score = trim($_POST['score']);
if( empty($score) ) {
	$retVal           = new data();
	$retVal->success  = false;
	$retVal->info     = "";
	echo json_encode($retVal);
	die();
}

$score = str_replace($order,$replace,$score);

$modified      = date("Y-m-d H:i:s");

$dbh = new PDO("sqlite:./admin/dbase/dbase.sdb");

$query0 = "INSERT INTO scores(status, gameid, gameimage, score, name, modified) VALUES ('1', '" . $selName . "', '" . $selImage . "', '" . $score . "', '" . $name . "', '" . $modified  . "')";
$result0 = $dbh->query($query0);

if( $result0 == FALSE ) {
  $retVal           = new data();
  $retVal->success  = false;
  $retVal->info     = "";
  echo json_encode($retVal);
  die();
}

$query = "SELECT * FROM scores WHERE gameid='" . $selName . "' ORDER BY score LIMIT 0, 10";
$result = $dbh->query($query);

$msg = "";

$msg .= "<table>";
$i = 0;

$msg .= "<tr><td class='score_tdH' colspan='2' >" . $selName . " TOP 10:</td></tr>";
$msg .= "<tr><td class='score_td1' >Player</td><td class='score_td2'>Score</td></tr>";

while($row = $result->fetch(PDO::FETCH_ASSOC)) {		  
  $name      = trim($row['name']);
  $score     = trim($row['score']);
  
  $name = mb_substr($name,0,24,"UTF-8");
  
  $msg .= "<tr><td class='score_td1' >" . $name . "</td><td class='score_td2'>" . $score . "</td></tr>";
  
  $i++;
} 

if( $i == 0) {
	$retVal           = new data();
	$retVal->success  = false;
	$retVal->info     = "";
	echo json_encode($retVal);
	die();
}

$msg .= "</table>";

$retVal           = new data();
$retVal->success  = true;
$retVal->info     = $msg;

echo json_encode($retVal);

?>