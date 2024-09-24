<?php
    include_once ("header.php");
    require_once 'includes/dbms.inc.php';

?>

<section id="accountInfo">
    <h2>Account Information</h2>
    <?php
        $uid = $_SESSION['uid'];
        $query = "SELECT * FROM bank_user WHERE uid='$uid'";
        $result = $connection->query($query);
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
            echo "<div class='elements'><b>Username</b>:$uid</div>";
            echo "<div class='elements'><b>First Name</b>:$f_name</div>";
            echo "<div class='elements'><b>Last Name</b>:$l_name</div>";
            echo "<div class='elements'><b>Email</b>:$email</div>";
            echo "<div class='elements'><b>Date of Birth</b>:$dob</div>";
            echo "<div class='elements'><b>Address</b>:$address</div>";
            echo "<div class='elements'><b>Phone Number</b>:$phone</div>";
            echo "<a href='changePwd.php'>Change Passwords</a>";
            echo "</div>";
        }
    ?>
</section>