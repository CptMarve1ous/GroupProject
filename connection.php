<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "myblog";

if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{

	die("failed to connect!");
}


