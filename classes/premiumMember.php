<?php

class PremiumMember extends Member
{
    private $_inDoorInterests;
    private $_outDoorInterests;

    public function setIndoorInterest(array $indoor): void
    {
        $this->_inDoorInterests = $indoor;
    }
    public function setOutdoorInterest(array $outdoor): void
    {
        $this->_outDoorInterests = $outdoor;
    }

    public function getIndoorInterests(): string
    {
        return implode(", ", $this->_inDoorInterests);
    }

    public function getOutdoorInterests(): string
    {
        return implode(", ", $this->_outDoorInterests);
    }
}
