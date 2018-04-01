<?php

function binary_search($array, $item) {
    $low = 0;
    $high = count($array) - 1;

    while ($low <= $high) {
        $mid = $high + $low >> 1;
        $guess  = $array[$mid];
        if ($guess == $item) {
            return $mid;
        } elseif ($guess > $item) {
            $high = $mid - 1;
        } elseif ($guess < $item) {
            $low = $mid + 1;
        }

    };
};

$list = [1, 3, 4, 6, 10, 12, 16, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36,46, 56, 77, 87, 89, 92, 124, 61213, 21515];

$item = 61213;

echo binary_search($list,$item);

