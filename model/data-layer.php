<?php

class DataLayer
{
    // Get indoor interests
    /**function holds an array of strings that represent the valid pre-defined
     *  indoor interests
     * @return string[] returns an array of pre-defined strings
     */
    static function indoorInterests()
    {
        return array("tv", "puzzles", "movies", "reading", "cookies", "playing cards", "board games", "video games");
    }

    // Get outdoor interests

    /** function holds an array of strings that represent the valid pre-defined
     *  outdoor interests
     * @return string[] returns an array of pre-defined strings
     */
    static function outdoorInterests()
    {
        return array("hiking", "walking", "biking", "climbing", "swimming", "collecting");
    }
}