<?php

namespace Structures;

class LinkList
{
    /* Link to the first node in the list */
    private $firstNode;

    /* Link to the last node in the list */
    private $lastNode;

    /* Total nodes in the list */
    private $count;

    function __construct()
    {
        $this->firstNode = NULL;
        $this->lastNode = NULL;
        $this->count = 0;
    }

    public function isEmpty()
    {
        return is_null($this->firstNode);
    }

    public function insertFirst($data)
    {
        $link = new ListNode($data);
        $link->next = $this->firstNode;
        $this->firstNode = &$link;

        /* If this is the first node inserted in the list
           then set the lastNode pointer to it.
        */
        if (is_null($this->lastNode)) {
            $this->lastNode = &$link;
        }

        $this->count++;
    }

    public function insertLast($data)
    {
        if (!is_null($this->firstNode)) {
            $link = new ListNode($data);
            $this->lastNode->next = $link;
            $link->next = NULL;
            $this->lastNode = &$link;
            $this->count++;

        } else {
            $this->insertFirst($data);
        }
    }

    public function deleteFirstNode()
    {
        if (!is_null($this->firstNode)) {
            $temp = $this->firstNode;
            $this->firstNode = $temp->next;
            if(!is_null($this->firstNode)) {
                $this->count--;
            }
        }
    }

    public function deleteLastNode()
    {
        if (!is_null($this->firstNode)) {
            if (is_null($this->firstNode->next)) {
                $this->firstNode = null;
                $this->count--;
            } else {
                $previousNode = $this->firstNode;
                $currentNode = $this->firstNode->next;

                while(!is_null($currentNode->next))
                {
                    $previousNode = $currentNode;
                    $currentNode = $currentNode->next;
                }

                $previousNode->next = null;
                $this->count--;
            }
        }
    }

    public function deleteNode($key)
    {
        $current = $this->firstNode;
        $previous = $this->firstNode;

        while($current->data != $key)
        {
            if (is_null($current->next)) {
                return null;
            } else {
                $previous = $current;
                $current = $current->next;
            }
        }

        if ($current == $this->firstNode)
        {
            if ($this->count == 1)
            {
                $this->lastNode = $this->firstNode;
            }
            $this->firstNode = $this->firstNode->next;
        }
        else
        {
            if ($this->lastNode == $current)
            {
                $this->lastNode = $previous;
            }
            $previous->next = $current->next;
        }
        $this->count--;
    }

    public function find($key)
    {
        $current = $this->firstNode;
        while($current->data != $key)
        {
            if (is_null($current->next)) {
                return null;
            } else {
                $current = $current->next;
            }
        }
        return $current;
    }

    public function readNode($nodePos)
    {
        if($nodePos <= $this->count)
        {
            $current = $this->firstNode;
            $pos = 1;
            while($pos != $nodePos)
            {
                if (is_null($current->next)) {
                    return null;
                } else {
                    $current = $current->next;
                }

                $pos++;
            }
            return $current->data;
        }
        else
            return NULL;
    }

    public function totalNodes()
    {
        return $this->count;
    }

    public function readList()
    {
        $listData = [];
        $current = $this->firstNode;

        while (!is_null($current))
        {
            array_push($listData, $current->readNode());
            $current = $current->next;
        }

        return $listData;
    }

    public function reverseList()
    {
        if (!is_null($this->firstNode) && !is_null($this->firstNode->next))
        {
            $current = $this->firstNode;
            $new = NULL;

            while (!is_null($current))
            {
                $temp = $current->next;
                $current->next = $new;
                $new = $current;
                $current = $temp;
            }
            $this->firstNode = $new;
        }
    }

}