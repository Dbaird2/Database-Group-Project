set foreign_key_checks=0;

DROP TABLE IF EXISTS bank_user;
DROP TABLE IF EXISTS bank_info;
DROP TABLE IF EXISTS account;
DROP TABLE IF EXISTS transactions;
DROP TABLE IF EXISTS inactiveTransactions;
DROP PROCEDURE IF EXISTS updateAccount;
DROP PROCEDURE IF EXISTS deleteTransaction;
DROP PROCEDURE IF EXISTS monthlyTransactions;


CREATE TABLE IF NOT EXISTS bank_user (
    first_name VARCHAR(30) NOT NULL,
    last_name VARCHAR(30) NOT NULL,
    email VARCHAR(50) NOT NULL,
    uid VARCHAR(50) PRIMARY KEY NOT NULL,
    dob DATE NOT NULL,
    address VARCHAR(50) NOT NULL,
    phone VARCHAR(50) NOT NULL,
    pwd VARCHAR(60) DEFAULT NULL,
    unhash_pwd varchar(60) DEFAULT NULL,
    status BOOLEAN DEFAULT TRUE,
    admin BOOLEAN DEFAULT FALSE
);

CREATE TABLE IF NOT EXISTS bank_info (
    bankID VARCHAR(10) PRIMARY KEY NOT NULL,
    address VARCHAR(50),
    city VARCHAR(20),
    zip INT(10),
    phone VARCHAR(20) NOT NULL,
    routing INT(10) NOT NULL,
    bank_name VARCHAR(20)
);

CREATE TABLE IF NOT EXISTS account (
    uid VARCHAR(50),
    type VARCHAR(20) NOT NULL,
    balance DECIMAL(20, 2) NOT NULL,
    accnum INT(20) NOT NULL PRIMARY KEY,
    accname VARCHAR(40),
    status BOOLEAN DEFAULT TRUE,
    FOREIGN KEY (uid) REFERENCES bank_user(uid) ON UPDATE CASCADE ON DELETE CASCADE
);



CREATE TABLE IF NOT EXISTS transactions (
    uid VARCHAR(50),
    trans_id INT(6) AUTO_INCREMENT PRIMARY KEY,
    other_accnum VARCHAR(15),
    trans_type VARCHAR(15) NOT NULL,
    acc_type VARCHAR(15) NOT NULL,
    amt DECIMAL(20,2) NOT NULL,
    timeStamp DATE DEFAULT NOW(),
    pending VARCHAR(20) DEFAULT 'Pending',
    accnum INT(20),
    FOREIGN KEY (accnum) REFERENCES account(accnum) ON UPDATE CASCADE ON DELETE CASCADE,
    FOREIGN KEY (uid) REFERENCES bank_user(uid) ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS inactiveTransactions (
    uid VARCHAR(50),
    trans_id INT(6) PRIMARY KEY,
    other_accnum VARCHAR(15),
    trans_type VARCHAR(15) NOT NULL,
    acc_type VARCHAR(15) NOT NULL,
    amt DECIMAL(20, 2) NOT NULL,
    timeStamp DATE NOT NULL,
    pending VARCHAR(20),
    accnum INT(20)
);

CREATE VIEW IF NOT EXISTS CustomerPlacement AS
Select uid, sum(balance) as Total, 
row_number() over (Order by Total desc) as Placement
from account group by uid;


CREATE VIEW IF NOT EXISTS ActiveBankAccounts AS
SELECT * 
FROM bank_user
WHERE status = TRUE;

CREATE VIEW IF NOT EXISTS ActiveBankAccountsUser AS
SELECT *
FROM account
WHERE status = TRUE;



DELIMITER //

DROP PROCEDURE IF EXISTS checkTransactions;
CREATE PROCEDURE checkTransactions (
    IN accnumber INT,
    IN other_accnumber INT,
    IN old_trans_type VARCHAR(20),
    IN username VARCHAR(60),
    OUT new_trans_type VARCHAR(20)
) 
BEGIN
    DECLARE swap INT;
    DECLARE no_change INT;
    DECLARE sent_to_self INT;
    SET swap = (SELECT count(*) from transactions where accnum = accnumber AND other_accnum = other_accnumber AND uid != username);

    SET no_change = (SELECT count(*) FROM transactions WHERE accnum = accnumber AND other_accnum = other_accnumber AND uid = username);

    SET sent_to_self = (SELECT count(*) FROM transactions WHERE accnum = other_accnumber AND other_accnum = accnumber AND uid = username);


    IF accnumber = other_accnumber THEN
        SET new_trans_type = old_trans_type;
    ELSEIF sent_to_self > 0 THEN
        SET new_trans_type = 'Transfer';
    ELSEIF no_change > 0 AND  swap = 0 THEN
        SET new_trans_type = old_trans_type;
    ELSEIF swap > 0 THEN
        IF old_trans_type = 'Deposit' THEN
            SET new_trans_type = 'Withdrawal';
        ELSE
            SET new_trans_type = 'Deposit';
        END IF;
    END IF;
    SELECT swap, no_change, accnumber, other_accnumber, old_trans_type, new_trans_type;
END//
DELIMITER ;


DELIMITER //
DROP PROCEDURE IF EXISTS add_from_deposit;
CREATE PROCEDURE add_from_deposit (
    IN accnumber INT,
    IN amt DECIMAL(20,2) 
) 
BEGIN
    IF accnumber = accnumber THEN
        UPDATE account
        set balance = balance + amt
        WHERE accnum = accnumber;
END IF;
END//
DELIMITER ;

DELIMITER //
CREATE PROCEDURE monthlyTransactions (
    IN time DATE,
    IN id INT,
    IN accnumber INT,
    OUT spending DECIMAL(20,2)
) 
BEGIN
    DECLARE receiving DECIMAL(20,2);
    DECLARE sending DECIMAL(20,2);
    DECLARE receiving2 DECIMAL(20,2);
    SET sending = (SELECT SUM(amt) FROM transactions 
        WHERE YEAR(timeStamp) = YEAR(NOW()) AND MONTH(time) = MONTH(NOW()) 
        AND trans_type = 'Withdrawal' AND trans_id = id AND accnum = accnumber GROUP BY trans_id);
    SET receiving = (SELECT SUM(amt) FROM transactions 
        WHERE YEAR(timeStamp) = YEAR(NOW()) AND MONTH(time) = MONTH(NOW()) 
        AND trans_type = 'Deposit' AND trans_id = id AND accnum = accnumber GROUP BY trans_id);
    SET receiving2 = (SELECT SUM(amt) FROM transactions 
        WHERE YEAR(timeStamp) = YEAR(NOW()) AND MONTH(time) = MONTH(NOW()) 
        AND trans_type = 'Withdrawal' AND trans_id = id AND other_accnum = accnumber GROUP BY trans_id);
    IF sending IS NULL THEN
        IF receiving IS NULL THEN
            SET spending = receiving2;
        ELSE
            SET spending = receiving;
        END IF ;
    ELSE
        SET spending = - sending;
    END IF ;

    SELECT spending, sending, receiving, receiving2;
END//
DELIMITER ;

DELIMITER //
DROP PROCEDURE IF EXISTS create_bank_user;
CREATE PROCEDURE create_bank_user (
    IN fname VARCHAR(25),
    IN lname VARCHAR(25),
    IN email VARCHAR(50),
    IN username VARCHAR(40),
    IN birth VARCHAR(15),
    IN street VARCHAR(40),
    IN pnum VARCHAR(13),
    IN pw VARCHAR(60),
    IN unhashed_pw VARCHAR(60)
) 
BEGIN
    IF fname IS NOT NULL AND lname IS NOT NULL AND email IS NOT NULL AND username IS NOT NULL 
    AND birth IS NOT NULL AND street IS NOT NULL AND pnum IS NOT NULL 
    AND pw IS NOT NULL AND unhashed_pw IS NOT NULL THEN
    INSERT INTO bank_user (first_name, last_name, email, uid, dob, address, phone, pwd, unhash_pwd) VALUES (fname, lname, email, username, birth, street, pnum, pw, unhashed_pw);
END IF;
END//
DELIMITER ;



DELIMITER //
CREATE PROCEDURE deleteTransaction (
    IN new_trans_id INT,
    IN new_accnum INT,
    IN new_amt DECIMAL(20,2),
    IN new_balance DECIMAL(20,2),
    IN new_other_accnum INT,
    IN new_trans_type VARCHAR(20)
)
BEGIN
    SELECT new_trans_type;
    IF new_trans_type = 'Withdrawal' THEN
            UPDATE account
            SET balance = balance + new_amt
            WHERE accnum = new_accnum;
            IF new_other_accnum != new_accnum THEN
                UPDATE account
                SET balance = balance - new_amt
                WHERE accnum = new_other_accnum;    
            END IF ;
            DELETE FROM transactions 
            WHERE trans_id = new_trans_id;
    ELSEIF new_trans_type = 'Deposit' THEN
        IF new_amt <= new_balance THEN 
            UPDATE account
            SET balance = balance - new_amt
            WHERE accnum = new_accnum;
            IF new_other_accnum != new_accnum THEN
                UPDATE account
                SET balance = balance + new_amt
                WHERE accnum = new_other_accnum;    
            END IF ;
            DELETE FROM transactions 
            WHERE trans_id = new_trans_id;
        END IF;
    ELSEIF new_trans_type = 'Transfer' THEN
        UPDATE account
        SET balance = balance + new_amt
        WHERE accnum = new_accnum;
            
        UPDATE account
        SET balance = balance - new_amt
        WHERE accnum = new_other_accnum;
        DELETE FROM transactions 
        WHERE trans_id = new_trans_id;
END IF ;
END//
DELIMITER ;

DELIMITER //
CREATE PROCEDURE updateAccount (
    IN new_trans_id INT(20),
    IN new_accnum INT(20),
    IN new_amt DECIMAL(20,2),
    IN old_amt DECIMAL(20, 2),
    IN new_trans_type VARCHAR(15),
    IN new_other_accnum INT(20)
) 
BEGIN
    IF old_amt < new_amt THEN
        IF new_trans_type = 'Deposit' THEN
            UPDATE account
            SET balance = balance + (new_amt - old_amt)
            WHERE accnum = new_accnum;
            IF new_accnum != new_other_accnum THEN
                UPDATE account
                SET balance = balance - (new_amt - old_amt)
                WHERE accnum = new_other_accnum;
            END IF ;
        ELSEIF new_trans_type = 'Withdrawal' THEN
            UPDATE account
            SET balance = balance - (new_amt - old_amt)
            WHERE accnum = new_accnum;
            IF new_accnum != new_other_accnum THEN
                UPDATE account
                SET balance = balance + (new_amt - old_amt)
                WHERE accnum = new_other_accnum;
            END IF ;
        END IF;
    ELSEIF old_amt > new_amt THEN
        IF new_trans_type = 'Deposit' THEN
            UPDATE account
            SET balance = balance - (old_amt - new_amt)
            WHERE accnum = new_accnum;
            IF new_accnum != new_other_accnum THEN
                UPDATE account
                SET balance = balance + (new_amt - old_amt)
                WHERE accnum = new_other_accnum;
            END IF ;
        ELSEIF new_trans_type = 'Withdrawal' THEN
            UPDATE account
            SET balance = balance + (old_amt - new_amt)
            WHERE accnum = new_accnum;
            IF new_accnum != new_other_accnum THEN
                UPDATE account
                SET balance = balance - (new_amt - old_amt)
                WHERE accnum = new_other_accnum;
            END IF ;
        END IF;
    END IF;
    IF new_trans_type = 'Transfer' THEN
        UPDATE account
        SET balance = balance - (new_amt - old_amt)
        WHERE accnum = new_accnum;
            
        UPDATE account
        SET balance = balance + (new_amt - old_amt)
        WHERE accnum = new_other_accnum;
    END IF;

END//
DELIMITER ;



DELIMITER //
CREATE TRIGGER IF NOT EXISTS BankUserStatusChange 
AFTER UPDATE ON bank_user
FOR EACH ROW
IF NEW.status = FALSE THEN
    INSERT INTO inactiveTransactions(uid, trans_id, other_accnum, trans_type, acc_type, 
        amt, timeStamp, pending, accnum) SELECT uid, trans_id, other_accnum, trans_type, acc_type, amt, timeStamp, pending, accnum FROM transactions WHERE uid = NEW.uid;
    DELETE FROM transactions WHERE uid = NEW.uid;
END IF//
DELIMITER ;


DELIMITER //

CREATE TRIGGER IF NOT EXISTS updateTransaction 
AFTER INSERT ON account
FOR EACH ROW
IF NEW.uid = NEW.uid THEN
    INSERT INTO transactions(uid, other_accnum, trans_type, acc_type, 
        amt, timeStamp, pending, accnum) values (NEW.uid, NEW.accnum, 'Deposit',
        NEW.type, NEW.balance, NOW(), 'Pending', NEW.accnum);

END IF//
DELIMITER ;

DELIMITER //
CREATE TRIGGER IF NOT EXISTS updateBalance
AFTER INSERT ON transactions
FOR EACH ROW

IF NEW.trans_type = 'Withdrawal' AND NEW.other_accnum = NEW.accnum THEN
    UPDATE account
    SET balance = balance - NEW.amt
    WHERE accnum = NEW.accnum;
ELSEIF NEW.trans_type = 'Withdrawal' OR NEW.trans_type = 'Transfer' THEN
    UPDATE account
    SET balance = balance - NEW.amt
    WHERE accnum = NEW.accnum;
    UPDATE account 
    SET balance = balance + NEW.amt
    WHERE accnum = NEW.other_accnum;
ELSEIF NEW.trans_type = 'Deposit' AND NEW.other_accnum != NEW.accnum THEN
    UPDATE account
    SET balance = balance + NEW.amt
    WHERE accnum = NEW.accnum;
    UPDATE account 
    SET balance = balance - NEW.amt
    WHERE accnum = NEW.other_accnum;


END IF//
DELIMITER ;

DELIMITER //
CREATE TRIGGER IF NOT EXISTS accountDeletion
BEFORE DELETE ON account
FOR EACH ROW
IF OLD.balance >= 0 THEN
    INSERT INTO inactiveTransactions(uid, trans_id, other_accnum, trans_type, acc_type, 
        amt, timeStamp, pending, accnum) SELECT uid, trans_id, other_accnum, trans_type, acc_type, amt, timeStamp, pending, accnum FROM transactions WHERE accnum = OLD.accnum;
    DELETE FROM transactions WHERE accnum = OLD.accnum;

END IF//    
DELIMITER ;
set foreign_key_checks=1;
