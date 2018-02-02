<?php
/**
 * Cynthia Pham
 * Date: 1/26/2018
 * validate.php - validates the data posted from the forms in views folder
 */


// array holds error messages from profile form
$profileErrors = array();

// array holds error messages from interest form
$interestErrors = array();

// validation statements
if (!validName($firstName)) {
    $profileErrors['firstName'] = "First name cannot be empty and must be all alphabetic!";
}

if (!validName($lastName)) {
    $profileErrors['lastName'] = "Last name cannot be empty and must be all alphabetic!";
}

if (!validAge($age)) {
    $profileErrors['age'] = "Required: you must be 18 years or older!";
}

if (!validPhone($phone)) {
    $profileErrors['phone'] = "Required: must type in ten digits!";
}


if (!validIndoor($indoor)) {
    $interestErrors['indoor'] = "Please check the following indoor interests!";
}

if (!validOutdoor($outdoor)) {
    $interestErrors['outdoor'] = "Please check the following outdoor interests!";
}

$profileSuccess = (sizeof($profileErrors) == 0) ? true : false;
$interestSuccess = (sizeof($interestErrors) == 0) ? true : false;


/*
 * Checks to see that a string is all alphabetic and not null
 * @param String name
 * @return boolean
 */
function validName($name) {
    if($name != null && ctype_alpha($name)) {
        return true;
    }
    return false;
}

/*
 * Checks to see that an age is numeric and over 18
 * @param int name
 * @return boolean
 */
function validAge($age) {
    if(ctype_digit($age) && $age >= 18) {
        return true;
    }
    return false;
}

/*
 * Checks to see that a phone number is all numbers and 10 digits long
 * @param int phone
 * @return boolean
 */
function validPhone($phone) {
    if(ctype_digit($phone) && strlen((string)$phone) == 10) {
        return true;
    }
    return false;
}

/*
 * Checks each selected outdoor interest against a list of valid options
 * @param String interest
 * @return boolean
 */
function validOutdoor($interest) {
    global $f3;

    return (in_array($interest, $f3->get('outdoors')));
}

/*
 * Checks each selected indoor interest against a list of valid options
 * @param String interest
 * @return boolean
 */
function validIndoor($interest) {
    global $f3;

    return (in_array($interest, $f3->get('indoors')));
}
