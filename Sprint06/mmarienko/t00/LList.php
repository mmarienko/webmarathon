<?php

/*
   Task 00 (LList.php)
   Task name: LinkedList
*/

class LList implements IteratorAggregate
{
    public $head;

    public function __constructor()
    {
        $this->head = null;
    }

    public function getFirst()
    {
        return $this->head;
    }

    public function getLast()
    {
        $temp = new LLItem();
        $temp = $this->head;
        if ($temp != null) {
            while ($temp != null) {
                if ($temp->next == null) {
                    break;
                } else {
                    $temp = $temp->next;
                }
            }
            return $temp->data;
        }
        return null;
    }

    public function add($value)
    {
        $new = new LLItem();
        $new->data = $value;
        $new->next = null;

        if ($this->head == null) {
            $this->head = $new;
        } else {
            $temp = new LLItem();
            $temp = $this->head;
            while ($temp->next != null) {
                $temp = $temp->next;
            }
            $temp->next = $new;
        }
    }

    public function addArr($array)
    {
        foreach ($array as $elem) {
            $this->add($elem);
        }
    }

    public function remove($value)
    {
        $temp = new LLItem();
        $temp = $this->head;
        $before = null;
        $after = null;
        $iter = 0;
        if ($temp != null) {
            if ($this->head->data == $value) {
                $this->head = $temp->next;
                unset($this->i[0]);
                return;
            } else {
                $iter++;
                $temp = $temp->next;
                while ($temp != null) {
                    if ($temp->data == $value && $before != null) {

                            $before->next = $after;
                            unset($this->i[$iter]);
                            return;

                    }
                    $iter++;
                    $before = $temp;
                    $temp = $temp->next;
                    if ($temp != null)
                        $after = $temp->next;
                }
            }
        }
    }

    public function removeAll($value)
    {
        $temp = new LLItem();
        $temp = $this->head;
        $before = null;
        $after = null;
        if ($temp != null) {
            if ($this->head->data == $value) {
                $this->head = $temp->next;
            }
            $temp = $temp->next;
            while ($temp != null) {
                if ($temp->data == $value && $before != null) {
                    $before->next = $after;
                }
                $before = $temp;
                $temp = $temp->next;
                if ($temp != null)
                    $after = $temp->next;
            }
        }
    }

    public function contains($value)
    {
        $temp = new LLItem();
        $temp = $this->head;
        if ($temp != null) {
            while ($temp != null) {
                if ($temp->data == $value) {
                    return true;
                }
                $temp = $temp->next;
            }
            return false;
        }
        return false;
    }

    public function clear()
    {
        $this->head = null;
    }

    public function count()
    {
        $counter = 0;
        $temp = new LLItem();
        $temp = $this->head;
        if ($temp != null) {
            while ($temp != null) {
                $counter++;
                $temp = $temp->next;
            }
            return $counter;
        }
        return 0;
    }

    public function toString()
    {
        $temp = new LLItem();
        $temp = $this->head;
        if ($temp != null) {
            $res = "";
            while ($temp != null) {
                if ($temp->next == null)
                    $res .= $temp->data;
                else
                    $res .= $temp->data . ", ";
                $temp = $temp->next;
            }
            return $res;
        }
        return "";
    }

    public function getIterator()
    {
        $arr = [];
        $temp = new LLItem();
        $temp = $this->head;
        while ($temp != null) {
            $arr[] = $temp->data;
            $temp = $temp->next;
        }

        return new class($arr) implements Iterator
        {
            protected $_position = 0;
            protected $_container = [];

            public function __construct($container)
            {
                $this->_position = 0;
                $this->_container = $container;
            }

            public function current()
            {
                return $this->_container[$this->_position];
            }

            public function key()
            {
                return $this->_position;
            }

            public function next()
            {
                ++$this->_position;
            }

            public function rewind()
            {
                $this->_position = 0;
            }

            public function valid()
            {
                return isset($this->_container[$this->_position]);
            }
        };
    }
};
