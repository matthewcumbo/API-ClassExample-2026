<?php 
// This file is the database connection configuration setup

$db_user = 'root';
$db_password = 'root';
$db_name = 'apiExample2026';

// PDO = PHP Data Objects 
// Used for Object Oriented Programming
// Creating an 'object' makes our code more organised
$db = new PDO(
    'mysql:host=localhost;dbname='.$db_name.';charset=utf8',
    $db_user,
    $db_password
);

// set some db attributes
$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$db->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



?>