<?php
/**
 * Created by PhpStorm.
 * User: phamcyn <Cynthia Pham>
 * Date: 2/15/2018
 * Time: 1:39 PM
 */

/** Class PremiumMember
 *
 * The PremiumMember represents a premium member of a dating site.
 * It extends the Member class.
 *
 * The PremiumMember class represents a PremiumMember with indoor and
 * outdoor interests.  It extends the Member class
 * @author Cynthia Phanm <cpham15@mail.greenriver.edu>
 * @copyright 2018
*/
class PremiumMember extends Member
{
    private $_inDoorInterests;
    private $_outDoorInterests;

    /**
     * Sets the inDoorInterests array
     *
     * @param $inDoorInterests Indoor Interests Array
     */
    function setInDoorInterests($inDoorInterests)
    {
        $this->_inDoorInterests = $inDoorInterests;
    }

    /**
     * Gets and returns the inDoorInterests Array
     *
     * @return $_inDoorInterests Indoor Interests Array
     */
    function getInDoorInterests()
    {
        return $this->_inDoorInterests;
    }

    /**
     * Sets outDoorInterestsArray
     *
     * @param $outDoorInterests Outdoor Interests Array
     */
    function setOutDoorInterests($outDoorInterests)
    {
        $this->_outDoorInterests = $outDoorInterests;
    }

    /**
     * Gets and returns the outDoorInterests Array
     *
     * @return $_outDoorInterests Outdoor Interests Array
     */
    function getOutDoorInterests()
    {
        return $this->_outDoorInterests;
    }

}