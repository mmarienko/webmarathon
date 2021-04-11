<?php
class Router
{
    public $params = array();

    public function setParams()
    {
        if ($_GET) {
            foreach ($_GET as $key => $value) {
                $this->params[$key] = $value;
            }
        }
    }

    public function printParams()
    {
        $str = "{";
        if ($this->params) {
            foreach ($this->params as $key => $value) {
                $str .= "'$key': '$value', ";
            }
        }
        $str = substr($str, 0, -2);
        $str .= "}";
        echo $str;
    }

}
