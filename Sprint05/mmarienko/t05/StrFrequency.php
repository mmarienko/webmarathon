<?php

class StrFrequency
{
    public $string;

    public function __construct($string)
    {
        $this->string = $string;
    }

    public function letterFrequencies() {
        $array = [];

        for ($i = 65; $i < 90; $i++) {
            $count = substr_count(strtoupper($this->string), chr($i));

            if ($count > 0) {
                $array[chr($i)] = $count;
            }
        }
        return $array;
    }

    public function wordFrequencies() {
        $array = [];
        $keys = array_unique(preg_split('/[^A-Za-z]/', strtoupper($this->string)));
        $keys = array_filter($keys, function($element) {
            return !empty($element);
        });

        foreach ($keys as $value) {
            $count = substr_count(strtoupper($this->string), $value);

            if ($count > 0) {
                $array[$value] = $count;
            }
        }
        return $array;
    }

    public function reverseString() {
        return strrev($this->string);
    }
}
