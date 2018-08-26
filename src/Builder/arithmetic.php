<?php

class Builder
{
    public $total = 0;
    public $op = 1;

    public function __construct($number)
    {
        $this->total = $number;
    }

    public function add()
    {
        $this->op = 1;
        return $this;
    }

    public function minus()
    {
        $this->op = -1;
        return $this;
    }

    public function five()
    {
        $this->total = $this->total + ($this->op * 5);
        return $this;
    }

    public function three()
    {
        $this->total = $this->total + ($this->op * 3);
        return $this;
    }

    public function four()
    {
        $this->total = $this->total + ($this->op * 4);
        return $this;
    }

    public function val()
    {
        return $this->total;
    }
}

$five = new Builder(5);

echo $five
    ->add()
    ->three()
    ->minus()
    ->four()
    ->val();