<?php

$host = "localhost";
$username = "root";
$password = "";
$db = "mybook_db";

$connection = mysqli_connect($host, $username, $password, $db);

$first_name = "a";
$last_name = "b";
// Column names then variable names.
$query = "insert into users (userid, first_name, last_name, gender, email, password, url_address) values (1, '$first_name', '$last_name', 'a', 'a', 'a', 'a')";

// Sends query to database
mysqli_query($connection, $query);

?>