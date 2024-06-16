<?php

session_start();

$DATABASE_HOST = '';//Enter Host Name

$DATABASE_USER = '';//Enter User Name

$DATABASE_PASS = '';//Enter Password

$DATABASE_NAME = '';//Enter Database Name

$conn = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

if ( mysqli_connect_errno() ) {	

	exit('Failed to connect to MySQL: ' . mysqli_connect_error());

}

?>