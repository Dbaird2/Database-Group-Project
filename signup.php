<?php
    include_once("header.php");
?>

<section class="signup-form">
    <div class="signup-form-form">
    <h4><b>* Mandatory</b></h4>
        <form action="includes/signup.inc.php" method="post">
            <input type="text" name="first_name" placeholder="*First name">
            <input type="text" name="last_name" placeholder="*Last name">
            <input type="text" name="email" placeholder="*Email">
            <input type="text" name="uid" placeholder="*Username">
            <input type="text" name="dob" placeholder="*Date of Birth">
            <input type="text" name="address" placeholder="*Address">
            <input type="text" name="phone" placeholder="*Phone Number">
            <input type="password" name="pwd" placeholder="*Password">
            <input type="password" name="pwdr" placeholder="*Repeat password">
            <button type="submit" name="submit">Signup</button>
        </form>
    </div>
</section>

<?php
    if (isset($_GET["error"])) {
        if ($_GET["error"] == ["emptyinput"]){
            echo "<p>Did not fill all fields</p>";
        }
        if ($_GET["error"] == ["invalidUsername"]){
            echo "<p>Username not allowed</p>";
        }
        if ($_GET["error"] == ["invalidEmail"]){
            echo "<p>Invalid Email Account</p>";
        }
        if ($_GET["error"] == ["passwordsDoNotMatch"]){
            echo "<p>Passwords do not match</p>";
        }
        if ($_GET["error"] == ["usernameAlreadyExists"]){
            echo "<p>Username already exists.</p>";
        }
        if ($_GET["error"] == ["statementFailed"]){
            echo "<p>Statement failed</p>";
        }
        if ($_GET["error"] == ["none"]){
            echo "<p>You have signed up</p>";
        }
    }
?>

<?php
    include_once("footer.php");
?>