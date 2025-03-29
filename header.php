<?php
session_start();
require_once "includes/dbms.inc.php";
$query = $connection->prepare("select * from bank_info");
$query->execute();
$row = $query->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>BAMS</title>
    <link rel="stylesheet" href="css/style.css"> 
</head>
<body>
    <nav>
        <div style="margin-right:1%;" class="wrapper">
        <h2><?php echo $row['bank_name'];?><i class='bx bxs-bank'></i></h2>  
            <ul>

<?php
if (isset($_SESSION['id'])) {
    echo "<li style='display: flex;
    justify-content: space-evenly; 
    padding: 0;
    margin: 0;'><a href='logout.php'>Logout</a></li>";
    
    echo "<li style='display: flex;
    justify-content: space-evenly; 
    padding: 0;
    margin: 0;'><a href='account.php'>Account</a></li>";
    
    echo "<li style='display: flex;
    justify-content: space-evenly; 
    padding: 0;
    margin: 0; margin-left:-3vh;'><a href='bankAccount.php'>Bank Accounts</a></li>";
    
    echo "<li style='display: flex;
    justify-content: space-evenly; 
    padding: 0;
    margin: 0;'><a href='banking.php'>Banking</a></li>";
    
    echo "<li style='display: flex;
    justify-content: space-evenly; 
    padding: 0;
    margin: 0;'><a href='aboutUs.php'> About Us</a></li>";
} else {
    echo "<li style='display: flex;
    justify-content: space-evenly; 
    padding: 0;
    margin: 0;'><a href='login.php'>Login</a></li>";

    echo "<li style='display: flex;
    justify-content: space-evenly; 
    padding: 0;
    margin: 0;'><a href='signup.php'>Signup</a></li>";

    echo "<li style='display: flex;
    justify-content: space-evenly; 
    padding: 0;
    margin: 0;'><a href='aboutUs.php'> About Us</a></li>";
}
?>
                <li style="display: flex;
    justify-content: space-evenly; 
    padding: 0;
    margin: 0;"><a href="index.php">Home</a></li>
                
<?php
if (isset($_SESSION['admin']) && $_SESSION['admin'] != FALSE) {
    echo "<li style='float:left;'><a href='admin.php'>Admin</a></li>";
}
?>
            </ul>
        </div>
    </nav>


