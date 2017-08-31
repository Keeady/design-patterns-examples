<?php

interface  Recipe {}

class StuffedChicken implements Recipe {}

class ChickenBits implements Recipe {}

abstract class FamilyMealFactory {
    /**
     * @return Recipe
     */
    abstract function make() : Recipe;
}

class KidsMealFactory extends FamilyMealFactory {
    /**
     * @return Recipe
     */
    public function make() : Recipe
    {
        return new ChickenBits();
    }
}

class AdultMealFactory extends FamilyMealFactory {
    /**
     * @return Recipe
     */
    public function make() : Recipe
    {
        return new StuffedChicken();
    }
}

class Dinner {

    public function main()
    {
        $kidsMeal = new KidsMealFactory();
        $kidsMeal->make();
        $momMeal = new AdultMealFactory();
        $momMeal->make();
    }
}
