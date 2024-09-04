<?php

if(isset($_POST['submit'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $uid = $_POST['uid'];
    $dob = $_POST['dob'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $pwd = $_POST['pwd'];
    $pwdr = $_POST['pwdr'];

    require_once 'dbms.inc.php';
    require_once 'functions.inc.php';

    if (emptyInputSignup($first_name, $last_name, $email, $uid, $dob, $address, $pwd, $pwdr) !== false){
        header("location: ../signup.php?error=emptyinput");
        exit();
    }
    if (invalidUID($uid) !== false){
        header("location: ../signup.php?error=invalidUsername");
        exit();
    }
    if (invalidEmail($email) !== false) {
        header("location: ../signup.php?error=invalidEmail");
        exit();
    }
    if (pwdMatch($pwd, $pwdr) !== false){
        header("location: ../signup.php?error=passwordsDoNotMatch");
        exit();
    }
    if (UIDExists($connection, $uid , $email)) {
        header("location: ../signup.php?error=usernameAlreadyExists");
        exit();
    }
    createUser($connection, $first_name, $last_name, $email, $uid, $dob, $address, $phone, $pwd);

} else {
    header("location: ../signup.php");
}

?>
