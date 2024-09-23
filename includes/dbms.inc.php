<?php
try {
    $connection = new PDO('mysql:host=localhost;dbname=testdb', 'root', '');

    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    try {
        $result = $connection->query("SHOW TABLES LIKE 'bank_user';");
        if ($result->rowCount() > 0) {
        } else {
            $bank_user = "CREATE TABLE bank_user (
                first_name VARCHAR(30) NOT NULL,
                last_name VARCHAR(30) NOT NULL,
                email VARCHAR(50),
                uid VARCHAR(50) PRIMARY KEY NOT NULL,
                dob VARCHAR(30) NOT NULL,
                address VARCHAR(50) NOT NULL,
                phone VARCHAR(50) NOT NULL,
                pwd VARCHAR(150) NOT NULL
                )";
            $connection->exec($bank_user);
        }
    } catch (PDOException) {
        $err = $error->getMessage();
        echo "$err";
    }

    try {
        $result = $connection->query("SHOW TABLES LIKE 'bank_info';");
        if ($result->rowCount() > 0) {
        } else {
            $bank_info = "CREATE TABLE bank_info (
            bankname VARCHAR(10) PRIMARY KEY NOT NULL,
            address VARCHAR(50) NOT NULL,
            city VARCHAR(20) NOT NULL,
            zip INT(10) NOT NULL,
            phone VARCHAR(20) NOT NULL,
            Efirstname VARCHAR(20) NOT NULL, 
            Elastname VARCHAR(20) NOT NULL,
            EID INT(10) NOT NULL,
            routing INT(10) NOT NULL
            )";
            $connection->exec($bank_info);
        }
    } catch (PDOException) {
        $err = $error->getMessage();
        echo "$err";
    }

    try {
        $result = $connection->query("SHOW TABLES LIKE 'transactions';");
        if ($result->rowCount() > 0) {
        } else {
            $transaction_info = "CREATE TABLE transactions (
            uid VARCHAR(50),
            Trans_ID INT(6) AUTO_INCREMENT PRIMARY KEY,
            OtherAccNum VARCHAR(15) NOT NULL,
            Trans_Type VARCHAR(15) NOT NULL,
            Acc_Type VARCHAR(15) NOT NULL,
            amt INT(15) NOT NULL,
            timeStamp VARCHAR(25) NOT NULL,
            pending VARCHAR(20) NOT NULL,
            FOREIGN KEY (uid) REFERENCES bank_user(uid)
            )";
            $connection->exec($transaction_info);
        }
    } catch (PDOException) {
        $err = $error->getMessage();
        echo "$err";
    }
    
    try {
        $result = $connection->query("SHOW TABLES LIKE 'account';");
        if ($result->rowCount() > 0) {
        } else {
            $account_info ="CREATE TABLE account (
                uid VARCHAR(50),
                type VARCHAR(15) NOT NULL,
                amt INT(20) NOT NULL,
                accnum INT(10) NOT NULL PRIMARY KEY,
                accname VARCHAR(20) NOT NULL,
                FOREIGN KEY (uid) REFERENCES bank_user(uid)
                )";
            $connection->exec($account_info);
        }
    } catch (PDOException $error) {
        $err = $error->getMessage();
        echo "$err";
    }

} catch (PDOException $error) {
    die('Connection failed: ' . $error->getMessage());
}
?>