<?php
//
//function recursiveFind(array $array) {
//    foreach ($array as $key => $item) {
//        var_dump($item);
//        echo '<br>';
//         if (is_array($item)) {
//            return recursiveFind($item);
//        } elseif($item == '--2') {
//             return $item;
//        }
//
//    }
//}

function recursiveFind($array, $search, $level = 1){
    $findValue = null;
    var_dump($array);
    echo '<br>';
    foreach($array as $key => $value) {
        if(is_array($value)){
            $findValue = recursiveFind($value, $search, $level + 1);
        } elseif ($value == $search) {
            return $key . ": " . $value . ' level '.$level;
            break;
        }
    }

    return $findValue;
}


function factorial($i) {
    if($i === 0) {
        return 1;
    } else {
        return $i * factorial($i - 1);
    }
}

$array = [
    '1',
    [
        '-2',
        '-3',
        '-4',
        'bc'
    ],
    [
        '--2',
        '--3',
        '--4',
        [
            '----3'
        ]
    ],
    '2',
    '31'
];

var_dump(recursiveFind($array, '-2'));
var_dump(recursiveFind($array, '----3'));

var_dump(factorial(3));
