<?php
// Define environment variables
$_ENV = parse_ini_file('../../.env');

// MySQL connection configuration
$config['db_host'] = $_ENV['MYSQL_HOST'];
$config['db_name'] = $_ENV['MYSQL_DATABASE'];
$config['db_user'] = $_ENV['MYSQL_USERNAME'];
$config['db_pass'] = $_ENV['MYSQL_PASSWORD'];

// Create a connection to MySQL
$connection = mysqli_connect(
    $config['db_host'],
    $config['db_user'],
    $config['db_pass'],
    $config['db_name']
);

// Check the connection
if (mysqli_connect_errno()) {
    die("MySQL connection failed: " . mysqli_connect_error());
}


?>