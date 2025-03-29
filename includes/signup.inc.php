<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

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

    $today_date = new DateTime();

    $today_date = date_format($today_date, 'Y-m-d');

    $difference = strtotime($today_date) - strtotime($dob);


    require_once 'dbms.inc.php';
    require_once 'functions.inc.php';

    if (strlen($dob) !== 10) {
        header("location: ../signup.php?error=DateofBirthFormatWrong");
        exit();
    }
    if (strlen($phone) !== 12) {
        header("location: ../signup.php?error=phoneNumberFormatWrong");
        exit();
    }
    if (emptyInputSignup($first_name, $last_name, $email, $uid, $dob, $address, $phone,  $pwd, $pwdr) !== false){
        header("location: ../signup.php?error=emptyinput");
        exit();
    }
    if ($difference <568080000) {
        header("location: ../signup.php?error=youAreTooFreshOutTheWomb");
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
    if (!createUser($connection, $first_name, $last_name, $email, $uid, $dob, $address, $phone, $pwd)){

    }

} else {
    header("location: ../signup.php");
}

?>

