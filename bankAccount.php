<?php
include_once ("header.php");
include_once ("sidebar.php");
$connection2 = new mysqli('localhost', 'root', '', 'testdb');
?>
<nav class="stuff">
        <a href="createAccount.php">Don't have a checking or saving account?</a>
    </nav>

    <section id="checking" class="account-section">
        <h2>Checking Account</h2>
        <ul>
            <?php
            $uid = $_SESSION['uid'];
            if(isset($uid)) {
                $query = "SELECT * FROM account WHERE uid = '$uid' and type='checking' and accnum='1'";
                $result = $connection2->query($query);
                $row = $result->fetch_assoc();
                if (is_null($row)) {
                    echo "<li><b>You have not yet made a checking account.</b></li>";
                } else {
                    $checkingBalance = $row['amt'];
                    echo "<li><b>Balance: $$checkingBalance</b></li>";
                }
                $result->free();
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
                $query = "SELECT * FROM account WHERE uid = '$uid' and type='saving' and accnum='1'";
                $result = $connection2->query($query);
                $row = $result->fetch_assoc();
                #$savingBalance =$row['amt'];
                if ((is_null($row))) {
                    echo "<li><b>You have not yet made a savings account.</b></li>";
                } else {
                    $savingBalance =$row['amt'];
                    echo "<li><b>Balance: $$savingBalance</b></li>";
                }
                $result->free();
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

    
<?php
    $connection2->query($query);
    $connection2->close();
    include_once("footer.php");
?>