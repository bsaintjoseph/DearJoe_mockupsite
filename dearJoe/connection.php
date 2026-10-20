<?php
$server = "CYSM\SQLEXPRESS";
$username = ""; // SQL Server username
$password = ""; // SQL Server password
$database = "CoffeeShop";

// Connection options array
$connectionOptions = array(
    "Database" => $database,
    "UID" => $username,
    "PWD" => $password
);

// Establishing the connection
$conn = sqlsrv_connect($server, $connectionOptions);
if (!$conn) {
    die("Connection failed: " . print_r(sqlsrv_errors(), true));
}
?>