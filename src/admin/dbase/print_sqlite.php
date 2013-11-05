<?php

try {
 
  $dbh = new PDO("sqlite:./dbase.sdb");
 
  $query2 = "SELECT name FROM sqlite_master WHERE type='table'";
  $result2 = $dbh->query($query2);
  //print_r($result2);
  
  $table_array = array();
  
  echo "<b>DATABASE TABLES:</b><br /><br />";
  
  while ($row = $result2->fetch(PDO::FETCH_ASSOC)) {
	/*
	foreach ($row as $value) {
      echo $value . "<br />";
    }
	*/
	foreach ($row as $key => $value) {
      echo $value . "<br />\n";
	  array_push($table_array,$value);
    }
	
	//var_dump($row[0]);
  }
  
  echo "<br /><br />";
  
  for($i=0;$i<count($table_array);$i++) {
	echo "<b>TABLE:</b> " . $table_array[$i] . "<br /><br />";
	  
  	$query2 = "PRAGMA table_info(" . $table_array[$i] . ");";
    $result2 = $dbh->query($query2);
	
	while ($row = $result2->fetch(PDO::FETCH_ASSOC)) {
	
	  $tmpcolumn = "";
	  foreach ($row as $key => $value) {
        if( $key == "name" ) {
	      $tmpcolumn .= $value;
	    }
	    else if( $key == "type" ) {
	      $tmpcolumn .= ", " . $value;
	    }
      }
	
      if( $tmpcolumn != "" ) {
	    echo $tmpcolumn . "<br />";
	  } 
    }
	echo "<br /><br />";
	
  }
  
  die();
  
  $query2 = "PRAGMA table_info(CLIENT);";
  $result2 = $dbh->query($query2);
   
  while ($row = $result2->fetch(PDO::FETCH_ASSOC)) {
	
	$tmpcolumn = "";
	foreach ($row as $key => $value) {
      if( $key == "name" ) {
	    $tmpcolumn .= $value;
	  }
	  else if( $key == "type" ) {
	    $tmpcolumn .= ", " . $value;
	  }
    }
	
    if( $tmpcolumn != "" ) {
	  echo $tmpcolumn . "<br />";
	}
	
	//var_dump($row[0]);
  }
  
  
  //print_r($result2);
  
  die();
  

}
catch(Exception $e)
{
	echo 'Caught exception: ',  $e->getMessage(), "\n";
}



?>