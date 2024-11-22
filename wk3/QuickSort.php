

<?php



function quickSort(&$arr,$start,$end){

    #Base case
    if ($start >= $end) {
        return $arr;
    }


    #generate a pivot
    $middle = $arr[$start + intdiv(($end - $start), 2)];


    $partIndex= partition($arr,$start,$end, $middle);
    quickSort($arr,$start,$partIndex - 1);
    quickSort($arr,$partIndex + 1,$end);
    return $arr;

}



function quickSelect($arr, $left,$right,$k){

    if ($left == $right) return $arr[$left];

    #chose pivot
    $pivot = $arr[$left+ intdiv(($right- $left), 2)];
    $partIndex = partition($arr, $left, $right, $pivot);
    if ($k == $partIndex + 1){
        return $partIndex;
    } else if ($k < $partIndex + 1){

        return quickSelect($arr, $left, $partIndex - 1, $k);
    } else {
        return quickSelect($arr, $partIndex + 1, $right, $k);
    }
}

function partition(&$arr, $left, $right, $pivot) {
    $i = $left;
    $j = $right;

    while ($i <= $j) {
        while ($arr[$i] < $pivot) {
            $i++;
        }

        while ($arr[$j] > $pivot) {
            $j--;
        }

        if ($i <= $j) {
            // Swap 
            $tmp = $arr[$i];
            $arr[$i] = $arr[$j];
            $arr[$j] = $tmp;
            
            $i++;
            $j--;
        }
    }

    return $i;
}


    $z = array(3,4,1,23,13,1,2,4,5,9);
$result = quickSort($z, 0, count($z) - 1);
$result2 = quickSelect($z, 0, count($z) - 1, 4);
print_r($result);
print_r($result2);
?>