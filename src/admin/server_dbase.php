<?php

require_once("./date_func.php");

/*
$msg = var_export($_REQUEST, true);

$file = "./server_debug.txt";

$fh = fopen($file, 'w+') or die("can't open file logi.txt");
fwrite($fh, $msg);
fclose($fh);  
*/

$page  = $_REQUEST['page']; // get the requested page 
$limit = $_REQUEST['rows']; // get how many rows we want to have into the grid 
$sidx  = $_REQUEST['sidx']; // get index row - i.e. user click to sort 
$sord  = $_REQUEST['sord']; // get the direction 
	
if(!$sidx) {
  $sidx =1;
}
	
/*** connect to SQLite database ***/
$dbh = new PDO("sqlite:./dbase/dbase.sdb");
  
$query = "SELECT COUNT(*) AS count FROM scores";
$result = $dbh->query($query);
	
$resultrow = $result->fetch(PDO::FETCH_ASSOC);
$count = $resultrow['count'];
	
	// calculation of total pages for the query
if( $count >0 ) {
	$total_pages = ceil($count/$limit);
} else {
	$total_pages = 0;
}

// if for some reasons the requested page is greater than the total
// set the requested page to total page
if ($page > $total_pages) {
  $page=$total_pages;
}
// calculate the starting position of the rows
$start = $limit*$page - $limit; // do not put $limit*($page - 1)
// if for some reasons start position is negative set it to 0
// typical case is that the user type 0 for the requested page
if($start <0) {
	$start = 0;
}
	
$query2 = "SELECT * FROM scores ORDER BY id desc LIMIT " . $start . " , " . $limit;
$result2 = $dbh->query($query2);

$responce->page = $page; 
$responce->total = $total_pages; 
$responce->records = $count;  
$i=0; 
 
while($row = $result2->fetch(PDO::FETCH_ASSOC)) { 
  $responce->rows[$i]['id']=$row['id']; 
     
  $responce->rows[$i]['cell']=array($row['id'],$row['status'],$row['gameid'],$row['gameimage'],$row['score'],$row['name'],$row['modified']); 
  
  $i++; 
} 

echo json_encode($responce);


?>