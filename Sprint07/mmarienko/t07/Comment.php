<?php

class Comment
{
    protected $date;
    protected $comment;

    public function __construct($comment)
    {
        $this->date = date('Y-m-d');
        $this->comment = $comment;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function getText()
    {
        return $this->comment;
    }
}