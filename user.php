<title>BAMS Admin</title>
<style>
body {
    font-family: Arial, sans-serif;
    background-color: #f9f9f9;
    color: #333;
    margin: 0;
    padding: 0;
}

.account-section {
    margin: 20px auto;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
    background-color: #fff;
    width: 80%;
}

.account-section h2 {
    font-size: 1.5rem;
    color: #007BFF;
    margin-bottom: 10px;
}

.account-section ul {
    list-style: none;
    padding: 0;
    margin: 0;
}

.account-section ul li {
    font-size: 1rem;
    margin-bottom: 10px;
    line-height: 1.6;
}

.transaction-section {
    display: grid;
    grid-template-rows: auto auto auto; /* Three rows for different parts */
    grid-gap: 15px;
    border: 1px solid #ddd;
    border-radius: 10px;
    padding: 15px;
    margin-top: 10px;
    background-color: #fefefe;
}

.transaction-section .row {
    display: grid;
    grid-template-columns: 1fr 2fr; /* Label and corresponding value */
    align-items: center;
    padding: 10px;
    border-radius: 5px;
}

.transaction-section .row .label {
    font-weight: bold;
    color: #555;
    padding-right: 10px;
    text-align: right;
}

.transaction-section .row .value {
    font-size: 0.95rem;
    color: #333;
    text-align: left;
}

form input[type="number"] {
    padding: 5px;
    font-size: 0.9rem;
    width: 120px;
    border: 1px solid #ccc;
    border-radius: 3px;
}

form input[type="submit"] {
    background-color: #007BFF;
    color: white;
    padding: 8px 15px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 1rem;
}

form input[type="submit"]:hover {
    background-color: #0056b3;
}

@media (max-width: 768px) {
    .account-section {
        width: 95%;
    }

    .transaction-section .row {
        grid-template-columns: 1fr; 
        text-align: left;
    }

    .transaction-section .row .label {
        text-align: left;
        margin-bottom: 5px;
        font-size: 1rem;
    }
}


</style>
<?php 


$array = [];
require_once 'includes/dbms.inc.php';
if (isset($_POST['delete'])) {
    $trans_id = $_POST['delete'];
    $accnum = $_POST['accnum'];
    $other_accnum = $_POST['other_accnum'];
    $amt = $_POST['old_amt'];
    $trans_type = $_POST['trans_type'];
    $query = $connection->prepare("SELECT balance from account where accnum = ?");
    $query->execute([$accnum]);

    $row = $query->fetch(PDO::FETCH_ASSOC);
    $balance = $row['balance'];

    $query = $connection->prepare("CALL deleteTransaction(?, ?, ?, ?, ?, ?)");

    $query->execute([$trans_id, $accnum, $amt, $balance, $other_accnum, $trans_type]);
        header("location: admin.php");
        exit();

}
    


if (isset($_POST['submit2'])) {
    $changeAmt = htmlspecialchars($_POST['changeAmt']);
    $trans_id = $_POST['trans_id'];
    $accnum = $_POST['accnum'];
    $other_accnum = $_POST['other_accnum'];
    $amt = $_POST['old_amt'];
    $trans_type = $_POST['trans_type'];
    
    $query = $connection->prepare("update transactions set amt = ? where trans_id = ?");
    if (!$query->execute([$changeAmt, $trans_id])) {
        echo "Failed";
        $msg = print_r($query->errorInfo(), true);
        echo $msg; 
    } else {
        $query = $connection->prepare("CALL updateAccount(?, ?, ?, ?, ?, ?)");

        if ($trans_type == 'Deposit') {
            $query->execute([$trans_id, $accnum, $changeAmt, $amt, 'Deposit', $other_accnum]);
        } else {
            $query->execute([$trans_id, $accnum, $changeAmt, $amt, 'Withdrawal', $other_accnum]);
        }

    unset($_POST);
    }
        header("location: admin.php");
        exit();
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    header("location: admin.php");
    exit();
}

$uid = $_REQUEST['movieId'];

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);



echo "<a href='index.php'>Home</a>";

$query = $connection->prepare("SELECT * FROM account WHERE uid = ? AND type='Checkings'");
$query->execute([$uid]);
$rows = $query->fetchAll(PDO::FETCH_ASSOC);
if (!$rows) {
} else {

    foreach ($rows as $row) {
        echo "<section id='checking' class='account-section'>";
        $accname = $row['accname'];
        echo "<h2>$accname</h2>";

        echo "<ul>";
        $checkingBalance = $row['balance'];
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

$query = $connection->prepare("SELECT * FROM account WHERE uid = ? AND type='Savings'");
$query->execute([$uid]);
$row = $query->fetch(PDO::FETCH_ASSOC);
if (!$row) {
} else {
    $query = $connection->prepare("SELECT * FROM account WHERE uid= ? AND type='Savings'");
    $query->execute([$uid]);
    $rows = $query->fetchAll(PDO::FETCH_ASSOC);

    foreach ($rows as $row) {
        echo "<section id='checking' class='account-section'>";
        $accname = $row['accname'];
        echo "<h2>$accname</h2>";

        echo "<ul>";
        $checkingBalance = $row['balance'];
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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    header("location: admin.php");
    exit();
}
try {

    $query = $connection->prepare("select * from transactions where accnum=:accnum or other_accnum=:other_accnum order by timeStamp desc");

    $query->bindParam(":accnum", $array[1], PDO::PARAM_INT);
    $query->bindParam(":other_accnum", $array[1], PDO::PARAM_INT);
    if($query->execute()) {
        $rows = $query->fetchAll(PDO::FETCH_ASSOC);
    } else {
        echo "Error executing select query:<br>";
        print_r($query->errorInfo(), true);
    }
} catch (PDOException $error) {
    die('Connection failed: ' . $error->getMessage());
}

$placeholders = implode(',', array_fill(0, count($array), '?'));

$stmt = "SELECT * FROM transactions WHERE accnum IN ($placeholders) OR other_accnum IN ($placeholders)";
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
?>
    <section id='trans-hist' class='account-section'>
    <div class='transaction-section'>

    <div class='row'>
    <div class='label'>Transaction Type:</div>
<?php  echo "<div class='value'>$new_trans_type</div>";
    echo "</div>";
    echo "<div class='row'>";
    echo "<div class='label'>Amount:</div>";
    $amt2 = number_format($amt, 2);
    echo "<div class='value'>$$amt2 <form action='user.php?movieId=$uid' method='POST'>
        <input type='number' name='changeAmt' placeholder='Change Amount'>
        <input style='width:10%;' type='text' name='accnum' value='$accnum'>
        <input style='width:10%;' type='text' name='other_accnum' value='$other_accnum'>
        <input style='width:10%;' type='hidden' name='old_amt' value='$amt'>
        <input style='width:10%;' type='hidden' name='trans_type' value='$trans_type'>
        <input style='width:10%;' type='hidden' name='trans_id' value='$trans_id'>
        <input type='submit' name='submit2' value='Change Amount'></form>
        </form></div>";
    echo "</div>";

    echo "<div class='row'>";
    echo "<div class='label'>Account #:</div>";
    echo "<div class='value'>$accnum to $other_accname</div>";
    echo "<div class='label'>Date:</div>";
    echo "<div class='value'>$date</div>";
    echo "<form action='user.php?movieId=$uid' method='POST'>
        <input style='width:10%;' type='hidden' name='accnum' value='$accnum'>
        <input style='width:10%;' type='hidden' name='other_accnum' value='$other_accnum'>
        <input style='width:10%;' type='hidden' name='old_amt' value='$amt'>
        <input style='width:10%;' type='hidden' name='trans_type' value='$trans_type'>
        <input style='width:10%;' type='hidden' name='delete' value='$trans_id'>
        <input type='submit' name='submit' value='Delete Transaction'></form>";
    echo "</div>";


    echo "</div>";
    echo "</section>";

}
?>
