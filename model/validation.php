<?php
/* validation.php
 * Validate data for the dating app
 *
 */
class Validation
{
    static function validName($name): bool
    {
        return ctype_alpha($name);

    }

    static function validAge($age): bool
    {
        return is_numeric ($age) && $age > 17 && $age <119;

    }

    static function validPhone() : bool
    {

    }

    static function validEmail(): bool
    {

    }

    static function validOutdoor($interests): bool
    {
        $validInterests = DataLayer::indoorInterests();

        //Make sure each selected interest is valid
        foreach ($interests as $userChoice) {
            if (!in_array($userChoice, $validInterests)) {
                return false;
            }
        }

        //All choices are valid
        return true;

    }

    static function validIndoor($interests): bool
    {
        $validInterests = DataLayer::outdoorInterests();

        //Make sure each selected interest is valid
        foreach ($interests as $userChoice) {
            if (!in_array($userChoice, $validInterests)) {
                return false;
            }
        }

        //All choices are valid
        return true;
    }
}