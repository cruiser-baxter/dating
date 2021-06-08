<?php

class PremiumMember extends Member
{
    private $_inDoorInterests;
    private $_outDoorInterests;

    /** function takes in an array of strings and assigns the input
     * array to $_inDoorInterests
     * @param array $indoor array of strings
     */
    public function setIndoorInterest(array $indoor): void
    {
        $this->_inDoorInterests = $indoor;
    }

    /**function takes in an array of strings and assigns the input
     * array to $_outDoorInterests
     * @param array $outdoor array of strings
     */
    public function setOutdoorInterest(array $outdoor): void
    {
        $this->_outDoorInterests = $outdoor;
    }

    /** functions returns the contents of the array of strings _inDoorInterests
     * as a single string with each element of the array in the string
     * and separated be a comma
     * @return string returns the contents of a string array as a single string
     * separated by commas
     */
    public function getIndoorInterests(): string
    {
        return implode(", ", $this->_inDoorInterests);
    }

    /** functions returns the contents of the array of strings _outDoorInterests
     * as a single string with each element of the array in the string
     * and separated be a comma
     * @return string returns the contents of a string array as a single string
     * separated by commas
     */
    public function getOutdoorInterests(): string
    {
        return implode(", ", $this->_outDoorInterests);
    }
}
