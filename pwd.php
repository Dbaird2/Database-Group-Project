<?php
include_once("header.php");
if ($_SESSION['admin'] === FALSE || empty($_SESSION['admin']) || $_SESSION['admin'] == 0) {
    header("location: index.php");
    exit();
}
/*function generateRandomPassword($length = 12) {
    $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()';
    $password = '';
    for ($i = 0; $i < $length; $i++) {
        $password .= $characters[random_int(0, strlen($characters) - 1)];
    }
    return $password;
}*/
require_once 'includes/dbms.inc.php';

ini_set('display_erros', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$passwords = [
    "d7a1e2f3b4c8d5f1",
    "f9b7c6a3e1d4a8f2",
    "e6d2f8b1c5a4b7e9",
    "c9f4e2a1d6b3e8a5",
    "a3e7b5f2d9c8e1a4",
    "b4d6f1a9e2c3e8f7",
    "e1c5d7a3f8b4a2f9",
    "f2b8e6a4c9d3f7e1",
    "d4e9c5b1f2a7e8a3",
    "c8f3a1d7b6e2f9e4",
    "a9e1d8b4c6f2f7a5",
    "b5c3e7a9f4d2e1f8",
    "e2d1b6a5c8f9e7a4",
    "d7e8c4b1f3a9e6a2",
    "a4b9f1e2d3c7e8f5",
    "b6f2a3d1e9c5a8e7",
    "e7c8d4b5f1a2e9a3",
    "f3a9e1d2c6b8e4a7",
    "d8e4b3a5f7c9e2f1",
    "c5b7e6a1f2d9e8a4",
    "a1d4f9e2b3c8e7f5",
    "b8e9c5a2f7d6e3a1",
    "e3f1a7d8b4c6e9a5",
    "d6a4e8f3b9c1e7a2",
    "c2b5e9d4a8f1e7a3",
];
$users = ["Dtrump", "Shaggy17", "Scooby55", "Velma15", "Daphne16", "Fred17", "JD001", "LL34", "DLrizz", "pepapig", "MiGente", "goofygoober", "superrobert9", "heisenbergnm", "proctologist", "anitasmith11","bob", "john17", "mortj", "gwill", "toxicmasculinityisdead", "tinflower", "elvenoracle", "archdevil667", "theball"];
$pwd12345 = 12345;
$hashed12345 = password_hash($p12345, PASSWORD_DEFAULT);
for ($i = 0; $i < 25; $i++) {
    $user = $users[$i];
    $password = $passwords[$i]; 
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);  // Hash the password

    // Store the unhashed and hashed password pair
    $updateQuery = "UPDATE bank_user SET pwd = ?, unhash_pwd = ? WHERE uid = ?";
    $updateStmt = $connection->prepare($updateQuery);
    $updateStmt->execute([$hashedPassword, $password, $user]);

    // Optionally, store or display the new password for each user
    echo "<br>{$user} has password: {$password}\n";
}
?>
<pre>
<?php
?>
</pre>
