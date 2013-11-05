<?php

// function convertDateToPvm($da)
// function convertDateToInt($da)
// function convertPvmToDate($da)
// function convertPvmToInt($da)
// function convertIntToDate($inte)
// function convertIntToPvm($inte)

// function convertIntToTime($inte)
// function convertIntToAika($inte)
// function convertAikaToTime($ti)
// function convertTimeToAika($ti)

// function timeHourDiff($aa,$la)
// function roundTo($number, $to) 

function convertDateToPvm($da)
{
  if( $da == null ) {
    return null;
  }
	
  if( strlen($da) != 10 ) {
    return null;
  }
	
  $daArr = explode("-",$da);
  if( count($daArr) != 3 ) {
    return null;
  }
	
  if( strlen($daArr[0]) != 4 ) {
    return null;
  }
  
  if( strlen($daArr[1]) != 2 ) {
    return null;
  }
  
  if( strlen($daArr[2]) != 2 ) {
    return null;
  }
  
  if( intval($daArr[1]) == 1 ) {
    if( (intval($daArr[2]) < 1) || (intval($daArr[2]) > 31) ) {
	    return null;
    }
  }
  else if( intval($daArr[1]) == 2 ) {
	if( (intval($daArr[2]) < 1) || (intval($daArr[2]) > 29) ) {
	    return null;
    }
  }
  else if( intval($daArr[1]) == 3 ) {
    if( (intval($daArr[2]) < 1) || (intval($daArr[2]) > 31) ) {
	    return null;
    }	  
  }
  else if( intval($daArr[1]) == 4 ) {
	if( (intval($daArr[2]) < 1) || (intval($daArr[2]) > 30) ) {
	    return null;
    }
  }
  else if( intval($daArr[1]) == 5 ) {
	if( (intval($daArr[2]) < 1) || (intval($daArr[2]) > 31) ) {
	    return null;
    }
  }
  else if( intval($daArr[1]) == 6 ) {
	if( (intval($daArr[2]) < 1) || (intval($daArr[2]) > 30) ) {
	    return null;
    }  
  }
  else if( intval($daArr[1]) == 7 ) {
	if( (intval($daArr[2]) < 1) || (intval($daArr[2]) > 31) ) {
	    return null;
    }  
  }
  else if( intval($daArr[1]) == 8 ) {
	if( (intval($daArr[2]) < 1) || (intval($daArr[2]) > 31) ) {
	    return null;
    }  
  }
  else if( intval($daArr[1]) == 9 ) {
	if( (intval($daArr[2]) < 1) || (intval($daArr[2]) > 30) ) {
	    return null;
    }  
  }
  else if( intval($daArr[1]) == 10 ) {
    if( (intval($daArr[2]) < 1) || (intval($daArr[2]) > 31) ) {
	    return null;
    }  
  }
  else if( intval($daArr[1]) == 11 ) {
	if( (intval($daArr[2]) < 1) || (intval($daArr[2]) > 30) ) {
	    return null;
    }  
  }
  else if( intval($daArr[1]) == 12 ) {
    if( (intval($daArr[2]) < 1) || (intval($daArr[2]) > 31) ) {
	    return null;
    }	  
  }
  else {
    return null;
  }
  
  $newDa = $daArr[2] . "." . $daArr[1] . "." . $daArr[0];
  return $newDa;
}

function convertDateToInt($da)
{
  if( $da == null ) {
    return null;
  }
	
  if( strlen($da) != 10 ) {
    return null;
  }
	
  $daArr = explode("-",$da);
  if( count($daArr) != 3 ) {
    return null;
  }
	
  if( strlen($daArr[0]) != 4 ) {
    return null;
  }
  
  if( strlen($daArr[1]) != 2 ) {
    return null;
  }
  
  if( strlen($daArr[2]) != 2 ) {
    return null;
  }
  
  if( intval($daArr[1]) == 1 ) {
    if( (intval($daArr[2]) < 1) || (intval($daArr[2]) > 31) ) {
	    return null;
    }
  }
  else if( intval($daArr[1]) == 2 ) {
	if( (intval($daArr[2]) < 1) || (intval($daArr[2]) > 29) ) {
	    return null;
    }
  }
  else if( intval($daArr[1]) == 3 ) {
    if( (intval($daArr[2]) < 1) || (intval($daArr[2]) > 31) ) {
	    return null;
    }	  
  }
  else if( intval($daArr[1]) == 4 ) {
	if( (intval($daArr[2]) < 1) || (intval($daArr[2]) > 30) ) {
	    return null;
    }
  }
  else if( intval($daArr[1]) == 5 ) {
	if( (intval($daArr[2]) < 1) || (intval($daArr[2]) > 31) ) {
	    return null;
    }
  }
  else if( intval($daArr[1]) == 6 ) {
	if( (intval($daArr[2]) < 1) || (intval($daArr[2]) > 30) ) {
	    return null;
    }  
  }
  else if( intval($daArr[1]) == 7 ) {
	if( (intval($daArr[2]) < 1) || (intval($daArr[2]) > 31) ) {
	    return null;
    }  
  }
  else if( intval($daArr[1]) == 8 ) {
	if( (intval($daArr[2]) < 1) || (intval($daArr[2]) > 31) ) {
	    return null;
    }  
  }
  else if( intval($daArr[1]) == 9 ) {
	if( (intval($daArr[2]) < 1) || (intval($daArr[2]) > 30) ) {
	    return null;
    }  
  }
  else if( intval($daArr[1]) == 10 ) {
    if( (intval($daArr[2]) < 1) || (intval($daArr[2]) > 31) ) {
	    return null;
    }  
  }
  else if( intval($daArr[1]) == 11 ) {
	if( (intval($daArr[2]) < 1) || (intval($daArr[2]) > 30) ) {
	    return null;
    }  
  }
  else if( intval($daArr[1]) == 12 ) {
    if( (intval($daArr[2]) < 1) || (intval($daArr[2]) > 31) ) {
	    return null;
    }	  
  }
  else {
    return null;
  }
 
  return strtotime($da);
}

function convertPvmToDate($da)
{
  if( $da == null ) {
    return null;
  }
  	
  if( (strlen($da) != 10) || (strlen($da) != 9) || (strlen($da) != 8) ) {
  }
  else {
    return null;  
  }
  	
  $daArr = explode(".",$da);
  if( count($daArr) != 3 ) {
    return null;
  }
 
  if( strlen($daArr[2]) != 4 ) {
    return null;
  }
  
  if( (intval($daArr[2]) < 1900) || (intval($daArr[2]) > 2100) ) {
    return null;
  }
  
  if( strlen($daArr[0]) != 2 ) {
    if( strlen($daArr[0]) == 1 ) {
	  $daArr[0] = "0" . $daArr[0];
	}
	else {
      return null;
	}
  }
  
  if( strlen($daArr[1]) != 2 ) {
    if( strlen($daArr[1]) == 1 ) {
	  $daArr[1] = "0" . $daArr[1];
	}
	else {
      return null;
	}
  }
  
  if( intval($daArr[1]) == 1 ) {
    if( (intval($daArr[0]) < 1) || (intval($daArr[0]) > 31) ) {
	    return null;
    }
  }
  else if( intval($daArr[1]) == 2 ) {
	if( (intval($daArr[0]) < 1) || (intval($daArr[0]) > 29) ) {
	    return null;
    }
  }
  else if( intval($daArr[1]) == 3 ) {
    if( (intval($daArr[0]) < 1) || (intval($daArr[0]) > 31) ) {
	    return null;
    }	  
  }
  else if( intval($daArr[1]) == 4 ) {
	if( (intval($daArr[0]) < 1) || (intval($daArr[0]) > 30) ) {
	    return null;
    }
  }
  else if( intval($daArr[1]) == 5 ) {
	if( (intval($daArr[0]) < 1) || (intval($daArr[0]) > 31) ) {
	    return null;
    }
  }
  else if( intval($daArr[1]) == 6 ) {
	if( (intval($daArr[0]) < 1) || (intval($daArr[0]) > 30) ) {
	    return null;
    }  
  }
  else if( intval($daArr[1]) == 7 ) {
	if( (intval($daArr[0]) < 1) || (intval($daArr[0]) > 31) ) {
	    return null;
    }  
  }
  else if( intval($daArr[1]) == 8 ) {
	if( (intval($daArr[0]) < 1) || (intval($daArr[0]) > 31) ) {
	    return null;
    }  
  }
  else if( intval($daArr[1]) == 9 ) {
	if( (intval($daArr[0]) < 1) || (intval($daArr[0]) > 30) ) {
	    return null;
    }  
  }
  else if( intval($daArr[1]) == 10 ) {
    if( (intval($daArr[0]) < 1) || (intval($daArr[0]) > 31) ) {
	    return null;
    }  
  }
  else if( intval($daArr[1]) == 11 ) {
	if( (intval($daArr[0]) < 1) || (intval($daArr[0]) > 30) ) {
	    return null;
    }  
  }
  else if( intval($daArr[1]) == 12 ) {
    if( (intval($daArr[0]) < 1) || (intval($daArr[0]) > 31) ) {
	    return null; 
    }	  
  }
  else {
    return null;
  }
  
  $newDa = $daArr[2] . "-" . $daArr[1] . "-" . $daArr[0];
  return $newDa;
}

function convertPvmToInt($da)
{
  if( $da == null ) {
    return null;
  }
	
 if( (strlen($da) != 10) || (strlen($da) != 9) || (strlen($da) != 8) ) {
  }
  else {
    return null;  
  }
	
  $daArr = explode(".",$da);
  if( count($daArr) != 3 ) {
    return null;
  }
	
  if( strlen($daArr[2]) != 4 ) {
    return null;
  }
  
  if( (intval($daArr[2]) < 1900) || (intval($daArr[2]) > 2100) ) {
    return null;
  }
  
  if( strlen($daArr[0]) != 2 ) {
    if( strlen($daArr[0]) == 1 ) {
	  $daArr[0] = "0" . $daArr[0];
	}
	else {
      return null;
	}
  }
  
  if( strlen($daArr[1]) != 2 ) {
    if( strlen($daArr[1]) == 1 ) {
	  $daArr[1] = "0" . $daArr[1];
	}
	else {
      return null;
	}
  }
  
  if( intval($daArr[1]) == 1 ) {
    if( (intval($daArr[0]) < 1) || (intval($daArr[0]) > 31) ) {
	    return null;
    }
  }
  else if( intval($daArr[1]) == 2 ) {
	if( (intval($daArr[0]) < 1) || (intval($daArr[0]) > 29) ) {
	    return null;
    }
  }
  else if( intval($daArr[1]) == 3 ) {
    if( (intval($daArr[0]) < 1) || (intval($daArr[0]) > 31) ) {
	    return null;
    }	  
  }
  else if( intval($daArr[1]) == 4 ) {
	if( (intval($daArr[0]) < 1) || (intval($daArr[0]) > 30) ) {
	    return null;
    }
  }
  else if( intval($daArr[1]) == 5 ) {
	if( (intval($daArr[0]) < 1) || (intval($daArr[0]) > 31) ) {
	    return null;
    }
  }
  else if( intval($daArr[1]) == 6 ) {
	if( (intval($daArr[0]) < 1) || (intval($daArr[0]) > 30) ) {
	    return null;
    }  
  }
  else if( intval($daArr[1]) == 7 ) {
	if( (intval($daArr[0]) < 1) || (intval($daArr[0]) > 31) ) {
	    return null;
    }  
  }
  else if( intval($daArr[1]) == 8 ) {
	if( (intval($daArr[0]) < 1) || (intval($daArr[0]) > 31) ) {
	    return null;
    }  
  }
  else if( intval($daArr[1]) == 9 ) {
	if( (intval($daArr[0]) < 1) || (intval($daArr[0]) > 30) ) {
	    return null;
    }  
  }
  else if( intval($daArr[1]) == 10 ) {
    if( (intval($daArr[0]) < 1) || (intval($daArr[0]) > 31) ) {
	    return null;
    }  
  }
  else if( intval($daArr[1]) == 11 ) {
	if( (intval($daArr[0]) < 1) || (intval($daArr[0]) > 30) ) {
	    return null;
    }  
  }
  else if( intval($daArr[1]) == 12 ) {
    if( (intval($daArr[0]) < 1) || (intval($daArr[0]) > 31) ) {
	    return null;
    }	  
  }
  else {
    return null;
  }
  
  $newDa = $daArr[2] . "-" . $daArr[1] . "-" . $daArr[0];
  return strtotime($newDa);
}

function convertIntToDate($inte)
{
  if( (intval($inte)==0)  || (intval($inte)==1) ) {
    return null;
  }
  $inval = intval($inte);
  return date("Y-m-d",$inval);	
}

function convertIntToPvm($inte)
{
  if( (intval($inte)==0)  || (intval($inte)==1) ) {
    return null;
  }
  $inval = intval($inte);
  return date("d.m.Y",$inval);	
}

function convertAikaToTime($ti)
{
  if( (strlen($ti)!=4) || (strlen($ti)!=5) ) {
  }
  else {
    return null;
  }
  
  $tiArr = explode(".",$ti);
  if( count($tiArr) != 2 ) {
    return null;
  }
  
  if( strlen($tiArr[0])!=2 ) {
    if( strlen($tiArr[0])==1 ) {
	  $tiArr[0] = "0" . $tiArr[0];
	}
	else {
	  return null;
	}
  }
	
  if( (intval($tiArr[0])==0)  || (intval($tiArr[0])==1) ) {
    if( $tiArr[0] == "00" ) {
	}
	else if( $tiArr[0] == "01" ) {
	}
	else {
	  return null;
	}
  }
  
  if( (intval($tiArr[1])==0)  || (intval($tiArr[1])==1) ) {
    if( $tiArr[1] == "00" ) {
	}
	else if( $tiArr[1] == "01" ) {
	}
	else {
	  return null;
	}
  }
  
  if( (intval($tiArr[0])<0)  || (intval($tiArr[0])>23) ) {
    return null;
  }
  
  if( (intval($tiArr[1])<0)  || (intval($tiArr[1])>59) ) {
    return null;
  }
  
  $tistr = $tiArr[0] . ":" . $tiArr[1];
  return $tistr;	
}

function convertTimeToAika($ti)
{
  if( strlen($ti)!=5 ) {
    return null;
  }
  
  $tiArr = explode(":",$ti);
  if( count($tiArr) != 2 ) {
    return null;
  }
  
  if( strlen($tiArr[0])!=2 ) {
    return null;
  }
  
  if( strlen($tiArr[1])!=2 ) {
    return null;
  }
  
  if( (intval($tiArr[0])<0)  || (intval($tiArr[0])>23) ) {
    return null;
  }
  
  if( (intval($tiArr[1])<0)  || (intval($tiArr[1])>59) ) {
    return null;
  }
  
  $tistr = $tiArr[0] . "." . $tiArr[1];
  return $tistr;	
}

function convertIntToTime($inte)
{
  if( (intval($inte)==0)  || (intval($inte)==1) ) {
    return null;
  }
  $inval = intval($inte);
  return date("H:i",$inval);	
}

function convertIntToAika($inte)
{
  if( (intval($inte)==0)  || (intval($inte)==1) ) {
    return null;
  }
  $inval = intval($inte);
  return date("H.i",$inval);	
}

function timeHourDiff($aa,$la)
{
  if( ($aa==null) || ($la==null) ) {
  	return -1;
  }	
	
  $atime = strtotime($aa);
  $ltime = strtotime($la);
  
  if( ($atime==false) || ($atime==false) ) {
  	return -1;
  }
  
  $aika = ($ltime-$atime) / 3600;
  $aika = roundTo($aika, 0.1);
  
  return $aika;	
}

function roundTo($number, $to) {
  return round($number/$to, 0)* $to;
}

/*
$da = "2011-04-30";
echo convertDateToPvm($da) . "<br/>";
echo convertDateToInt($da) . "<br/>";
echo convertPvmToDate("31.06.2010") . "<br/>";
echo convertPvmToDate(convertDateToPvm($da)) . "<br/>";
echo convertDateToInt($da) . "<br/>";
echo convertPvmToInt(convertDateToPvm($da)) . "<br/>";

echo convertIntToDate(convertDateToInt($da)) . "<br/>";
echo convertIntToPvm(convertDateToInt($da)) . "<br/>";

echo convertIntToTime(time()) . "<br />";
echo convertIntToAika(time()) . "<br />";

echo convertAikaToTime("02.01") . "<br />";
echo convertAikaToTime("23.59") . "<br />";

echo convertTimeToAika("02:01") . "<br />";
echo convertTimeToAika("23:59") . "<br />";

die();
*/
?>