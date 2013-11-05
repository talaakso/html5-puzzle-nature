<?php

class data
{
  public $info;
  public $success;
  public $filename;
};

$retVal = new data();
$basedir0 = "./dbase";
$basedir = "./dbase/backup";

if( !file_exists($basedir) ) {
  mkdir($basedir);
}

$ye = date("Y");
$basedir .= "/" . $ye;

if( !file_exists($basedir) ) {
  mkdir($basedir);
}

$mo = date("m");
$basedir .= "/" . $mo;

if( !file_exists($basedir) ) {
  mkdir($basedir);
}

$datestr = date("_Y_m_d_H_i_s");

$file0 = $basedir0 . "/dbase.sdb";
$file = $basedir . "/dbase" . $datestr . ".sdb";

if( copy($file0, $file) ) {
  $retVal->success  = true;
  $retVal->info     = "<span style=\"color:#060;\">Tietokannan varmuuskopiointi onnistui!</span><br />";
}
else {
  $retVal->success  = false;
  $retVal->info     = "<span style=\"color:#F00;\">Tietokannan varmuuskopiointi epäonnistui!</span><br />";
}

echo json_encode($retVal);

?>