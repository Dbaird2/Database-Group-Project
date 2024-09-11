<?php
if(isset($_POST["submit"])) {
    $amt = $_POST['deposit'];
    $routing = mt_rand(100000000,999999999);
    $type = "checking";

    require_once 'dbms.inc.php';
    require_once 'functions.inc.php';

    createAccount($connection, $amt, $routing, $type);
} else {
    header("location: ../createAccount.php?error=something");
    exit();
}