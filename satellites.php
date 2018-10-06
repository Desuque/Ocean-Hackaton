<?php
$mysqli = new mysqli('localhost', 'root', '', 'ocean');
$mysqli->set_charset("utf8");

$satellites = $mysqli->query("SELECT * FROM satellite");

$tles = $mysqli->query("SELECT * FROM tle WHERE idSatellite in (SELECT idSatellite FROM satellite)");

//$jsonres = "[";
$sats = array();
while($f = $tles->fetch_object()){
    $sats[] = array("INTLDES"=>$f->INTLDES, "OBJECT_NAME"=>"SPACE STATION", "OBJECT_TYPE"=>"SATELLITE", "TLE_LINE1"=>$f->TLE_LINE1, "TLE_LINE2"=>$f->TLE_LINE2);

}

$json_string = json_encode($sats);
$file = 'satellites.json';
file_put_contents($file, $json_string);
?>