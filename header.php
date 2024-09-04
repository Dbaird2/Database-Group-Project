<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Database Project Proto</title>
    <link rel="stylesheet" href="css/style.css"> 
</head>
<body>
    <nav>
        <div class="wrapper">
        <h2>Bank of Student Debt <i class='bx bxs-bank'></i></h2>  
        <div class="darkButton">
            <button class="text-to-change" onclick="myFunction()">Dark Mode ON/OFF</button> 
        </div>
            <ul>

                <?php
                if ($_SESSION['uid'] == 2) {
                        echo "<li><a href='logout.php'>Logout</a></li>";
                        echo "<li><a href='profile.php'>Profile</a></li>";
                    } else {
                        echo "<li><a class='text-to-change' href='login.php'>Login</a></li>";
                        echo "<li><a class='text-to-change' href='signup.php'>Signup</a></li>";
                    }
                ?>
                <li><a class="text-to-change" href="index.php">Home</a></li>
            </ul>
        </div>
    </nav>