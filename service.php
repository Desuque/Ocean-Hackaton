<?php
include 'config.php';

//This is my personal key, you can change it :) (see n2yo.com)
$apikey = '&apiKey=RFQQ3R-42XRJ9-77N7GV-3W8N';
$apiurl = 'https://www.n2yo.com/rest/v1/satellite/tle/';

$satellites = $mysqli->query("SELECT * FROM satellite");

//This script run 1 time/day
while($f = $satellites->fetch_object()){
    $link = $apiurl.$f->idSat.$apikey;
    $json = file_get_contents($link);
	//echo $json.'<br/>';

	$decod = json_decode($json);
	$divide = explode(" ", $decod->{'tle'});

	echo $decod->{'tle'}.'<br/>'.'<br/>'; // 12345
	echo $divide[1].'<br/>';

	$pieces = array_chunk($decod, ceil(count($array) / 2));
	echo $pieces;


	//$sql = "INSERT INTO tle(idSatellite, INTLDES, TLE_LINE1, TLE_LINE2)
	//			VALUES (".$f->id.",".$divide[1].", 'john@example.com')";


//if ($conn->query($sql) === TRUE) {
//    echo "New record created successfully";
//} else {
//    echo "Error: " . $sql . "<br>" . $conn->error;
//}

//$conn->close();
}

$satellites = $mysqli->query("SELECT * FROM satellite");

$tles = $mysqli->query("SELECT * FROM tle WHERE idSatellite in (SELECT id FROM satellite)");

$sats = array();
while($f = $tles->fetch_object()){
    $sats[] = array("INTLDES"=>$f->INTLDES, "OBJECT_NAME"=>"SPACE STATION", "OBJECT_TYPE"=>"SATELLITE", "TLE_LINE1"=>$f->TLE_LINE1, "TLE_LINE2"=>$f->TLE_LINE2);

}

$json_string = json_encode($sats);
$file = 'satellites.json';
file_put_contents($file, $json_string);
?>