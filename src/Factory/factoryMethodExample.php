<?php

namespace FactoryMethod;

interface  Meal {
    public function getName();
}

class StuffedChicken implements Meal {
    public function getName() {
        return 'Stuffed Chicken';
    }
}

class ChickenBits implements Meal {
    public function getName() {
        return 'Chicken Bits';
    }
}

class Fries implements Meal {
    public function getName() {
        return 'Fries';
    }
}

abstract class MealFactory {

    abstract function make($age);
}

class FamilyMealFactory extends MealFactory {

    public function make($age)
    {
        switch ($age) {
            case $age <= 5:
                $meal = new ChickenBits();
                return $meal->getName();
                break;
            default:
                $meal = new StuffedChicken();
                $fried = new Fries();
                return $meal->getName() . ' and ' . $fried->getName();

                break;
        }
    }
}

class Dinner {
    private $mealFactory;

    public function __construct()
    {
        $this->mealFactory = new FamilyMealFactory();
    }

    public function main()
    {
        echo $this->mealFactory->make(12) . "\n";
        echo $this->mealFactory->make(5) . "\n";
    }
}

$d = new Dinner();
$d->main();
