<?php
include_once ("header.php");
try {
    $connection = new PDO('mysql:host=localhost;dbname=testdb', 'root', '');

    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $error) {
    die('Connection failed: ' . $error->getMessage());
}
?>
<div class="stuff">
        <a href="createAccount.php"><b>Don't have a checking or saving account?</b></a>
</div>
        <?php
        $uid = $_SESSION['uid'];
        if(isset($uid)) {
            $nRows = $connection->query("SELECT COUNT(*) FROM account WHERE uid='$uid' AND type='Checking'")->fetchColumn(); 
            $query = "SELECT * FROM account WHERE uid = :uid AND type='Checking'";
            $statement = $connection->prepare($query);
            $statement->bindParam(':uid', $uid);
            $statement->execute();
            $row = $statement->fetchAll(PDO::FETCH_ASSOC);
            for($i = 0; $i < $nRows; $i++) {
                echo "<section id='checking' class='account-section'>";
                if ($row[$i]) {
                    $accname = $row[$i]['accname'];
                    echo "<h2>$accname Account</h2>";

                    echo "<ul>";
                    $checkingBalance = $row[$i]['amt'];
                    echo "<li style='margin-bottom:1%'><b>Balance: $$checkingBalance</b></li>";
                    $accnum = $row[$i]['accnum'];
                    echo "<li style='margin-bottom:1%'><b>Account Number:</b> $accnum</li>";
                    $acctype = $row[$i]['type'];
                    echo "<li><b>Account Type:</b> $acctype</li>";
                }
                    
                if (!$row) {
                    echo "<h2>Checking Account</h2>";
                    echo "<ul>";
                    echo "<li><b>You have not yet made a checking account.</b></li>";
                    break;
                }
                echo "</ul>";
                echo "</section>";
            }
        }
            ?>
    </section>

    <section id="savings" class="account-section">
        <?php
            if(isset($uid)) {
                $query = "SELECT * FROM account WHERE uid = '$uid' and type='Saving'";
                $result = $connection->query($query);
                $row = $result->fetch(PDO::FETCH_ASSOC);
                if ($row){
                    $accname = $row['accname'];
                    echo "<h2>$accname Account</h2>";

                    echo "<ul>";
                    $savingBalance =$row['amt'];
                    echo "<li style='margin-bottom:1%'><b>Balance: $$savingBalance</b></li>";
                    $accnum = $row['accnum'];
                    echo "<li style='margin-bottom:1%'><b>Account Number:</b> $accnum</li>";
                    $acctype = $row['type'];
                    echo "<li><b>Account Type:</b> $acctype</li>";
                }   else if (!$row) {
                    echo "<h2>Saving Account</h2>";
                    echo "<ul>";

                    echo "<li><b>You have not yet made a savings account.</b></li>";
                }
            } else {
                echo "<li><b>Error getting saving account information please do not call</b></li>";
            }
            ?>
        </ul>
    </section>

    <section id="transfer" class="account-section">
        <a href="transfer.php">Transfer money.</a>
        <p>Feature does not work currently</p>
    </section>

    <section id="transactions" class="account-section">
        <a href="transactions.php">View All Transactions</a>
        <p><b>Recent Transactions</b></p>
        <section id="trans-hist" class="account-section">
            <?php
                $query = "SELECT * FROM transactions WHERE uid='$uid' ORDER BY Trans_ID DESC";
                $result = $connection->query($query);
                $row = $result->fetch(PDO::FETCH_ASSOC);
                $row2 = $result->fetch(PDO::FETCH_ASSOC);
                $row3 = $result->fetch(PDO::FETCH_ASSOC);
                if(!$row){
                    echo "<h4 style='text-align:center'>No Transaction History</h4>";
                } else {
                    $amt = $row['amt'];
                    $transType = $row['Trans_Type'];
                    $accnum = $row['accnum'];
                    $date = $row['timeStamp'];
                    echo "<div class='transaction-section'>";
                    echo "<div class='top-left'><h4>Transaction Type: $transType</h4></div>";
                    echo "<div class='top-right'><h4>Amount: $$amt</h4></div>";
                    echo "<div class='bottom-left'>Account Number: $accnum</div>";
                    echo "<div class='bottom-right'>$date</div>";
                    echo "</div>";
                }  
            ?>
        </section>
        <?php
            if (!$row2) {
            } else {
                echo "<section id='trans-hist' class='account-section'>";
                $amt = $row2['amt'];
                $transType = $row2['Trans_Type'];
                $accnum = $row2['accnum'];
                $date = $row2['timeStamp'];
                echo "<div class='transaction-section'>";
                echo "<div class='top-left'><h4>Transaction Type: $transType</h4></div>";
                echo "<div class='top-right'><h4>Amount: $$amt</h4></div>";
                echo "<div class='bottom-left'>Account Number: $accnum</div>";
                echo "<div class='bottom-right'>$date</div>";
                echo "</div>";
                echo "</section>";
            }
        ?>
        <?php
            if (!$row3) {
            } else {
                echo "<section id='trans-hist' class='account-section'>";
                $amt = $row3['amt'];
                $transType = $row3['Trans_Type'];
                $accnum = $row3['accnum'];
                $date = $row3['timeStamp'];
                echo "<div class='transaction-section'>";
                echo "<div class='top-left'><h4>Transaction Type: $transType</h4></div>";
                echo "<div class='top-right'><h4>Amount: $$amt</h4></div>";
                echo "<div class='bottom-left'>Account Number: $accnum</div>";
                echo "<div class='bottom-right'>$date</div>";
                echo "</div>";
                echo "</section>";
            }
            ?>
        </section>

    
<?php
    include_once("footer.php");
?>