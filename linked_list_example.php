<?php

include 'Structures/LinkList.php';
include 'Structures/ListNode.php';

use Structures\{
    LinkList, ListNode
};

$llist = new LinkList();
$llist->insertFirst('test');
$llist->insertFirst('test 2');
$llist->insertFirst('test 3');
var_dump($llist->readList());

$llist->reverseList();
echo '<br>';
