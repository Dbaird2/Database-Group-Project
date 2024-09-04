<?php
function emptyInputSignup($first_name, $last_name, $email, $uid, $dob, $address, $pwd, $pwdr) {
    $result = NULL;
    if(empty($first_name) || empty($last_name) || empty($dob) || empty($address) || empty($email) || empty($uid) || empty($pwd) || empty($pwdr)){
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}
function invalidUID($uid) {
    $result = NULL;
    if(!preg_match("/^[a-zA-Z0-9]*?/", $uid)){
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}
function invalidEmail($email) {
    $result = filter_var($email, FILTER_VALIDATE_EMAIL);
    return $result === false;
}
function pwdMatch($pwd, $pwdr) {
    $result = NULL;
    if($pwd !== $pwdr){
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}
function UIDExists($connection, $uid, $email) {
    $maria = "SELECT * FROM account_details WHERE UID = ? or email = ?;";
    $statement = mysqli_stmt_init($connection);
    if (!mysqli_stmt_prepare($statement, $maria)) {
        header("location: ../signup.php?statementFailed");
        exit();
    }

    mysqli_stmt_bind_param($statement, "ss", $uid, $email);
    mysqli_stmt_execute($statement);

    $resultData = mysqli_stmt_get_result($statement);
    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($statement);

}
function createUser($connection, $first_name, $last_name, $email, $uid, $dob, $address, $phone, $pwd) {
    $maria = "INSERT INTO account_details (first_name, last_name, email, uid, dob, address, phone, pwd) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $statement = mysqli_stmt_init($connection);
    if (!mysqli_stmt_prepare($statement, $maria)) {
        header("location: ../signup.php?statementFailed");
        exit();
    }

    $hashedPwd= password_hash($pwd, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($statement, "ssssssss", $first_name, $last_name, $email, $uid, $dob, $address, $phone, $hashedPwd);
    mysqli_stmt_execute($statement);
    mysqli_stmt_close($statement);

    header("location: ../index.php?error=none");
    exit();

}

function emptyInputLogin($uid, $pwd) {
    $result = NULL;
    if(empty($uid) || empty($pwd)){
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function loginUser($connection, $uid, $pwd) {
    $uidExists = UIDExists($connection, $uid, $uid);

    if ($uidExists == false) {
        header("location: ../login.php?error=wrongUsername");
        exit();
    }
    $pwdHashed = $uidExists['pwd'];

    $checkPwd = password_verify($pwd, $pwdHashed);

    if ($checkPwd == false){
        header("location: ../login.php?error=wrongPassword");
        exit();
    } else if ($checkPwd == true) {
        session_start();
        $_SESSION['uid'] = 2;
        header("location: ../index.php?error=none");
        exit();
    }
}