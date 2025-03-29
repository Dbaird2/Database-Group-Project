<?php
include_once ("header.php");
include_once 'includes/dbms.inc.php';


if(isset($_POST["uid"]) && ($_POST["uid"] != FALSE)){
    header("location: index.php");
    exit();
}

$uid = $_SESSION["uid"] ?? null;
$error_message = "";
if(!$uid){
    echo "Error: User not logged in.";
    exit();
}

if(isset($_POST["submit"])){
    $amount_to_deposit = $_POST["amount"] ?? 0;
    $accnum = $_POST["accnum"] ?? null;

    if($amount_to_deposit < 1){
        $error_message = "Deposit amount must be at least $1.";
        /*echo("Deposit amount must be at least $1.");
        header("location: deposit.php");
        exit();*/
    }else{
    $query = $connection->prepare("INSERT INTO transactions (uid, other_accnum, trans_type, acc_type, accnum, amt) VALUES (?, ?, ?, ?, ?, ?)");
    $query->execute([$uid, $accnum, 'Deposit', 'Account', $accnum, $amount_to_deposit]);
    $query = $connection->prepare("CALL add_from_deposit(?, ?)");
    $query->execute([$accnum, $amount_to_deposit]);
    header('location: transactionCompletePage.php');
    exit();
    }
}

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deposit</title>
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
</head>
<body>
<div class="b" style="text-align:center;">
    <form method="POST" action= "deposit.php">
   
        <?php

        /*if(isset($_SESSION['error_message'])){
            echo "<div class='error_message'>" . $SESSION['error_message'] . "</div>";
            unset($_SESSION['error_message']);
        }

        if($amount_to_deposit < 1){
            $_SESSION['error_message'] = "Deposit amount must be at least $1.";
            //echo("Deposit amount must be at least $1.");
        }*/
        $query = $connection->prepare("SELECT accname, accnum FROM account WHERE uid = ?");
        $query->execute([$uid]);
        $rows = $query->fetchAll(PDO::FETCH_ASSOC);
    
        if(!$rows){
            
            echo "<section>";
            echo "<h2> Deposit </h2>";
            echo "<p> No Checking or Saving accounts found </p>";
            echo "</section>";

        
        }else{
            echo "<section>";
            echo "<h2> Deposit </h2>";
            echo "<label> Select an account </label>";
            echo"<div class='radio-group'>";
            foreach($rows as $row){
                $accname = htmlspecialchars($row["accname"]);
                $accnum = htmlspecialchars($row["accnum"]);

                echo"<label ><input type='radio' name='accnum' value='$accnum' required>$accname</label>";
            }
     
            echo"</div>";
            echo "<label>Amount to Deposit:</label>";
            echo "<input style ='font-family: inherit;
  width: 9%;
  border: 0;
  border-bottom: 2px solid gray;
  outline: 0;
  font-size: 1.1rem;
  color: black;
  padding: 7px 0;
  background: transparent;
  transition: border-color 0.2s;' type='number' min='1' step='0.01' name='amount'  max='10000' placeholder='Max $10k' required>";
            echo"<br>";
            if (!empty($error_message)){
                echo "<p style='color:red;'>$error_message</p>";
            }
            echo "<input type='submit' name='submit' value='Deposit'>";
            echo "</section>";
        }
        ?>
    
        </form>
    </div>
</body>
</html>

<?php
include_once ("footer.php");
?>
