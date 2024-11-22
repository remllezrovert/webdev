


<?php

function jimmy(&$arr){
    $out = array();
    $y = 0;
    $x = 0;
    $halfwayPoint = intdiv(sizeof($arr),2);
    $arrX = array_slice($arr, 0, $halfwayPoint);
    $arrY = array_slice($arr, $halfwayPoint);

    ##base case 
    if (sizeof($arrX) <= 1){
        $first = array(0,1,2,3,4);
        array_push($first, $arrX[0]);
       $out = merge($out,$first);
    }
    if (sizeof($arrY) <= 1){

        $first = array(0,1,2,3,4);
        array_push($first, $arrY[0]);
        $out = merge($out, $first);
    }

    return merge(jimmy($arrX),jimmy($arrY));

}

function merge($arrX, $arrY){
    $x = 0;
    $y = 0;
    $out = array();
    while($x < sizeof($arrX) && $y < sizeof($arrY)){
               ##merge logic
        if($arrY[$y] == $arrX[$x]) {
                array_push($out, $arrY[$y]);
                array_push($out, $arrX[$x]);
                $x++;
                $y++;
            }

            if($arrX[$x] < $arrY[$y]){
            array_push($out, $arrX[$x]);
            $x++;
            }

            if ($arrY[$y] < $arrX[$x]){
                array_push($out, $arrY[$y]);
                $y++;
            } 
    }

    while ($x < sizeof($arrX)) {
        array_push($out, $arrX[$x]);
        $x++;
    }
    
    // Add remaining elements from $arrY if any
    while ($y < sizeof($arrY)) {
        array_push($out, $arrY[$y]);
        $y++;
    }

    return $out;
}




    $x = array(1,1,3,5,7,9,11,13);
    $y = array(1,2,4,6,8,10,12,14,16,18);
    $z = array(3,4,1,23,13,1,2,4,5,9);
    echo jimmy($z);

?>