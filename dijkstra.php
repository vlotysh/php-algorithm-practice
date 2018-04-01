<?php

function findSmellCost2($costs, $processed) {
    $lowestCost = INF;
    $lowestCostNode = null;

    foreach ($costs as $node => $cost) {
        if($cost < $lowestCost && $cost !== INF && !in_array($node, $processed)) {
            $lowestCost = $cost;
            $lowestCostNode = $node;
        }
    }

    return $lowestCostNode;
}

function dijkstra2() {

    $graph = [];
    $graph['start']['a'] = 5;
    $graph['start']['b'] = 7;

    $graph['b']['a'] = 8;
    $graph['b']['d'] = 7;

    $graph['a']['d'] = 2;
    $graph['a']['c'] = 4;

    $graph['c']['d'] = 6;
    $graph['c']['fin'] = 3;

    $graph['d']['fin'] = 1;

    $graph['fin'] = [];

    $costs = [];
    $costs['a'] = 5;
    $costs['b'] = 2;
    $costs['fin'] = INF;

    $parents = [];
    $parents['a'] = 'start';
    $parents['b'] = 'start';
    $parents['fin'] = null;
    echo '<pre>';
  //  print_r($costs);
    $processed = [];

    $node = findSmellCost2($costs, $processed);

    while ($node) {
        $cost = $costs[$node];
        $neighbors = $graph[$node];

        foreach ($neighbors as $neighbor => $neighborCost) {
            $newCost = $neighborCost + $cost;

            $testCost = $costs[$neighbor];

            if(!$testCost) {
                $testCost = INF;
            }

            if ($newCost <= $testCost) {
                $costs[$neighbor] = $newCost;
                $parents[$neighbor] = $node;
            };
        };

        if(!in_array($node, $processed)) {
            $processed[] = $node;
        }

        $node = findSmellCost2($costs, $processed);
    }



    if ($parents['fin']) {
        $parent = 'fin';
    }

    $path = [];

    while($parent) {
        $subParent = $parents[$parent];

        $path[$parents[$parent]] = $parent;

        if($parents[$parent] == 'start') {
            $parent = null;
        }

        if(isset($parents[$subParent])) {
            $parent = $subParent;
        }
    };





    echo '<br>';
        echo '</pre>';

    return array_reverse($path);
}

var_dump(array_diff([214], [1, 214]));

echo '<br>';

















































function dijkstra() {
    $graph['start'] = [];
    $graph['start']['a'] = 1;
    $graph['start']['b'] = 1;

    $graph['a'] = [];
    $graph['a']['fin'] = 1;

    $graph['b'] = [];
    $graph['b']['a'] = 1;
    $graph['b']['fin'] = 1;

    $graph['fin'] = [];

    $infinity = INF;

    $costs = [];
    $costs['a'] = 1;
    $costs['b'] = 1;
    $costs['fin'] = $infinity;

    $parents = [];
    $parents['a'] = 'start';
    $parents['b'] = 'start';
    $parents['fin'] = null;

    $processed = [];
    echo '<pre>';
    print_r($costs);
    $node = findLowestCostNode($costs, $processed);

    while ($node) {
        $cost = $costs[$node];
        $neighbors = $graph[$node];

        foreach ($neighbors as $neighbor => $neighborCost) {
            $newCost = $cost + $neighborCost;
            if($costs[$neighbor] >= $newCost) {
                $costs[$neighbor] = $newCost;
                $parents[$neighbor] = $node;
            }
        }

        if(!in_array($node, $processed)) {
            $processed[] = $node;
        }

        $node = findLowestCostNode($costs, $processed);
    }


    print_r($costs);
    print_r($parents);

    echo '<br>';
}

function findLowestCostNode($costs, $processed) {
    $lowestCost = INF;
    $lowestCostNode = null;

    foreach ($costs as $node => $cost) {
        if($cost < $lowestCost && $cost !== INF && !in_array($node, $processed)) {
            $lowestCost = $cost;
            $lowestCostNode = $node;
        }
    }

    return $lowestCostNode;
}
echo '</pre>';

var_dump(dijkstra2());

