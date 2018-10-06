<?php
$tles = $mysqli->query("SELECT * FROM tle t INNER JOIN satellite s ON t.idSatellite = s.id");

$sats = array();
while($f = $tles->fetch_object()){
    $sats[] = array("INTLDES"=>$f->INTLDES, "OBJECT_NAME"=>$f->name, "OBJECT_TYPE"=>"SATELLITE", "TLE_LINE1"=>$f->TLE_LINE1, "TLE_LINE2"=>$f->TLE_LINE2);
}

$json_string = json_encode($sats);
$file = 'satellites.json';
file_put_contents($file, $json_string);
?>