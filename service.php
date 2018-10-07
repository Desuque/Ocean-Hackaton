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

	$decod = json_decode($json);
	$divide = preg_split('/[\s]+/', $decod->{'tle'});

	$isSecond = false;
	$tle1 = array();
	$tle2 = array();
	for ( $i = 0 ; $i < count($divide) ; $i++ ) {
		if($divide[$i] == "2"){
			$isSecond = true;
		}

		if(!$isSecond) {
			$tle1[] = $divide[$i];
		}
		else {
			$tle2[] = $divide[$i];
		}
	}

	$arrtle1 = implode(" ", $tle1);
	$arrtle2 = implode(" ", $tle2);

	//Add the satellite info
	$sql = "INSERT INTO tle(idSatellite, INTLDES, TLE_LINE1, TLE_LINE2)
		VALUES ('$f->id','$tle1[1]','$arrtle1','$arrtle2')";

	if ($mysqli->query($sql) === TRUE) {
    	echo 'New record created successfully, satellite: '.$f->id.'<br/>';
	} else {
    	echo "Error: " . $sql . "<br/>" . $mysqli->error . '<br/>';
	}
}

$mysqli->close();
?>