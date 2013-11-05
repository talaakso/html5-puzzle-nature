<?php

function create_dbase()
{

	try {
		
	  $dbh = new PDO("sqlite:./dbase.sdb");
	  
	  $query = "CREATE TABLE scores
	  (
		id INTEGER PRIMARY KEY AUTOINCREMENT,
		status INTEGER DEFAULT 1,
		gameid TEXT NOT NULL DEFAULT '',
		gameimage TEXT NOT NULL DEFAULT '',
		score INTEGER DEFAULT 0,		
		name TEXT NOT NULL DEFAULT '',
		modified TEXT NOT NULL DEFAULT ''
	   )";
  
  	   $dbh->exec($query);
	   
	}
	catch(PDOException $e)
	{
	  echo $e->getMessage();
	}
}

create_dbase();


?>