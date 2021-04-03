<?php

class Note {

private $date;
private $name;
private $importance;
private $text;

public function __construct($name, $importance, $text)
{
    $this->date = date('Y-m-d h:i:s');
    $this->name = $name;
    $this->importance = $importance;
    $this->text = $text;
}

public function setText($text)
{
    $this->text = $text;
}

public function getDate()
{
    return $this->date;
}

public function getName()
{
    return $this->name;
}

public function getImportance()
{
    return $this->importance;
}

public function getText()
{
    return $this->text;
}

public function __serialize(): array
{
    return [
        "date" => $this->date,
        "name" => $this->name,
        "importance" => $this->importance,
        "text" => $this->text,
    ];
}

public function __unserialize(array $data): void
{
    $this->date = $data["date"];
    $this->name = $data["name"];
    $this->importance = $data["importance"];
    $this->text = $data["text"];
}


public function __toString()
{
    $str = '<ul>';

    $str .= '<li>date: <b>' . $this->date . '</b></li>';
    $str .= '<li>name: <b>' . $this->name . '</b></li>';
    $str .= '<li>importance: <b>' . $this->importance . '</b></li>';
    $str .= '<li>text: <b>' . $this->text . '</b></li><br>';

    $str .= '</ul>';

    return $str;
}
}