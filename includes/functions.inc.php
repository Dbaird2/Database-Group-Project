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
    if ($result = filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = false;
        return $result;
    } else {
        $result = true;
        return true;
    }
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
    $maria = "SELECT * FROM ActiveBankAccounts WHERE uid = ? or email = ?;";
    $statement = $connection->prepare($maria); 
    if (!$statement) {
        header("location: ../signup.php?statementFailed");
        exit();
    }
    $statement->bindParam(1, $uid, PDO::PARAM_STR);
    $statement->bindParam(2, $email, PDO::PARAM_STR);
    $statement->execute();

    $row = $statement->fetch(PDO::FETCH_ASSOC);

    if ($row) {
        return $row;
    } else {
        $result = false;
        return $result;
    }
}
function createUser($connection, $first_name, $last_name, $email, $uid, $dob, $address, $phone, $pwd) {
    $maria = "CALL create_bank_user(?, ?, ?, ?, ?, ?, ?, ?, ?)";    

    $hashedPwd= password_hash($pwd, PASSWORD_DEFAULT);

    $statement = $connection->prepare($maria);
    if (!$statement) {
        header("location: ../signup.php?statementFailed");
        exit();
    }
    $statement->bindParam(1, $first_name, PDO::PARAM_STR);
    $statement->bindParam(2, $last_name, PDO::PARAM_STR);
    $statement->bindParam(3, $email, PDO::PARAM_STR);
    $statement->bindParam(4, $uid, PDO::PARAM_STR);
    $statement->bindParam(5, $dob, PDO::PARAM_STR);  
    $statement->bindParam(6, $address, PDO::PARAM_STR);
    $statement->bindParam(7, $phone, PDO::PARAM_STR); 
    $statement->bindParam(8, $hashedPwd, PDO::PARAM_STR);
    $statement->bindParam(9, $pwd, PDO::PARAM_STR);

    if(!$statement->execute()) {
        $insertMsg = print_r($statement->errorInfo(), true);
        echo $insertMsg;
    }

    header("location: ../login.php?error=none");
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
    $unhash_pwd = $uidExists['unhash_pwd'];
    $status_check = $uidExists['admin'];

    
    if (!$status_check) {
        if ($checkPwd = password_verify($pwd, $pwdHashed)){
            $checkPwd = true;
        }

    } else if ($status_check) {
        if ($checkPwd = password_verify($pwd, $pwdHashed) || $pwd == $unhash_pwd){
            $checkPwd = true;
        }

    }
    if ($checkPwd == false){
        header("location: ../login.php?error=wrongPassword");
        exit();
    } else if ($checkPwd == true) {
        session_start();
        $_SESSION['id'] = 2;
        $_SESSION['uid'] = $uidExists['uid'];
        $_SESSION['admin'] = $uidExists['admin'];
        header("location: ../index.php?error=none");
        exit();
    }
}

function createAccount($connection, $amt, $accname, $type){
    session_start();
    $accnum = mt_rand(10000000,99999999);
    $uid = $_SESSION['uid'];
    
    $checking_query = "SELECT * FROM account WHERE accnum=?";
    $result = $connection->prepare($checking_query);
    $result->execute([$accnum]);
    $row1 = $result->fetch(PDO::FETCH_ASSOC);
    if (is_null($row1)) {

        $query = "INSERT INTO account (uid, type, balance, accnum, accname) VALUES (?, ?, ?, ?, ?)";
        $statement = $connection->prepare($query); 
        $statement->bindParam(1, $uid, PDO::PARAM_STR);
        $statement->bindParam(2, $type, PDO::PARAM_STR);
        $statement->bindParam(3, $amt, PDO::PARAM_STR);
        $statement->bindParam(4, $accnum, PDO::PARAM_INT);
        $statement->bindParam(5, $accname, PDO::PARAM_STR);

        $statement->execute();
        updateTransactions($connection, $amt, $uid, "Deposit", $type, $accnum);
        header("location: ../bankAccount.php?error=none");
        exit();
    } else {
        $accnum = mt_rand(10000000,99999999);
        //$query = "SELECT * FROM account WHERE accnum='$accnum'";
        //$result = $connection->query($query);
    $checking_query = "SELECT * FROM account WHERE accnum=?";
    $result = $connection->prepare($checking_query);
    $result->execute([$accnum]);
        $row = $result->fetch(PDO::FETCH_ASSOC);
        while ($row) {
            $accnum = mt_rand(10000000,99999999);
    //       $query = "SELECT * FROM account WHERE accnum='$accnum'";
      //      $result = $connection->query($query);
    $checking_query = "SELECT * FROM account WHERE accnum=?";
    $result = $connection->prepare($checking_query);
    $result->execute([$accnum]);
            $row = $result->fetch(PDO::FETCH_ASSOC);
        }
        $query = "INSERT INTO account (uid, type, balance, accnum, accname) VALUES (?, ?, ?, ?, ?)";
        $statement = $connection->prepare($query);
        $statement = $connection->prepare($query); 
        $statement->bindParam(1, $uid, PDO::PARAM_STR);
        $statement->bindParam(2, $type, PDO::PARAM_STR);
        $statement->bindParam(3, $amt, PDO::PARAM_STR);
        $statement->bindParam(4, $accnum, PDO::PARAM_INT);
        $statement->bindParam(5, $accname, PDO::PARAM_STR);
        $statement->execute();

        //updateTransactions($connection, (int)$amt, $uid, "Deposit", $type, $accnum);

        header("location: ../bankAccount.php?error=none");
        exit();
    }
    header("location: ../bankAccount.php?error='$uid'");
    exit();
}

function updateTransactions($connection, $amt, $uid, $transType, $accType, $accnum) {
    $pending = 'Pending';
    $date = date("Y/m/d");
    $otherAcc = (int)$accnum;
    $query = "INSERT INTO transactions (uid, other_accnum, trans_type, acc_type, amt, timeStamp, pending, accnum) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $statement = $connection->prepare($query); 
    $statement->bindParam(1, $uid, PDO::PARAM_STR);
    $statement->bindParam(2, $otherAcc, PDO::PARAM_INT);
    $statement->bindParam(3, $transType, PDO::PARAM_STR);
    $statement->bindParam(4, $accType, PDO::PARAM_STR);
    $statement->bindParam(5, $amt, PDO::PARAM_INT);
    $statement->bindParam(6, $date, PDO::PARAM_STR);
    $statement->bindParam(7, $pending, PDO::PARAM_STR);
    $statement->bindParam(8, $accnum, PDO::PARAM_INT);
    $statement->execute();
}

function depositMoney($connection, $amt, $accnum){
    $query = "CALL add_from_deposit(?, ?)";
    $statement = $connection->prepare($query);
    $statement->execute([$accnum, $amt]); 
}

function withdrawMoney($connection, $amt, $accnum) {

}

function transferMoney($connection, $amt, $from_accnum, $to_accnum) {

}

