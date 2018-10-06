<?php

//This is my personal key, you can change it :) (see n2yo.com)
define("apiKey", "RFQQ3R-42XRJ9-77N7GV-3W8N");
define("apiURL", "https://www.n2yo.com/rest/v1/satellite/tle/25543&apiKey=");

$mysqli = new mysqli('localhost', 'root', '', 'ocean');
$mysqli->set_charset("utf8");

$satellites = $mysqli->query("SELECT * FROM satellite");

$tles = $mysqli->query("SELECT * FROM tle WHERE idSatellite in (SELECT idSatellite FROM satellite)");

$sats = array();
while($f = $tles->fetch_object()){
    $sats[] = array("INTLDES"=>$f->INTLDES, "OBJECT_NAME"=>"SPACE STATION", "OBJECT_TYPE"=>"SATELLITE", "TLE_LINE1"=>$f->TLE_LINE1, "TLE_LINE2"=>$f->TLE_LINE2);

}

$json_string = json_encode($sats);
$file = 'satellites.json';
file_put_contents($file, $json_string);
?>