<?php

interface  Recipe {}

class StuffedChicken implements Recipe {}

class ChickenBits implements Recipe {}

abstract class MealFactory {
    /**
     * @param int $age
     * @return Recipe
     */
    abstract function make($age) : Recipe;
}

class FamilyMealFactory extends MealFactory {

    /**
     * @param int $age
     * @return ChickenBits|StuffedChicken
     */
    public function make($age)
    {
        switch ($age) {
            case $age < 5:
                return new ChickenBits();
                break;
            default:
                return new StuffedChicken();
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
        $this->mealFactory->make(12);
        $this->mealFactory->make(5);
    }
}
