<?php
class Counter {
    static $item = 0;
}


function findSmallest($array = [])
{
    if(!$array || count($array) < 1) {
        return null;
    }

    $smallestIndex = key($array);
    $smallest = $array[$smallestIndex];

    foreach ($array as $key => $value) {
        Counter::$item++;
        if($value < $smallest) {
            $smallest = $value;
            $smallestIndex = $key;
        }
    }

    return $smallestIndex;
}

function selectionSort($array)
{
    $newArray = [];

    foreach ($array as $key => $value) {
        Counter::$item++;
        $smallestIndex = findSmallest($array);
        $smallest = $array[$smallestIndex];
        unset($array[$smallestIndex]);
        array_push($newArray, $smallest);

    }

    return $newArray;
}

$array = [12, 12, 2125, 315152, 215125, 0, 1, 1];

$array = [2, 1, 78, 21, 124, 66263, 125, 15215, 15125, 12562, 1515, 124124212441412,36433, 363615242, 535125512, 1251242,
    215, 124125125, 12512512, 5 ,21515152,  5, 12, 2, 10, 124, 255, 121,0, 0,1 , 124];


var_dump(selectionSort($array));
echo  Counter::$item;