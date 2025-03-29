<?php
if(isset($_POST["submit"])) {
    $amt = $_POST['deposit'];
    $accname=$_POST['accname'];
    //$routing = mt_rand(100000000,999999999);
    $type = "Savings";

    require_once 'dbms.inc.php';
    require_once 'functions.inc.php';

    if (!is_int((int)$amt)) {
        header("location: ../createAccount.php?error=depositNotInt");
        exit();
    }
    if ($amt > 10000) {
        header("location: ../createAccount.php?error=depositTooHigh");
        exit();
    }
    createAccount($connection, $amt, $accname, $type);
} else {
    header("location: ../createAccount.php?submitNotSet");
    exit();
}
