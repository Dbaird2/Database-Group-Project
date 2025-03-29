<?php
    include_once ("header.php");
    require_once 'includes/dbms.inc.php';
    include_once ("includes/functions.inc.php");
    ini_set('display_errors', 1);
    ini_set('display_all_errors', 1);
    error_reporting(E_ALL);

    if ($_SESSION['uid'] == FALSE || empty($_SESSION['uid'])) {
        header("location: index.php");
    }
    if (isset($_POST['submit1'])){
        $accnum = $_POST['accnum'];
        $query = $connection->prepare("DELETE FROM account WHERE accnum=?");
        $query->execute([$accnum]);
    }
?>

<section id="accountInfo">
    <h2>Account Information</h2>
    <?php
        $uid = $_SESSION['uid'];
        $query = "SELECT * FROM bank_user WHERE uid=?";
        $result = $connection->prepare($query);
        $result->execute([$uid]);
        $row = $result->fetch(PDO::FETCH_ASSOC);
        if(is_null($row)) {
            echo "<h3>Error Displaying account information</h3>";
        } else {
            $f_name = $row['first_name'];
            $l_name = $row['last_name'];
            $email = $row['email'];
            $dob = $row['dob'];
            $address = $row['address'];
            $phone = $row['phone'];
            echo "<div class='info'>";
            echo "<div class='elements'><b>Username</b>:<a href='changeInfo.php?change=username'>$uid</a></div>";
            echo "<div class='elements'><b>First Name</b>: $f_name</div>";
            echo "<div class='elements'><b>Last Name</b>: $l_name</div>";
            echo "<div class='elements'><b>Email</b>: $email</div>";
            echo "<div class='elements'><b>Date of Birth</b>:<a href='changeInfo.php?change=DateofBirth'>$dob</a></div>";
            echo "<div class='elements'><b>Address</b>:<a href='changeInfo.php?change=address'>$address</a></div>";
            echo "<div class='elements'><b>Phone Number</b>:<a href='changeInfo.php?change=phone'>$phone</a></div>";
            $query = "SELECT * FROM account WHERE uid=?";
            $result = $connection->prepare($query);
            $result->execute([$uid]);
            $row = $result->fetchAll(PDO::FETCH_ASSOC);
            if ($row) {
                foreach($row as $rows) {
                    $accname = $rows['accname'];
                    $accnum = $rows['accnum'];
                    echo "<form method='POST' action='account.php'>
                        <label style='margin-top:-3%;float:right;display:flex;flex-direction:column;'>$accname: <input type='submit' name='submit1' value='Delete Account'></label>
                        <input type='hidden' name='accnum' value='$accnum'>
                        </form>";
                }

            }
            echo "<a style='color:green;margin-top:2%;' href='changePwd.php' id='changePwd'>Change Passwords</a><br>";
?>
            <form action='account.php' method='post'>
            <button style="width:20%;margin-top:2%;" type='submit' name='submit'>Delete Account</button>
<?php  
            echo "</div>";
            if (isset($_POST['submit'])) {
                $delete = $connection->prepare("update bank_user set status = FALSE where uid = ?");
                $delete->execute([$_SESSION['uid']]);
                header("location: logout.php");
                exit();
            }
        }
?>
</section>
        
<?php
        include_once("footer.php");
?>
