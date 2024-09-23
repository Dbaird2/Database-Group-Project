<?php
if(isset($_POST["submit"])) {
    $amt = $_POST["deposit_amt"];
    $acc = $_POST["name_of_account"];

    require_once 'dbms.inc.php';
    require_once 'functions.inc.php';

    if ($amt < 1) {
        header("location: ../deposit.php?error=AmountTooLow");
        exit();
    }
    depositMoney($connection, $amt, $acc);

}