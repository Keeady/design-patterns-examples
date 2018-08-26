<?php
namespace FactoryClass;

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

abstract class FamilyMealFactory {

    abstract function make();
}

class KidsMealFactory extends FamilyMealFactory {

    public function make()
    {
        $meal = new ChickenBits();
        return $meal->getName();
    }
}

class AdultMealFactory extends FamilyMealFactory {

    public function make()
    {
        $meal = new StuffedChicken();
        $fried = new Fries();
        return $meal->getName() . ' and ' . $fried->getName();
    }
}

class Dinner {

    public function main()
    {
        $kidsMeal = new KidsMealFactory();
        echo $kidsMeal->make() . "\n";
        $momMeal = new AdultMealFactory();
        echo $momMeal->make() . "\n";
    }
}

$d = new Dinner();
$d->main();