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
    $statement = $connection->prepare($maria); 
    if (!$statement) {
        header("location: ../signup.php?statementFailed");
        exit();
    }
    $statement->execute([$uid, $email]);

    $row = $statement->fetch(PDO::FETCH_ASSOC);

    if ($row) {
        return $row;
    } else {
        $result = false;
        return $result;
    }
}
function createUser($connection, $first_name, $last_name, $email, $uid, $dob, $address, $phone, $pwd) {
    $maria = "INSERT INTO bank_user (first_name, last_name, email, uid, dob, address, phone, pwd) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $statement = $connection->prepare($maria); 
    if (!$statement) {
        header("location: ../signup.php?statementFailed");
        exit();
    }

    $hashedPwd= password_hash($pwd, PASSWORD_DEFAULT);

    $statement = $connection->prepare($maria);
    $statement->execute([$first_name, $last_name, $email, $uid, $dob, $address, $phone, $hashedPwd]);

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

function createAccount($connection, $amt, $accname, $type){
    session_start();
    $accnum = 1;
    $uid = $_SESSION['uid'];
    
    $checking_query = "SELECT * FROM account WHERE uid = '$uid' and type='Checking' and accnum='$accnum'";
    $saving_query = "SELECT * FROM account WHERE uid = '$uid' and type='Saving' and accnum='$accnum'";
    $result = $connection->query($checking_query);
    $row1 = $result->fetch(PDO::FETCH_ASSOC);
    $result = $connection->query($saving_query);
    $row2 = $result->fetch(PDO::FETCH_ASSOC);
    if( (is_null($row1['accnum']) && ($type == 'Checking'))
        || (is_null($row2['accnum']) && ($type == 'Saving'))) {

        $query = "INSERT INTO account (uid, type, amt, accnum, accname) VALUES (?, ?, ?, ?, ?)";
        $statement = $connection->prepare($query); 
        $statement->execute([$uid, $type, $amt, $accnum, $accname]);
        updateTransactions($connection, $amt, $uid, "Deposit", $type);
        header("location: ../bankAccount.php?error=none");
        exit();
    } else {
        $accnum = 2;
        $query = "SELECT * FROM account WHERE uid = '$uid' and type='$type' and accnum='$accnum'";
        $result = $connection->query($query);
        $row = $result->fetch(PDO::FETCH_ASSOC);
        while ($row) {
            $accnum += 1;
            $query = "SELECT * FROM account WHERE uid = '$uid' and type='$type' and accnum='$accnum'";
            $result = $connection->query($query);
            $row = $result->fetch(PDO::FETCH_ASSOC);
        }
        $query = "INSERT INTO account (uid, type, amt, accnum, accname) VALUES (?, ?, ?, ?, ?)";
        $statement = $connection->prepare($query); 
        $statement->execute([$uid, $type, $amt, $accnum, $accname]);

        updateTransactions($connection, $amt, $uid, "Deposit", $type);

        header("location: ../bankAccount.php?error=none");
        exit();
    }
    /*$checkingNotNull = false;
    $savingNotNull = false;
    if(isset($row1['routing'])) {
        $routing = $row1['routing'];
        $checkingNotNull = true;
    }
    if (isset($row2['routing'])) {
        $routing =$row2['routing'];
        $savingNotNull = true;
    }

    if (($savingNotNull === false && $checkingNotNull === false) || ($checkingNotNull === true && $savingNotNull === false && $type === 'Saving') 
    || ($checkingNotNull === false && $savingNotNull === true && $type === 'Checking')) {
        $query = "INSERT INTO account (uid, type, amt, accnum, routing) VALUES (?, ?, ?, ?, ?)";
        $statement = mysqli_stmt_init($connection);
        mysqli_stmt_prepare($statement, $query);
        mysqli_stmt_bind_param($statement, "sssss", $uid, $type, $amt, $accnum, $routing);
        mysqli_stmt_execute($statement);
        mysqli_stmt_close($statement);

        updateTransactions($connection, $amt, $uid, "Deposit", $type);
        header("location: ../bankAccount.php?error=none");
        exit();
    }
    if (($checkingNotNull === true && $savingNotNull === false && $type === 'Checking') || ($checkingNotNull === false && $savingNotNull === true && $type==='Saving')
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
        
        updateTransactions($connection, $amt, $uid, "Deposit", $type);
        header("location: ../bankAccount.php?error=none");
        exit();
    }*/
    header("location: ../bankAccount.php?error='$uid'");
    exit();
}

function updateTransactions($connection, $amt, $uid, $transType, $accType) {
    $pending = 'Pending';
    $date = date("m/d/Y");
    $otherAcc = "Self";
    $query = "INSERT INTO transactions (uid, OtherAccNum, Trans_Type, Acc_Type, amt, timeStamp, pending) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $statement = $connection->prepare($query); 
    $statement->execute([$uid, $otherAcc, $transType, $accType, $amt, $date, $pending]);
    /*$statement = mysqli_stmt_init($connection);
    mysqli_stmt_prepare($statement, $query);
    mysqli_stmt_bind_param($statement, "ssssis", $uid, $otherAcc, $transType, $accType, $amt, $date);
    mysqli_stmt_execute($statement);
    mysqli_stmt_close($statement);*/
}

function depositMoney($connection, $amt, $account){
    $currentMoney = "SELECT * FROM account WHERE accname='$account'";
    $otherAcc = "Self";
}