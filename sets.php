<?php

function intersection($array1, $array2) {
    return array_intersect($array1, $array2);
};

function union($array1, $array2) {
    return array_unique(array_merge($array1, $array2), SORT_REGULAR);
};


function diff($array1, $array2) {
    return array_diff($array1, $array2);
};

$stations = [];
$stations['ksex'] = ['AL'];
$stations['kone'] = ['ID', 'NV', 'UT'];
$stations['ktwo'] = ['WA', 'MT', 'ID'];
$stations['kthree'] = ['OR', 'CA', 'NV'];
$stations['kfour'] = ['NV', 'UT'];
$stations['kfive'] = ['CA', 'AZ'];

echo '<pre>';

$stateNeeded = [];
$finalStations = [];

$stateNeeded = ['ID', 'NV', 'UT', 'WA', 'OR', 'CA', 'AZ', 'MT', 'AL'];

while ($stateNeeded){
    $bestStation = null;
    $statesCovered = [];

    foreach ($stations as $station => $states) {
        $covered = intersection($stateNeeded, $states);

        if(count($covered) > count($statesCovered)) {

            $bestStation = $station;
            $statesCovered = $covered;
        }
    }

    $stateNeeded = diff($stateNeeded, $statesCovered);
    $finalStations[] = $bestStation;

};

print_r($finalStations);

echo '</pre>';
