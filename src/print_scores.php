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

if( $_POST['mN9d6XiqHflPeSf'] != "mIeW2kjdTb6cIU") {
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

$dbh = new PDO("sqlite:./admin/dbase/dbase.sdb");

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