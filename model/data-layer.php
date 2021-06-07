<?php

class DataLayer
{
    // Get indoor interests
    static function indoorInterests()
    {
        return array("tv", "puzzles", "movies", "reading", "cookies", "playing cards", "board games", "video games");
    }

    // Get outdoor interests
    static function outdoorInterests()
    {
        return array("hiking", "walking", "biking", "climbing", "swimming", "collecting");
    }
}