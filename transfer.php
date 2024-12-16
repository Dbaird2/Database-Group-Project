<?php
include_once ("header.php");
require_once 'includes/dbms.inc.php';

if (!isset($_SESSION['uid']) || empty($_SESSION['uid'])) {
    header("location: index.php");
    exit();
}

ini_set('display_errors', 1);
ini_set('display_all_errors', 1);
error_reporting(E_ALL);

$uid = $_SESSION['uid'] ?? null;
$error_message = "";
$success_message = "";

if(isset($_POST["submit"]) ) {
    $amount_to_withdraw = ($_POST["amount"]);
    $accnum = ($_POST["accnum"]);
    $other_accnum = ($_POST["other_accnum"]);
    $query = $connection->prepare("SELECT balance FROM account WHERE accnum = ?");
    $query->execute([$accnum]);
    $row = $query->fetch(PDO::FETCH_ASSOC);
    $userbalance = $row['balance'];

    if($accnum == $other_accnum) { // Check to see if other_accnum is the same, doesn't work
        echo "<label> You cannot transfer money to the same account number </label>";

    } else { 

        if($amount_to_withdraw < 0){
            $error_message = "Transfer amount must be more than 0.";

        } else if ($amount_to_withdraw > $userbalance){
            $error_message = "Not enough funds in selected account.";
        } else {
            $query = $connection->prepare("SELECT * FROM account WHERE uid = ? AND accnum = ?");
            $query2 = $connection->prepare("SELECT * FROM account WHERE uid = ? AND accnum = ?");
            if($query->execute([$uid, $accnum]) && $query2->execute([$uid, $accnum])) {
                $row1 = $query->fetch(PDO::FETCH_ASSOC);
                $row2 = $query2->fetch(PDO::FETCH_ASSOC);

                $uid1 = $row1['uid'];
                $uid2 = $row2['uid'];
                if ($uid1 == $uid2) {
                    $query = $connection->prepare("INSERT into transactions (uid, other_accnum, trans_type, acc_type, accnum, amt) values(?,?,?,?,?,?) ");
                    $query->execute([$uid, $other_accnum, 'Transfer', 'Account', $accnum, $amount_to_withdraw]);

                    header('location: transactionCompletePage.php');
                    exit();
                }

            } else {
                $query = $connection->prepare("INSERT into transactions (uid, other_accnum, trans_type, acc_type, accnum, amt) values(?,?,?,?,?,?) ");
                $query->execute([$uid, $other_accnum, 'Withdrawal', 'Account', $accnum, $amount_to_withdraw]);

                header('location: transactionCompletePage.php');
                exit();
            }
        }
    }
}
?>



    <section id="transfer-page">
        <h2> Transfer Money </h2>
        <u1>
            <form action="transfer.php" enctype="multipart/form-data" method="post">
                <label> Account Number: </label>
                <input style='width:20%;border: 2px solid #333;border-radius: 8px;' type="number" name="accnum" placeholder="Account Number...">
                <label> Other Account Number: </label>
                <input style='width:20%;' type="number" step="0.01" name="other_accnum" placeholder="Other Account Number...">
                <label> Transfer Amount: </label>
                <input style='width:20%;' type="number" step="0.01" name="amount" placeholder="Transfer...">
                <button style='width:20%;' type="submit" name="submit" value="Submit">Transfer</button>
            </form>
        <u1>

    </section>
<html>

<style>
        input[type=submit] {
        padding:5px 15px; 
        background:#ccc; 
        border:0 none;
        cursor:pointer;
        -webkit-border-radius: 5px;
        border-radius: 5px;  
}

    p{
    margin: 50px;
}
    
</style>


<style>
div.b {
  line-height: 1.6;
}

body{
    padding:0;
    margin-bottom:0;
    margin-top:0;
}
div.c {
  line-height: 0.5cm;
}

</style>

<body>
   
<?php

/*
    $query = $connection->prepare("SELECT balance, accname, accnum FROM account WHERE uid = ?");
    $query->execute([$uid]);
    $rows = $query->fetchAll(PDO::FETCH_ASSOC);
    
    if(!$rows){
     echo "<label> No Checkings or Savings accounts found </label>";
        
    } else {

     echo "<label> Please enter different account numbers </label>";
     //echo "<br>";
     echo"<div style='display:flex;flex-direction:column;align-items;center;'>";
     foreach($rows as $row){
            $accname = $row["accname"];
            $accnum = $row["accnum"];
            $other_accnum = $row["other_accnum"];
            $userbalance = $row['balance'];

            
            echo"<label ><input type='number' name='other_accnum' value=$other_accnum>$other_accnum</label>";

            echo"<input type='hidden' name='accnum' value=$accnum>";
            //echo"<input type='hidden' name='other_accnum' value=$other_accnum>";
            echo"<input type='hidden' name='balance' value=$userbalance>";

        }
        
    echo"</div>";
       echo "<label>Amount: <input style ='font-family: inherit;
  width: 9%;
  border: 0;
  border-bottom: 2px solid gray;
  outline: 0;
  font-size: 1.1rem;
  color: black;
  padding: 7px 0;
  background: transparent;
  transition: border-color 0.2s;' type='number' id='withdrawal_amount' name='amount'  max='10000' min='1' placeholder='Max is $10k' checked='other_accnum'></label>";

     echo "<br>";

     if(!empty($error_message)){
        
         echo"<label style='color:red;'>$error_message</label>";
     }

        echo "<input type='submit'name='submit'>";
    }
 */
?>


    
    </div>
</section>   
</form>
</body>
</html>
