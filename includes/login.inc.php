<?php
include_once ("header.php");
if(isset($_POST["submit"])) {
    $uid = $_POST["uid"];
    $pwd = $_POST["pwd"];

    require_once 'dbms.inc.php';
    require_once 'functions.inc.php';

    if (emptyInputLogin($uid, $pwd) !== false) {
        header("location: ../login.php?error=emptyInput");
        exit();
    }

    loginUser($connection, $uid, $pwd);
} else {
    header("location: ../login.php");
    exit();
}