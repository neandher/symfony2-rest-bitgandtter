<?php

namespace Greetings;

class Hello
{
    /**
     * @var string
     */
    private $greet;

    /**
     * Hello constructor.
     */
    public function __construct()
    {
        $this->greet = "Hello World!!!";
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->greet;
    }
}