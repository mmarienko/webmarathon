<?php

class AvengerQuote
{
    protected $id;
    protected $author;
    protected $quote;
    protected $photo;
    protected $publishDate;
    protected $comments = [];

    public function __construct($id, $author, $quote, $photo)
    {
        $this->id = $id;
        $this->author = $author;
        $this->quote = $quote;
        $this->photo = $photo;
        $this->publishDate = date('Y-m-d');
    }

    public function addComment($text)
    {
        array_push($this->comments, new Comment($text));
    }

    public function setComments($comments)
    {
        $this->comments = $comments;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getQuote()
    {
        return $this->quote;
    }

    public function getAuthor()
    {
        return $this->author;
    }

    public function getPhotos()
    {
        return $this->photo;
    }

    public function getPublishDate()
    {
        return $this->publishDate;
    }

    public function getComments()
    {
        return $this->comments;
    }

}