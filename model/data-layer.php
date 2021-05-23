<?php

class DataLayer
{
    // Get the meals for the order form
    static function indoorInterests()
    {
        return array("tv", "puzzles", "movies", "reading", "cookies", "playing cards", "board games", "video games");
    }

    // Get the condiments for the order 2 form
    static function outdoorInterests()
    {
        return array("hiking", "walking", "biking", "climbing", "swimming", "collecting");
    }
}