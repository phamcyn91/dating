<?php
/**
 * Created by PhpStorm.
 * User: phamcyn
 * Date: 2/15/2018
 * Time: 1:39 PM
 */

class PremiumMember
{
    private $_inDoorInterests;
    private $_outDoorInterests;

    function setInDoorInterests($inDoorInterests)
    {
        $this->_inDoorInterests = $inDoorInterests;
    }

    function setOutDoorInterests($outDoorInterests)
    {
        $this->_outDoorInterests = $outDoorInterests;
    }

    function getInDoorInterests($inDoorInterests)
    {
        $this->_inDoorInterests = $inDoorInterests;
    }

}