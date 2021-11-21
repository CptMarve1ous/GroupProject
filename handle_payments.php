<?php

ini_set('display_errors', 1);
error_reporting(E_ALL | E_STRICT);

$okay = TRUE;

//Check the name for errors
if (ctype_digit($_POST['firstname']) ) {  
    print'<p class ="error">>Only alphabets are allowed in the first name.</p>';
    $okay = FALSE;
}

if (empty($_POST['firstname'])) {
    print '<p class ="error">Please enter your name.</p>';
    $okay = FALSE;
}

//Check the email
$pattern = "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^";
if (empty($_POST['email'])) {
    print '<p class ="error">Please enter your email.</p>';
    $okay = FALSE;
}

if (!preg_match($pattern, $_POST['email'])) {
    print'<p class ="error">Email is not valid.</p>';
    $okay = FALSE;
    }

//Make sure the inputs are not empty
if (empty($_POST['address'])) {
    print '<p class ="error">Please enter your address.</p>';
    $okay = FALSE;
} 

if (empty($_POST['city'])) {
    print '<p class ="error">Please enter your city.</p>';
    $okay = FALSE;
}

if (empty($_POST['state'])) {
    print '<p class ="error">Please enter your state.</p>';
    $okay = FALSE;
}

//Check card number
if (empty($_POST['cardnumber'])) {
    print '<p class ="error">Please enter your card number.</p>';
    $okay = FALSE;
}

if(preg_match("/[a-z]/i", $_POST['cardnumber'])){
    print '<p class ="error">Only numbers are allowed in the card number!</p>';
    $okay = FALSE;
}

//Check Exp Date
if (empty($_POST['expmonth'])) {
    print '<p class ="error">Please enter Expire Month.</p>';
    $okay = FALSE;
}

if (is_numeric($_POST['expmonth'])) {
    print '<p class="error">No numbers allowed in Expire Month.</p>';
    $okay = FALSE;
}

//Exp Year
if(preg_match("/[a-z]/i", $_POST['expyear'])){
    print '<p class ="error">Only numbers are allowed in the EXP Year!</p>';
    $okay = FALSE;
}

if (empty($_POST['expyear'])) {
    print '<p class ="error">Please enter Expire Year.</p>';
    $okay = FALSE;
}

//CVV
if (empty($_POST['cvv'])) {
    print '<p class ="error">Please enter CVV.</p>';
    $okay = FALSE;
}

if(preg_match("/[a-z]/i", $_POST['cvv'])){
    print '<p class ="error">Only numbers are allowed in the CVV!</p>';
    $okay = FALSE;
}

//If there are no errors
if ($okay) {
    print '<p>Thank you for paying.</p>';
}
?>