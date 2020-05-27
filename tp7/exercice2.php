<?php
    abstract class shape{
        abstract function getarea();
    }
    class Square extends shape{
        private $width;
        private $height;
        function __construct($width,$height)
        {
            $this->width = $width;
            $this->height = $height;
        }

        function getarea()
        {
            $area = $this->width * $this->height;
            echo "$area";
        }
    }
    class Circle extends shape{
        private $radius;
        function __construct($radius)
        {
            $this->radius = $radius;
        }

        function getarea()
        {
            echo "$this->radius";
        }
    }

    $square = new Square(5,5);
    $circle = new Circle(153.6);
    $tab = array($circle,$square);
    foreach ($tab as $value) {
        echo get_class($value)." area : ";
        echo $value->getarea()."<br>";
    }