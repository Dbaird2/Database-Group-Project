<?php

$connection = new mysqli('localhost', 'root', '', 'testdb');


if (mysqli_connect_errno()) {
    echo "<p>Failed to connect to MariaDB: " . mysqli_connect_error() . "</p>";
    exit();
}

?>