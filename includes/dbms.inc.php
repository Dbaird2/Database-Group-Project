<?php
try {
    $options= array();
    $connection = new PDO("mysql:host=localhost;dbname=bams", "bams", "Kehx14wlix", $options);

    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


} catch (PDOException $error) {
    header("location: ../index.php?error=DBConnectionFailed");
    exit();
    die('Connection failed: ' . $error->getMessage());
}
?>
