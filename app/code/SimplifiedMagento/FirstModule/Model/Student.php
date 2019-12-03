<?php
namespace SimplifiedMagento\FirstModule\Model;


class Student
{
    private $name;
    private $age;

    public function __construct($name = "Alex", $age = "23") {
        $this->name = $name;
        $this->age = $age;
    }
}
?>