<?php

    function mercatorTransformation($long, $lat){
        $x = $long - 100;
        $y = log(tan($lat) + 1/cos($sec));
        return array($x, $y);
    }

    $my_img = imagecreate( 4096, 2048 );
    $background = imagecolorallocate( $my_img, 0, 0, 0 );
    $square_color = imagecolorallocate( $my_img, 100, 100, 100 );

    // $long = 0;
    // $lat = 90;

    // // for ( $i = (-1*$lat - 5)*11.3; $i < (-1 * $lat + 5)*11.3; $i++) {
    // //     for ( $j=($long - 5)*11.3; $j < ($long + 5)*11.3; $j++){
    // //         $x = intval($j + 2048);
    // //         $y = intval(log( tan($i) + 1/cos($i) ) + 1024);
    // //         imagesetpixel ( $my_img, $x, $y, $square_color);
    // //     }
    // // }

    // $x = intval($long);
    // $y = intval(log( tan($lat) + 1/cos($lat) ));

    // for ( $i = (-1*$y - 5)*11.3; $i < (-1 * $y + 5)*11.3; $i++) {
    //     for ( $j=($x - 5)*11.3; $j < ($x + 5)*11.3; $j++){
    //         imagesetpixel ( $my_img, $j + 2048, $i + 1024, $square_color);
    //     }
    // }

    $long_11 = -97.00;  $lat_11 = -30;//Left top
    $long_12 = -100.00;  $lat_12 =-50;//left down
    $long_21 = -77.00;  $lat_21 = -30;//right top
    $long_22 = -73.00;  $lat_22 = -50;//right down
    



    $x1 = $long_11*11.3+2048; //init values
    $x2 = $long_21*11.3+2048;
    $x3 = $long_12*11.3+2048;
    $x4 = $long_22*11.3+2048;
    $y1 = $lat_11*-11.3+1024;
    $y2 = $lat_21*-11.3+1024;
    $y3 = $lat_12*-11.3+1024;
    $y4 = $lat_22*-11.3+1024;

    $FLAG_left = true;
    $FLAG_right = true;

    if($x1 == $x3)  
        $FLAG_right = false;
    if($x4 == $x2)  
        $FLAG_left = false;
    
    if($FLAG_left && $FLAG_right){
        $alpha_1 = ($y1-$y3)/($x1-$x3);
        $beta_1 = $y1 - $x1 * $alpha_1;
        $alpha_2 = ($y4-$y2)/($x4-$x2);
        $beta_2 = $y4 - $x4 * $alpha_2;
    }

    for ( $i = $y1; $i < $y4; $i++) {
        for ( $j = $x1; $j < $x2; $j++) {
            if($i < ($y1+5) || $i > ($y4-5) || $j < ($x1+5) || $j > ($x2-5))
            imagesetpixel ($my_img, $j,$i, $square_color);
        }
        if ($FLAG_left)
            $x1 = ($i - $beta_1)/$alpha_1;
        if ($FLAG_right)
            $x2 = ($i - $beta_2)/$alpha_2;
    }


    for ($i = -80; $i < 85; $i = $i + 10){
        $y = intval($i*-11.3+1024);
        for ( $j = 0; $j < 4096; $j++) {
                imagesetpixel ( $my_img, $j,$y, $square_color);
            }
    }



    $square_color = imagecolorallocate( $my_img, 0, 0, 78 );
    for ( $i = 0; $i < 2048 ; $i++) {
        for ( $j = 3382-2048; $j < 3382; $j++) {
            imagesetpixel ($my_img, $j,$i, $square_color);
        }

    }

    //print_r("long1: ".$x1." - long2: ".$x2." - lat1: ".$y1." - lat2: ".$y2);

    // for ( $i = $lat_1*11.3; $i < $lat_2 * 11.3; $i++) {
    //     for ( $j = $long_1*11.3; $j < $long_2 * 11.3; $j++) {
    //         $x = $j;
    //         $y = intval(log(tan($lat;
    //         imagesetpixel ( $my_img, $j + 2048, -1*$i + 1024, $square_color);

    //     }
    // }

    // function start_x() {
    //     return ;
    // }

    // function start_y() {
    //     return ;
    // }

    // function stop_x() {
    //     return ;
    // }

    // function stop_y() {
    //     return ;
    // }

    // for ($i = start_y(); $i<stop_y(); $i++) {
    //     for ($j = start_x(); $j < stop_x(); $j++){

    //         imagesetpixel ( $my_img, $j, $i, $square_color);

    //     }
    // }


    header( "Content-type: image/png" );
    imagepng( $my_img, "./test_image_1.png");
    imagedestroy( $my_img );


    // function create_patch( $coord_1, $coord_2) {

    //     if ( empty($coord_1) && empty($coord_2) ) {
    //         echo "hola";
    //         return;
    //     }

    //     $my_img = imagecreate( 4096, 2048 );
    //     $background = imagecolorallocate( $my_img, 0, 0, 0 );
    //     $patch_colour = imagecolorallocate( $my_img, 255, 255, 255 );
    
    //     header( "Content-type: image/png" );
    //     imagepng( $my_img, "./test_image_1.png");
    //     imagedestroy( $my_img );    

    // }
    // $test1 = array(1,1);
    // create_patch( $test1 , $test1);


?>


