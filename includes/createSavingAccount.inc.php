<?php
if(isset($_POST["submit"])) {
    $amt = $_POST['deposit'];
    $accname=$_POST['accname'];
    //$routing = mt_rand(100000000,999999999);
    $type = "Saving";

    require_once 'dbms.inc.php';
    require_once 'functions.inc.php';

    if ($amt < 100) {
        header("location: ../createAccount.php?error=depositTooLow");
        exit();
    }
    createAccount($connection, $amt, $accname, $type);
} else {
    header("location: ../createAccount.php?submitNotSet");
    exit();
}