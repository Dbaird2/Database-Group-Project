<?php
include_once ("header.php");
include_once ("sidebar.php");
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

    <section id="checking" class="account-section">
        <h2>Checking Account</h2>
        <ul>
            <?php
            $uid = $_SESSION['uid'];
            if(isset($uid)) {
                $query = "SELECT * FROM account WHERE uid = :uid AND type='Checking' AND accnum='1'";
                $statement = $connection->prepare($query);
                $statement->bindParam(':uid', $uid);
                $statement->execute();
                $row = $statement->fetch(PDO::FETCH_ASSOC);
                if (!$row) {
                    echo "<li><b>You have not yet made a checking account.</b></li>";
                } else {
                    $checkingBalance = $row['amt'];
                    echo "<li><b>Balance: $$checkingBalance</b></li>";
                }
            } else {
                echo "<li><b>Error getting checking account information please do not call</b></li>";

            }
            ?>
        </ul>
    </section>

    <section id="savings" class="account-section">
        <h2>Savings Account</h2>
        <ul>
            <?php
            if(isset($uid)) {
                $query = "SELECT * FROM account WHERE uid = '$uid' and type='Saving' and accnum='1'";
                $result = $connection->query($query);
                $row = $result->fetch(PDO::FETCH_ASSOC);
                #$savingBalance =$row['amt'];
                if (!$row) {
                    echo "<li><b>You have not yet made a savings account.</b></li>";
                } else {
                    $savingBalance =$row['amt'];
                    echo "<li><b>Balance: $$savingBalance</b></li>";
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
                    echo "<h4>No Transaction History</h4>";
                } else {
                    $amt = $row['amt'];
                    $transType = $row['Trans_Type'];
                    $accType= $row['Acc_Type'];
                    $date = $row['timeStamp'];
                    echo "<div class='transaction-section'>";
                    echo "<div class='top-left'><h4>Transaction Type: $transType</h4></div>";
                    echo "<div class='top-right'><h4>Amount: $$amt</h4></div>";
                    echo "<div class='bottom-left'>Account Type: $accType</div>";
                    echo "<div class='bottom-right'>$date</div>";
                    echo "</div>";
                }  
            ?>
        </section>
        <section id="trans-hist" class="account-section">
            <?php
                if(!$row2){
                } else {
                    $amt = $row2['amt'];
                    $transType = $row2['Trans_Type'];
                    $accType= $row2['Acc_Type'];
                    $date = $row2['timeStamp'];
                    echo "<div class='transaction-section'>";
                    echo "<div class='top-left'><h4>Transaction Type: $transType</h4></div>";
                    echo "<div class='top-right'><h4>Amount: $$amt</h4></div>";
                    echo "<div class='bottom-left'>Account Type: $accType</div>";
                    echo "<div class='bottom-right'>$date</div>";
                    echo "</div>";
                }
            ?>
            </section>
        </section>
        <section id="trans-hist" class="account-section">
            <?php
                if(!$row3){
                } else {
                    $amt = $row3['amt'];
                    $transType = $row3['Trans_Type'];
                    $accType= $row3['Acc_Type'];
                    $date = $row3['timeStamp'];
                    echo "<div class='transaction-section'>";
                    echo "<div class='top-left'><h4>Transaction Type: $transType</h4></div>";
                    echo "<div class='top-right'><h4>Amount: $$amt</h4></div>";
                    echo "<div class='bottom-left'>Account Type: $accType</div>";
                    echo "<div class='bottom-right'>$date</div>";
                    echo "</div>";
                }
            ?>
            </section>
        </section>

    
<?php
    include_once("footer.php");
?>