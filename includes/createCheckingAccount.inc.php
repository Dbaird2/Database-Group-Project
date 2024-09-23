<?php
if(isset($_POST["submit"])) {
    $amt = $_POST['deposit'];
    $accname=$_POST['accname'];
    $type = "Checking";

    require_once 'dbms.inc.php';
    require_once 'functions.inc.php';

    createAccount($connection, $amt, $accname, $type);
} else {
    header("location: ../createAccount.php?error=something");
    exit();
}