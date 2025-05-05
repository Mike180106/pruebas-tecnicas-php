<?php

/*
Hallar y mostrar el área de un triángulo, un rectángulo y un cuadrado.
*/

interface AreaCalculatorInterface
{
    public function calculateArea(): float;
    public function mostrarArea();
}

class Triangle implements AreaCalculatorInterface
{
    private float $base;
    private float $altura;
    private float $area;

    public function __construct(float $base, float $altura)
    {
        $this->base = $base;
        $this->altura = $altura;
        $this->area = $this->calculateArea();
    }

    public function calculateArea(): float
    {
        $area = ($this->base * $this->altura) / 2;
        return $area;
    }

    public function mostrarArea()
    {
        echo "El área del triángulo es: " . $this->area . "<br>";
    }
}

class Rectangle implements AreaCalculatorInterface
{
    private float $base;
    private float $altura;
    private float $area;

    public function __construct(float $base, float $altura)
    {
        $this->base = $base;
        $this->altura = $altura;
        $this->area = $this->calculateArea();
    }

    public function calculateArea(): float
    {
        $area = $this->base * $this->altura;
        return $area;
    }

    public function mostrarArea()
    {
        echo "El área del rectangulo es: " . $this->area . "<br>";
    }
}

class Cuadrado implements AreaCalculatorInterface
{
    private float $side;
    private float $area;

    public function __construct(float $side)
    {
        $this->side = $side;

        $this->area = $this->calculateArea();
    }

    public function calculateArea(): float
    {
        $area = $this->side * $this->side;
        return $area;
    }

    public function mostrarArea()
    {
        echo "El área del cuadrado es  es: " . $this->area . "<br>";
    }
}


$triangle = new Triangle(5, 10);
$triangle->mostrarArea();

$rectangle = new Rectangle(3, 10);
$rectangle->mostrarArea();

$square = new Cuadrado(4);
$square->mostrarArea();
