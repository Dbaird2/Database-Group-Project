<?php
    include_once("header.php");
?>

<section class="login-form">
    <div class="login-form-form">
        <form action="includes/login.inc.php" method="post">
            <input type="text" name="uid" placeholder="Username/Email">
            <input type="password" name="pwd" placeholder="Password">
            <button type="submit" name="submit">Login</button>
        </form>
    </div>
</section>

<?php
    include_once("footer.php");
?>