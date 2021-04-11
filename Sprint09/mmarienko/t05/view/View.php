<?php
class View
{
    public function __construct($content)
    {
        $this->content = file_get_contents($content);
    }

    public function render()
    {
        echo $this->content;
    }
}
