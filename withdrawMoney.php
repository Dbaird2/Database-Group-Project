<?php
    include_once("header.php");
    include_once 'includes/dbms.inc.php';

    if(isset($_POST["uid"]) && ($_POST["uid"] != FALSE)){
        header("location: index.php");
        exit();
    }

    //ini_set('display_errors', 1);
    //ini_set('display_startup_errors', 1);
    //error_reporting(E_ALL);

    $uid=$_SESSION['uid'] ?? null;
    $error_message = "";
    if(isset($_POST["submit"]) ){

        
        $amount_to_withdraw = ($_POST["amount"]);
        $accnum = ($_POST["accnum"]);
        $userbalance = ($_POST['balance']);

        if($amount_to_withdraw < 0){
            $error_message = "Withdrawal amount must be more than 0.";

        }else if($amount_to_withdraw > $userbalance){
            $error_message = "Not enough funds in selected account.";
        }
        else{
        
        //echo$amount_to_withdraw;
        //echo$accnum;
        $query = $connection->prepare("INSERT into transactions (uid, other_accnum, trans_type, acc_type, accnum, amt) values(?,?,?,?,?,?) ");
        $query->execute([$uid, $accnum, 'Withdrawal', 'Account', $accnum, $amount_to_withdraw]);

        header('location: transactionCompletePage.php');
        exit();
        }
    }

    

?>


<html>
<section id = "chosen_account" class = "chosen_account">

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
<div class="b" style="text-align:center" style="line-height:0.5cm" style="margin-bottom:0" style="margin-top:0" style="padding:0">
<h2 style='margin-bottom:-2%;'> Withdrawal </h2><br>
<form method="POST" action= "withdrawMoney.php">
   
<?php


    $query = $connection->prepare("SELECT balance, accname, accnum FROM account WHERE uid = ?");
    $query->execute([$uid]);
    $rows = $query->fetchAll(PDO::FETCH_ASSOC);
    
    if(!$rows){
     echo "<label> No Checkings or Savings accounts found </label>";

        
    }
    else{
     echo "<label> Please select account </label>";
     //echo "<br>";
     echo"<div style='display:flex;flex-direction:column;align-items;center;'>";
     foreach($rows as $row){
            $accname = $row["accname"];
            $accnum = $row["accnum"];
            $userbalance = $row['balance'];

            echo"<label ><input type='radio' name='accname' value=$accname>$accname</label>";

            echo"<input type='hidden' name='accnum' value=$accnum>";
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
  transition: border-color 0.2s;' type='number' id='withdraw_amount' name='amount'  max='10000' min='1' placeholder='Max is $10k' checked='selected_account'></label>";

     echo "<br>";

     if(!empty($error_message)){
        
         echo"<label style='color:red;'>$error_message</label>";
     }

        echo "<input type='submit'name='submit'>";
    }

?>


    
    </div>
</section>   
</form>
</body>
</html>
