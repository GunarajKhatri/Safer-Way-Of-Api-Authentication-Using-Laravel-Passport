<?php

namespace App\Support;

class HashManager
{
    protected $algo;

    public function __construct($algo)
    {
        $this->algo = $algo;
    }

    public function make($value)
    {

        $hashed_value = password_hash($value, $this->algo);
        return $hashed_value;
    }

    public function check($value, $hashed_value)
    {
        return password_verify($value, $hashed_value) ? true : false;
    }
}
