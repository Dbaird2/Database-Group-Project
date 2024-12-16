<?php

include_once("header.php");
require_once 'includes/dbms.inc.php';

if ($_SESSION['uid'] == FALSE || empty($_SESSION['uid'])) {
	header("location: index.php");
}

if (isset($_POST["submit"])) {

    if (!empty($_POST['uid'])){
        $uid = htmlspecialchars($_POST['uid']);
        $uidExist = $connection->prepare("select uid from bank_user where uid = ?");
        if (!$uidExist->execute([$uid])) {
            header("location: ../~bams/changeInfo.php?change=username");
            print_r($connection->errorInfo(), true);
            echo "Error executing update query<br>";
        }
        $rows = $uidExist->fetchAll(PDO::FETCH_ASSOC);
        $check = $rows[0]['uid'];
        if ($check == $uid) {
            echo "<p>Username Taken</p>";
            header("location: ../~bams/changeInfo.php?change=username&error=usernameUnavailable");
        } else {
            $query = $connection->prepare("update bank_user set uid = ? where uid = ?"); 
            $query->execute([$uid, $uid]);
            header("location: account.php");
            exit();
        }
    } 
    if (!empty($_POST['email'])){
        $email = htmlspecialchars($_POST['email']);
        $uid = $_SESSION['uid'];
        $emailExist = $connection->prepare("select * from bank_user where email = ?");
        if (!$emailExist->execute([$email])){
            echo "Error executing update query<br>";
            print_r($connection->errorInfo(), true);
            header("location: ../~bams/changeInfo.php?change=email");
        }
        $rows = $emailExist->fetchAll(PDO::FETCH_ASSOC);
        $yes = $rows[0]['email'];
        if ($yes == $email) {
            header("location: ../~bams/changeInfo.php?change=email&error=emailTaken");
        }
        else {
            $query = $connection->prepare("update bank_user set email = ? where uid = ?"); 
            $query->execute([$email, $uid]);
            header("location: ../~bams/account.php?error=none");
            exit();
        }
    } 
    if (!empty($_POST['dob'])){
        $dob = htmlspecialchars($_POST['dob']);
        $today_date = new DateTime();
        $today_date = date_format($today_date, 'Y-m-d');
        $difference = strtotime($today_date) - strtotime($dob);
        if ($difference < 568060000) {
            header("location: changeInfo.php?change=DateofBirth&error=tooYoung");
            exit();
        }
        $uid = $_SESSION['uid'];
        $query = $connection->prepare("update bank_user set dob = ? where uid = ?"); 
        $query->execute([$dob, $uid]);
        header("location: account.php");
        exit();
    } 
    if (!empty($_POST['address'])){
        $address = htmlspecialchars($_POST['address']);
        $uid = $_SESSION['uid'];
        $query = $connection->prepare("update bank_user set address = ? where uid = ?"); 
        $query->execute([$address, $uid]);
        header("location: account.php");
        exit();
    } 
    if (!empty($_POST['phone'])){
        $phone = htmlspecialchars($_POST['phone']);
        $uid = $_SESSION['uid'];
        $query = $connection->prepare("update bank_user set phone = ? where uid = ?"); 
        $query->execute([$phone, $uid]);
        header("location: account.php");
        exit();
    }
} 

?>
<section class="changeInfo">
<form action="<?=$_SERVER['PHP_SELF'] ?>" method="POST">
<?php
if($_GET['change'] == 'username') {
?>
<label>Change Username: </label><input style="border-radius: 4px;margin-bottom:0.5%;background:transparent;font-family: inherit;
  width: 20%;
  border: 0;
  border-bottom: 2px solid gray;
  outline: 0;
  font-size: 1.1rem;
  color: black;
  padding: 7px 0;
  background: transparent;
  transition: border-color 0.2s;" type="text" name="uid" placeholder="Change Username"><br>
<?php
}

if($_REQUEST['change'] == 'email'){
?>
<label>Change Email: </label><input type="text" name="email" placeholder="Change Email"><br>
<?php
}

if($_REQUEST['change'] == 'DateofBirth'){
?>
<label>Change Date of Birth: </label><input style="font-family: inherit;
  width: 20%;
  border: 0;
  border-bottom: 2px solid gray;
  outline: 0;
  font-size: 1.1rem;
  color: black;
  padding: 7px 0;
  background: transparent;
  transition: border-color 0.2s;" type="text" name="dob" maxlength="10" oninput="formatDate(this)" placeholder="yyyymmdd"><br>
<?php
}

if($_REQUEST['change'] == 'address'){
?>
<label>Change Address: </label><input style="font-family: inherit;   width: 20%;   border: 0;   border-bottom: 2px solid gray;   outline: 0;   font-size: 1.1rem;   color: black;   padding: 7px 0;   background: transparent;   transition: border-color 0.2s;" type="text" name="address" placeholder="Change Address"><br>
<?php
}

if($_REQUEST['change'] == 'phone'){
?>
<label>Change Phone Number: </label><input style="font-family: inherit;   width: 20%;   border: 0;   border-bottom: 2px solid gray;   outline: 0;   font-size: 1.1rem;   color: black;   padding: 7px 0;   background: transparent;   transition: border-color 0.2s;" type="text" name="phone" maxlength="12" oninput='addDashesPhone(this)' placeholder="XXXXXXXXXX"><br>
<?php
}
?>
<button style="width:20%;" type="submit" name="submit">Submit</button>
</section>
<script>
function addDashesPhone(input) {
    const value = input.value.replace(/[^0-9]/g, '');
    const parts = [];

    if (value.length > 0) parts.push(value.slice(0,3));
    if (value.length > 3) parts.push(value.slice(3,6));
    if (value.length > 6) parts.push(value.slice(6,10));

    input.value = parts.join('-');
}
function formatDate(input) {
    const value = input.value.replace(/[^0-9]/g, '');
    const parts = [];

    if (value.length > 0) parts.push(value.slice(0,4));
    if (value.length > 4) parts.push(value.slice(4,6));
    if (value.length > 6) parts.push(value.slice(6,8));

    input.value = parts.join('-');
}
</script>
<?php
if ($_GET['error'] == 'emailTaken') {
    echo "<p>Email in use</p>";
} 
else if ($_GET['error'] == 'usernameUnavailable') {
    echo "<p>Username Unavailable</p>";
}


include_once("footer.php");
?>
