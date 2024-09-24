<?php
if(isset($_POST["submit"])) {
    $amt = $_POST['deposit'];
    $accname=$_POST['accname'];
    $type = "Checking";

    require_once 'dbms.inc.php';
    require_once 'functions.inc.php';

    if ($amt > 1000) {
        header("location: ../createAccount.php?error=depositTooLow");
        exit();
    }

    createAccount($connection, $amt, $accname, $type);
} else {
    header("location: ../createAccount.php?error=something");
    exit();
}