<?php
/* validation.php
 * Validate data for the dating app
 *
 */
class Validation
{
    /** function takes in a string and validates that the string only
     * contains letters and no numbers or special characters
     * @param $name string to be be validated
     * @return bool true if $name is only letters otherwise false
     */
    static function validName($name): bool
    {
        return ctype_alpha($name);

    }

    /** function takes in a string and validates that the string is
     * numeric and is an integer from 18 to 118
     * @param $age int to be validated
     * @return bool true if $age is an int from 18 to 118 otherwise false
     */
    static function validAge($age): bool
    {
        return is_numeric ($age) && $age > 17 && $age <119;

    }

    /** function takes in a string and validates that it is
     * a numeric value, no letters of other special characters
     * @param $phone string of numbers to be validated
     * @return bool true if $phone is numeric, only numbers
     * otherwise false
     */
    static function validPhone($phone) : bool
    {
        return is_numeric($phone);

    }

    /** function takes in a string and validates that it represents
     * a valid email address format
     * @param $email string to be validated as email address
     * @return bool true if $email is a valid email address format
     * otherwise false
     */
    static function validEmail($email): bool
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        }

        return false;


    }

    /** function takes in an array of strings and compares each element
     * against a pre-defined array to ensure all elements in the
     * passed array match an element in the ore-defined array
     * @param $interests array of strings
     * @return bool true if $interests only contains values present
     * in the validation string array, otherwise false
     */
    static function validOutdoor($interests): bool
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

    /** function takes in an array of strings and compares each element
     * against a pre-defined array to ensure all elements in the
     * passed array match an element in the ore-defined array
     * @param $interests array of strings
     * @return bool true if $interests only contains values present
     * in the validation string array, otherwise false
     */
    static function validIndoor($interests): bool
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
}