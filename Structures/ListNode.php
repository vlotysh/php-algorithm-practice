<?php

namespace Structures;

class ListNode
{
    /* Data to hold */
    public $data;

    /* Link to next node */
    public $next;

    function __construct($data)
    {
        $this->data = $data;
        $this->next = NULL;
    }

    function readNode()
    {
        return $this->data;
    }
}