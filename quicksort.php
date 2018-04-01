<?php

class Counter {
    static $item = 0;
}


function sumArray($subject) {
   if(empty($subject)) {
        return 0;
    } elseif(is_array($subject)) {
        $number = array_shift($subject);
        return $number + sumArray($subject);
    }
}

function maxInArray($subject) {
    if(empty($subject)) {
        return 0;
    } elseif(is_array($subject)) {
        $number = array_shift($subject);
        $max = maxInArray($subject);
        if($number > $max) {
            return $number;
        } else {
            return $max;
        }
    }
}

function minInArray($subject) {
    if(count($subject) == 1) {
        return array_shift($subject);
    } elseif(is_array($subject)) {
        $number = array_shift($subject);
        $max = minInArray($subject);
        if($number < $max) {
            return $number;
        } else {
            return $max;
        }
    }
}

function qsort($array) {
    if(count($array) < 2) {
        return $array;
    } else {
        $middleIndex = count($array)>> 1;
        $pivot = $array[$middleIndex];
        unset($array[$middleIndex]);
        $less = $bigger = [];

        foreach ($array as $item) {
            if ($item <= $pivot) { // if ned sort DESC  `$array[$i] >= $pivot`
                $less[] = $item;
            } else {
                $bigger[] = $item;
            }
        }

        Counter::$item++;
        return array_merge(qsort($less), [$pivot], qsort($bigger));
    }
}



function qsort2($array) {
    if(count($array) < 2) {
        return $array;
    } else {
        $pivot = $array[0];
        $less = $bigger = [];

        for ($i = 1; $i < count($array); $i++) {
            if ($array[$i] <= $pivot) { // if ned sort DESC  `$array[$i] >= $pivot`
                $less[] = $array[$i];
            } else {
                $bigger[] = $array[$i];
            }
        }
        Counter::$item++;
        return array_merge(qsort2($less), [$pivot], qsort2($bigger));
    }
}

$array = [2, 1, 78, 21, 124, 66263, 125, 15215, 15125, 12562, 1515, 36433, 363615242, 535125512, 1251242,
    215, 124125125, 12512512, 5 ,21515152,  5, 12, 2, 10, 124, 255, 121,0, 0,1 , 124];


//$array = [22, 21, 20, 19, 18, 17, 16, 15, 14, 13, 12, 11, 10 , 9 ,8, 7, 6, 5, 4, 3, 2,1, 0, 0];

echo('Sum ' . sumArray($array) . '<br>');
echo('Max ' . maxInArray($array) . '<br>');
echo('Min ' . minInArray($array) . '<br>');

$middlePivot = qsort($array);
$middlePivotTime = Counter::$item;
Counter::$item = 0;
$firstPivot = qsort2($array);
$firstPivotTime = Counter::$item;



?>


<table width="100%" border="1">
    <tr>
        <td>
            <? foreach ($array as $key => $value):?>
                <p><b><?=$key;?></b> : <?=$value;?></p>
            <? endforeach; ?>
        </td>
        <td>
            <h3>middle Pivot <?=$middlePivotTime;?></h3>
            <? foreach ($middlePivot as $key => $value):?>
                <p><b><?=$key;?></b> : <?=$value;?></p>
            <? endforeach; ?>
        </td>
        <td>
            <h3>first Pivot <?=$firstPivotTime;?></h3>
            <? foreach ($firstPivot as $key => $value):?>
                <p><b><?=$key;?></b> : <?=$value;?></p>
            <? endforeach; ?>
        </td>
    </tr>
    </table>
