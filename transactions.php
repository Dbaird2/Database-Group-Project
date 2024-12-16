<?php

include_once("header.php");
require_once 'includes/dbms.inc.php';

$headerMsg="";

if ($_SESSION['uid'] == FALSE || empty($_SESSION['uid'])) {
    header("location: index.php");
    exit();
}

$uid = $_SESSION["uid"];

if(isset($uid)) {
    $array = [];
    $query = $connection->prepare("SELECT * FROM account WHERE uid = ? AND type='Savings'");
    $query->execute([$uid]);
    $rows = $query->fetchAll(PDO::FETCH_ASSOC);
    if ($rows) {
        foreach ($rows as $row) {
            $accnum = $row['accnum'];
            array_push($array, $accnum);
        }
    }
    $query = $connection->prepare("SELECT * FROM account WHERE uid = ? AND type='Checkings'");
    $query->execute([$uid]);
    $rows = $query->fetchAll(PDO::FETCH_ASSOC);
    if ($row) {
        foreach ($rows as $row) {
            $accnum = $row['accnum'];
            array_push($array, $accnum);
        }
    }

    if (count($array) > 0) {
        $placeholders = implode(',', array_fill(0, count($array), '?'));

        $stmt = "SELECT * FROM transactions WHERE accnum IN ($placeholders) OR other_accnum IN ($placeholders) ORDER BY timeStamp ASC";
        $query = $connection->prepare($stmt);

        $parameters = array_merge($array, $array);
        $query->execute($parameters);

        $rows = $query->fetchAll(PDO::FETCH_ASSOC);
        foreach ($rows as $row) {
            // Process each transaction
            $amt = $row['amt'];
            $transType = $row['trans_type'];
            $accnum = $row['accnum'];
            $date = $row['timeStamp'];
            $other_accnum= $row['other_accnum'];
            $trans_type = $row['trans_type'];
            $trans_id = $row['trans_id'];

            $swap_query = $connection->prepare("select count(*) as swap from transactions 
                where accnum=? and other_accnum = ? and uid != ?");
            $swap_query->execute([$accnum, $other_accnum, $uid]); 
            $results = $swap_query->fetch(PDO::FETCH_ASSOC);
            $swap = $results['swap'];

            $new_trans_type = '';
            $query = $connection->prepare("CALL checkTransactions(?, ?, ?, ?, @trans_type)");
            if (!$query->execute([$accnum,$other_accnum, $trans_type, $uid])) {
                $insertMsg = print_r($query->errorInfo(), true);
                echo $insertMsg;
            }
            $query->closeCursor();
            $query2 = $connection->query("SELECT @trans_type");
            $results = $query2->fetch(PDO::FETCH_ASSOC);

            $new_trans_type = $results['@trans_type'];

            $query = $connection->prepare("select distinct CONCAT(first_name, ' ', last_name) as full_name from transactions natural join account natural join bank_user where accnum=:other_acc");

            $query->bindParam(":other_acc", $other_accnum, PDO::PARAM_INT);
            $query->execute();
            $other_acc = $query->fetch(PDO::FETCH_ASSOC);
            $other_accname = $other_acc['full_name'];

            echo"<section id='trans-hist' class='account-section'>";
            echo "<div class='transaction-section'>";
            echo "<div style='font-size:0.85vw;' class='top-left'><h4>Transaction Type: $new_trans_type</h4></div>";
            if ($new_trans_type == 'Withdrawal') {
                echo "<div style='font-size:0.85vw;' class='top-right'><h4>Amount: -$$amt</h4></div>";
            } else {
                echo "<div style='font-size:0.85vw;' class='top-right'><h4>Amount: +$$amt</h4></div>";
            }
            echo "<div style='font-size:0.85vw;' class='bottom-left'>Account Number: $accnum to $other_accname</div>";
            echo "<div style='font-size:0.85vw;' class='bottom-right'>$date</div>";
            echo "</div>";
            echo "<form action='receipt.php' method='POST'>";
            if ($swap == 0) {
                echo "<button type='submit' name='submit' value='$trans_id'>Receipt</button>";
            }
            echo "</form>";
            echo "</section>";
        }
    } else {
        echo "<h4 style='text-align:center;margin-top:4%;'>No Transaction History</h4>";
    } 
}
?>
</section>
