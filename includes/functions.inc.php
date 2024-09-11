<?php
function emptyInputSignup($first_name, $last_name, $email, $uid, $dob, $address,$phone, $pwd, $pwdr) {
    $result = NULL;
    if(empty($first_name) || empty($last_name) || empty($dob) || empty($address) || empty($email) || empty($phone) || empty($uid) || empty($pwd) || empty($pwdr)){
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
    $maria = "SELECT * FROM bank_user WHERE UID = ? or email = ?;";
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
    $maria = "INSERT INTO bank_user (first_name, last_name, email, uid, dob, address, phone, pwd) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
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
        $_SESSION['id'] = 2;
        $_SESSION['uid'] = $uidExists['uid'];
        echo $_SESSION['uid'];
        header("location: ../index.php?error=none");
        exit();
    }
}

function createAccount($connection, $amt, $routing, $type){
    #           TO DO's
    # CHECK IF A ACCOUNT ALREADY EXISTS TO GET ROUTING NUMBER 
    # ELSE CHECK IF THE RANDOMLY GENERATE ROUTING NUMBER IS AVAILABLE
    # GET HIGHEST ACCOUNT NUMBER AND +1 IT FOR NEW ACCOUNT
    # CREATE NEW ROW FOR TABLE AND INSERT
    session_start();
    # CURRENTLY DOES NOT FULLY WORK
    $accnum = 1;
    $uid = $_SESSION['uid'];
    
    $checking_query = "SELECT * FROM account WHERE uid = '$uid' and type='checking' and accnum='$accnum'";
    $saving_query = "SELECT * FROM account WHERE uid = '$uid' and type='saving' and accnum='$accnum'";
    $result = $connection->query($checking_query);
    $row1 = $result->fetch_assoc();
    $result = $connection->query($saving_query);
    $row2 = $result->fetch_assoc();
    $checkingNotNull = false;
    $savingNotNull = false;
    if(isset($row1['routing'])) {
        $routing = $row1['routing'];
        $checkingNotNull = true;
    }
    if (isset($row2['routing'])) {
        $routing =$row2['routing'];
        $savingNotNull = true;
    }

    if (($savingNotNull === false && $checkingNotNull === false) || ($checkingNotNull === true && $savingNotNull === false && $type === 'saving') 
    || ($checkingNotNull === false && $savingNotNull === true && $type === 'checking')) {
        $query = "INSERT INTO account (uid, type, amt, accnum, routing) VALUES (?, ?, ?, ?, ?)";
        $statement = mysqli_stmt_init($connection);
        mysqli_stmt_prepare($statement, $query);
        mysqli_stmt_bind_param($statement, "sssss", $uid, $type, $amt, $accnum, $routing);
        mysqli_stmt_execute($statement);
        mysqli_stmt_close($statement);
    
        header("location: ../bankAccount.php?error=none");
        exit();
    }
    if (($checkingNotNull === true && $savingNotNull === false && $type === 'checking') || ($checkingNotNull === false && $savingNotNull === true && $type==='saving')
    || ($checkingNotNull === true && $savingNotNull === true)) {
        $accnum = 2;
        $query = "SELECT * FROM account WHERE uid = '$uid' and type='$type' and accnum='$accnum'";
        $result = $connection->query($query);
        $row = $result->fetch_assoc();
        while ($row) {
            $accnum += 1;
            $query = "SELECT * FROM account WHERE uid = '$uid' and type='$type' and accnum='$accnum'";
            $result = $connection->query($query);
            $row = $result->fetch_assoc();
        }
        $query = "INSERT INTO account (uid, type, amt, accnum, routing) VALUES (?, ?, ?, ?, ?)";
        $statement = mysqli_stmt_init($connection);
        mysqli_stmt_prepare($statement, $query);
        mysqli_stmt_bind_param($statement, "sssss", $uid, $type, $amt, $accnum, $routing);
        mysqli_stmt_execute($statement);
        mysqli_stmt_close($statement);
    
        header("location: ../bankAccount.php?error=none");
        exit();
    }
    header("location: ../bankAccount.php?error='$uid'");
    exit();
}