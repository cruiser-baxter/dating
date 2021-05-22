<?php

class DataLayer
{
    // Get the meals for the order form
    static function indoorInterests()
    {
        return array("breakfast", "brunch", "lunch", "dinner");
    }

    // Get the condiments for the order 2 form
    static function outdoorInterests()
    {
        return array("ketchup", "mustard", "mayo", "sriracha");
    }
}