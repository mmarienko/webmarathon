<?php

class File
{
    public $dir = "tmp";
    public $path;
    public $descriptor;

    public function __construct($path)
    {
        if (!file_exists($this->dir)) {
            mkdir($this->dir);
        }
        $this->path = $path;
        $this->descriptor = fopen($this->path, "c");
    }

    public function __destruct()
    {
        fclose($this->descriptor);
    }

    public function write($str)
    {
        if (file_exists($this->path)) {
            file_put_contents($this->path, $str, FILE_APPEND);
        }
    }

    public function toList()
    {
        return str_replace("\n", "<br>", file_get_contents($this->path));
    }
}
