<?php

require_once("./date_func.php");
/*
$msg = var_export($_REQUEST, true);
$msg .= "END\n\n";

$msg .= $_REQUEST[2]['sotu'];
$msg .= ", " . count($_REQUEST);

$file = "./debug.txt";

$fh = fopen($file, 'w+') or die("can't open file logi.txt");
fwrite($fh, $msg);
fclose($fh);  
*/

if( !empty($_REQUEST['oper']) ) {
	
  if( $_REQUEST['oper'] == "edit" ) {
    $row = array();
    
	$id = trim($_REQUEST['id']);
	if( !empty($id) ) {
		$row['id'] = $id;
	}
	else {
		$responce->success = false;
    	echo json_encode($responce);
		die();
	}
	
	$status = trim($_REQUEST['status']);
	if( !empty($status) ) {
		$row['status'] = $status;
	}
	else {
		$row['status'] = "0";
	}
	
	$gameid = trim($_REQUEST['gameid']);
	if( !empty($gameid) ) {
		$row['gameid'] = $gameid;
	}
	else {
		$row['gameid'] = "";
	}
	
	$gameimage = trim($_REQUEST['gameimage']);
	if( !empty($gameimage) ) {
		$row['gameimage'] = $gameimage;
	}
	else {
		$row['gameimage'] = "";
	}
	
	$score = trim($_REQUEST['score']);
	if( !empty($score) ) {
		$row['score'] = $score;
	}
	else {
		$row['score'] = "0";
	}
	
	$name = trim($_REQUEST['name']);
	if( !empty($name) ) {
		$row['name'] = $name;
	}
	else {
		$row['name'] = "";
	}
	
	$row['modified']      = date("Y-m-d H:i:s");
		
	$dbh = new PDO("sqlite:./dbase/dbase.sdb");
  	
	$query = "UPDATE scores SET status='" . $row['status'] . "', gameid='" . $row['gameid'] . "', gameimage='" . $row['gameimage'] . "', score='" . $row['score']  . "', name='" . $row['name'] 
	. "', modified='" . $row['modified'] . "' WHERE id='" . $row['id'] . "'"; 

	$result = $dbh->query($query);
	
	$responce->success = true;
    echo json_encode($responce);
	die();
  }
  
  if( $_REQUEST['oper'] == "add" ) {
    $row = array();
    
	$status = trim($_REQUEST['status']);
	if( !empty($status) ) {
		$row['status'] = $status;
	}
	else {
		$row['status'] = "0";
	}
	
	$gameid = trim($_REQUEST['gameid']);
	if( !empty($gameid) ) {
		$row['gameid'] = $gameid;
	}
	else {
		$row['gameid'] = "";
	}
	
	$gameimage = trim($_REQUEST['gameimage']);
	if( !empty($gameimage) ) {
		$row['gameimage'] = $gameimage;
	}
	else {
		$row['gameimage'] = "";
	}
	
	$score = trim($_REQUEST['score']);
	if( !empty($score) ) {
		$row['score'] = $score;
	}
	else {
		$row['score'] = "0";
	}
	
	$name = trim($_REQUEST['name']);
	if( !empty($name) ) {
		$row['name'] = $name;
	}
	else {
		$row['name'] = "";
	}
	
	$row['modified']      = date("Y-m-d H:i:s");
	
	$dbh = new PDO("sqlite:./dbase/dbase.sdb");
  	
	$query = "INSERT INTO scores(status, gameid, gameimage, score, name, modified) VALUES ('" . $row['status'] . 
	"', '" . $row['gameid'] . "', '" . $row['gameimage'] . "', '" . $row['score'] . "', '" . $row['name'] . "', '" . $row['modified']  . "')";
	
	$result = $dbh->query($query);
		
	$responce->success = true;
    echo json_encode($responce);
	die();
  }
  
  if( $_REQUEST['oper'] == "del" ) {
    $row = array();
    
	if( !empty($_REQUEST['id']) ) {
	  $row['id'] = $_REQUEST['id'];
	}
	else {
	  $responce->success = false;
      echo json_encode($responce);
	  die();
	}
	
	$dbh = new PDO("sqlite:./dbase/dbase.sdb");
	
	$idarr = explode(",",$row['id']);
	for($i=0;$i<count($idarr);$i++) {
	  $query = "DELETE FROM scores WHERE id='" . $idarr[$i] . "';";
	  $result = $dbh->query($query);
	}
	
	$responce->success = true;
    echo json_encode($responce);
	die();
  }
  
  
}

?>