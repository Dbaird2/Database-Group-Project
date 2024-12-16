<?php
include_once ("header.php");
require_once 'includes/dbms.inc.php';


/*ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
 */
if (empty($_SESSION['uid']) || $_SESSION['uid'] == FALSE) {
    header("location: index.php");
}

$spendings = 0;
$array = [];

$query = $connection->prepare("SELECT Total, Placement from CustomerPlacement where uid = ?");
if (!$query->execute([$_SESSION['uid']])){
    $insertMsg = print_r($query->errorInfo(), true);
} else {
    $total = $query->fetch(PDO::FETCH_ASSOC);
}

?>
<div class="stuff">
    <a href="createAccount.php"><b>Don't have a checking or saving account? Click Here</b></a>
<?php
if (is_null($total['Total'])){
} else {
    $rank = $total['Placement'];
    $amount = $total['Total'];
    $amount = number_format($amount, 2);
    
    echo "<h2>Financial Ranking #$rank with $$amount</h2>";
}
ob_start();
$spendings = '##spendings##';
ob_start();
$something = '##+##';
$string = "<br><h2>This months spendings: $$spendings</h2>";

echo $string;

?>
</div>
<?php
$uid = $_SESSION['uid'];
$admin = $_SESSION['admin'];
if(isset($uid)) {
    $query = $connection->prepare("SELECT * FROM account WHERE uid = ? AND type='Checkings'");
    $query->execute([$uid]);
    $rows = $query->fetchAll(PDO::FETCH_ASSOC);
    if (!$rows) {
        echo "<section id='checking' class='account-section'>";
        echo "<h2>Checkings Account</h2>";
        echo "<ul>";
        echo "<li><b>You have not yet made a checking account.</b></li>";

        echo "</ul>";
        echo "</section>";
    } else {
        foreach ($rows as $row) {
            echo "<section id='checking' class='account-section'>";
            $accname = $row['accname'];
            if (is_null($accname)||$accname == '' ) {
                echo "<h2>Checkings Account</h2>";
            } else {
                echo "<h2>$accname</h2>";
            }

            echo "<ul>";
            $checkingBalance = floatval($row['balance']);
            $checkingBalance = number_format($checkingBalance, 2);

            echo "<li style='margin-bottom:1%'><b>Balance</b>: $$checkingBalance</li>";
            $accnum = $row['accnum'];
            array_push($array, $accnum);
            echo "<li style='margin-bottom:1%'><b>Account Number:</b> $accnum</li>";
            $acctype = $row['type'];
            echo "<li><b>Account Type:</b> $acctype</li>";
            echo "</ul>";
            echo "</section>";
        }
    }
}

?>

<?php
$uid = $_SESSION['uid'];
if(isset($uid)) {
    $query = $connection->prepare("SELECT * FROM account WHERE uid = ? AND type='Savings'");
    $query->execute([$uid]);
    $rows = $query->fetchAll(PDO::FETCH_ASSOC);
    if (!$rows) {
        echo "<section id='checking' class='account-section'>";
        echo "<h2>Savings Accounts</h2>";
        echo "<ul>";
        echo "<li><b>You have not yet made a savings account.</b></li>";

        echo "</ul>";
        echo "</section>";
    } else {
        foreach ($rows as $row) {
            $accnum = $row['accnum'];
            array_push($array, $accnum);
            echo "<section id='checking' class='account-section'>";
            $accname = $row['accname'];
            if (is_null($accname) || $accname == '') {
                echo "<h2>Savings Account</h2>";
            } else {
                echo "<h2>$accname</h2>";
            }

            echo "<ul>";
            $checkingBalance = $row['balance'];
            $checkingBalance = number_format($checkingBalance, 2);

            echo "<li style='margin-bottom:1%'><b>Balance</b>: $$checkingBalance</li>";
            echo "<li style='margin-bottom:1%'><b>Account Number:</b> $accnum</li>";
            $acctype = $row['type'];
            echo "<li><b>Account Type:</b> $acctype</li>";
            echo "</ul>";
            echo "</section>";
        }
    }
}


?>
        </ul>
    </section>


    <section id="transactions" class="account-section">
        <a href="transactions.php"><b>View All Transactions</b></a>
        <p><b>Recent Transactions</b></p>
<?php
if (count($array) > 0) {
    $placeholders = implode(',', array_fill(0, count($array), '?'));

    $stmt = "SELECT * FROM transactions WHERE accnum IN ($placeholders) OR other_accnum IN ($placeholders) ORDER BY timeStamp ASC LIMIT 3";
    $query = $connection->prepare($stmt);

    $parameters = array_merge($array, $array);
    $query->execute($parameters);

    $rows = $query->fetchAll(PDO::FETCH_ASSOC);
    if (!empty($rows)) {
        foreach ($rows as $row) {
            // Process each transaction
            $amt = $row['amt'];
            $transType = $row['trans_type'];
            $accnum = $row['accnum'];
            $date = $row['timeStamp'];
            $other_accnum= $row['other_accnum'];
            $trans_type = $row['trans_type'];
            $trans_id = $row['trans_id'];

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
            $amt = number_format($amt, 2);
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
            echo "</section>";

        }
        $stmt = "SELECT * FROM transactions WHERE accnum IN ($placeholders) OR other_accnum IN ($placeholders) ORDER BY timeStamp ASC";
        $query = $connection->prepare($stmt);
        $placeholders = implode(',', array_fill(0, count($array), '?'));
        $query->execute($parameters);
        $rows = $query->fetchAll(PDO::FETCH_ASSOC);
        foreach ($rows as $row) {
            // Process each transaction
            $accnum = $row['accnum'];
            $date = $row['timeStamp'];
            $trans_id = $row['trans_id'];

            if (in_array($accnum, $array)) { 
                $monthly = $connection->prepare("CALL monthlyTransactions(?, ?, ?, @spendings)");
                $monthly->execute([$date, $trans_id, $accnum]);
                $monthly->closeCursor();
                $monthly2 = $connection->query("SELECT @spendings");
                if ($result = $monthly2->fetch(PDO::FETCH_ASSOC)) {
                    $temp = (float)$result['@spendings'];
                    $spendings += (float)$temp;
                }
            }
        }
    } else {
        echo "<h4 style='text-align:center;margin-top:4%;'>No Transaction History</h4>";
    }
} else {
    echo "<h4 style='text-align:center;margin-top:4%;'>No Transaction History</h4>";
} 

$spendings = number_format((float)$spendings, 2);
if (is_null($spendings)) {
    $spendings = 0;
}
echo str_replace('##spendings##', $spendings, ob_get_clean());
?>
</section>
