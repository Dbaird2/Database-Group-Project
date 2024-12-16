
<?php
include_once ("header.php");
require_once 'includes/dbms.inc.php';
require_once 'includes/functions.inc.php';

if ($_SESSION['uid'] == FALSE || empty($_SESSION['uid'])) {
	header("location: index.php");
}

if (isset($_POST["update"]) && !empty($_POST["old_pwd"]) && !empty($_POST["new_pwd"]) && !empty($_POST["retype"])) {
    $old_pwd = htmlspecialchars($_POST["old_pwd"]);
    $new_pwd = htmlspecialchars($_POST["new_pwd"]);
    $retyped = htmlspecialchars($_POST["retype"]);
    $uid = $_SESSION['uid'];
    echo "<br>before pwd==retype<br>";
    if ($new_pwd == $retyped) {
        echo "before connection<br>";        
        
        $query = $connection->prepare("select pwd from bank_user where uid= ?");
        $query->execute([$uid]);
        
        
        $row = $query->fetch(PDO::FETCH_ASSOC);
        $pwdHashed = $row['pwd'];

        $checkPwd = password_verify($old_pwd, $pwdHashed);
        
        if ($checkPwd) {

            $new_pwdHashed = password_hash($new_pwd, PASSWORD_DEFAULT);
            $query = $connection->prepare("update bank_user set pwd = ? where uid = ?");

            if(!$query->execute([$new_pwdHashed, $uid])){
                $insertMsg = "Error executing update query:<br>". print_r($query->errorInfo(), true);
            }

            header("location: ../~bams/index.php");
            exit();

        } else {
            echo "<br>Passwords do not match";
        }
    }
}
?> 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .change-password-container {
            max-width: 400px;
            margin: 50px auto;
            padding: 20px;
            background: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            color: #333333;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            font-weight: bold;
            color: #666666;
            display: block;
            margin-bottom: 5px;
        }
        input[type="password"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #cccccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        button[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: #ffffff;
            border: none;
            border-radius: 4px;
            font-size: 1em;
            cursor: pointer;
        }
        button[type="submit"]:hover {
            background-color: #45a049;
        }
        .message {
            text-align: center;
            margin-top: 15px;
        }
        .error {
            color: #D8000C;
        }
        .success {
            color: #4F8A10;
        }
    </style>
</head>

<div class="change-password-container">
    <h2>Change Password</h2>
    
    <form action="changePwd.php" method="post">
        <div class="form-group">
            <label for="old_pwd">Current Password:</label>
            <input type="password" id="current_password" name="old_pwd" required>
        </div>
        
        <div class="form-group">
            <label for="new_pwd">New Password:</label>
            <input type="password" minlength="8" id="new_password" name="new_pwd" required>
        </div>
        
        <div class="form-group">
            <label for="retype">Confirm New Password:</label>
            <input type="password" id="confirm_password" name="retype" required>
        </div>
        
        <button type="submit" name="update">Update Password</button>
    </form>
</div>

