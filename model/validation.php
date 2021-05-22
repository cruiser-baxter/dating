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

    static function validOutdoor(): bool
    {

    }

    static function validIndoor(): bool
    {

    }
}