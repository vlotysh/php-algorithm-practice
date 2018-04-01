<?php

$graph = [];
$graph['you'] = ['alice', 'bob', 'claire'];
$graph['bob'] = ['anuj', 'peggy'];
$graph['alice'] = ['peggy'];
$graph['claire'] = ['thom', 'jonny'];
$graph['anuj'] = [];
$graph['peggy'] = [];
$graph['thom'] = [];
$graph['jonny'] = [];


function isMethSeller($name) {
    return $name[-1] == 'm';
}

function searchSeller($name, $graph) {
    $searched = [];
    $queue = new \SplQueue();
    $queue->enqueue($graph[$name]);
    while (!$queue->isEmpty()) {
        $friends = $queue->dequeue(); // get friends from queue
        foreach ($friends as $friend) { // foreach by all friends
            if(in_array($friend, $searched)) { // check if user checked early
                continue;
            }

            if(isMethSeller($friend)) { // check if math seller
                return $friend;
            } else {
                $queue->enqueue($graph[$friend]); // if not seller add to queue friend's friends
                $searched[] = $friend;
            }
        }
    }

    return 'Not found';
}

var_dump(searchSeller('you', $graph));
