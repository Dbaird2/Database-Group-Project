<!DOCTYPE html>
<?php 
/*if ($_SESSION['uid'] == FALSE || empty($_SESSION['uid'])) {
    header("location: index.php");
    exit();
}*/
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction Receipt</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 0; background-color: #f5f5f5; }
        .receipt-container { max-width: 600px; margin: 50px auto; padding: 20px; background: #ffffff; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); }
        h2 { text-align: center; color: #333333; }
        .transaction-details, .item-list, .total-section { margin-bottom: 20px; }
        .label { font-weight: bold; color: #666666; }
        .value { color: #333333; }
        .item { display: flex; justify-content: space-between; padding: 8px 0; border-bottom: 1px solid #e0e0e0; }
        .total-section { display: flex; justify-content: space-between; font-weight: bold; font-size: 1.1em; }
        .footer { text-align: center; color: #888888; margin-top: 30px; font-size: 0.9em; }
    </style>

<?php

include_once 'includes/dbms.inc.php';

$uid = $_SESSION["uid"];

if(isset($_POST['submit'])) {
    $trans_id = $_POST['submit'];
    $balance = $_POST['balance'];

    $query = $connection->prepare("select *, CONCAT(first_name, ' ', last_name) as full_name from transactions natural join bank_user natural join account where trans_id=:trans_id");
    $query->bindParam(':trans_id', $trans_id, PDO::PARAM_INT);
    $query->execute();

    $rows = $query->fetchAll(PDO::FETCH_ASSOC);

    $query = $connection->prepare("select * from bank_info");
    $query->execute();

    $bank_info = $query->fetchAll(PDO::FETCH_ASSOC);

    $bankID = $bank_info[0]['bankID'];
    $routing = $bank_info[0]['routing'];
    $date = $rows[0]['timeStamp'];
    $other_accnum = $rows[0]['other_accnum'];
    $trans_type = $rows[0]['trans_type'];
    $acc_type = $rows[0]['acc_type'];
    $accnum = $rows[0]['accnum'];
    $amt = $rows[0]['amt'];
    $name = $rows[0]['full_name'];
?>
    <div class="receipt-container">
    <h2>Bank Transaction Receipt</h2>

    <div class="transaction-details">
        <p><span class="label">Transaction ID:</span> <span class="value">#<?php echo $trans_id; ?></span></p>
        <p><span class="label">Date:</span> <span class="value"><?php echo $date; ?></span></p>
        <p><span class="label">Account Holder:</span> <span class="value"><?php echo $name; ?></span></p>
        <p><span class="label">Account Number:</span> <span class="value"><?php echo $accnum; ?></span></p>
    </div>

    <div class="transaction-summary">
        <p><span class="label">Transaction Type:</span> <span class="value"><?php echo $trans_type; ?></span></p>
        <p><span class="label">Amount:</span> <span class="value">$<?php echo number_format($amt, 2); ?></span></p>
    </div>

    <div class="footer">
        <p>Thank you for banking with us!</p>
        <p>If you have any questions, please contact our support at artemis.cs.csub.edu/~bams/support.php</p>
    </div>
</div>
<?php

}
?>
