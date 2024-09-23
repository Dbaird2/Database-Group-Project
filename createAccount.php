<?php
    include_once ("header.php");
    include_once ("sidebar.php");
?>
<p>Opening a <b>Savings account</b> requires a minimum of $100 deposit. <b>Both account type</b> have a max deposit of <b>$1,000</b></p>
<section id="create-page" >
    <h2>Create Checking Account</h2>
    <ul>
        <form action="includes/createCheckingAccount.inc.php" method="post">
            <input type="text" name="accname" placeholder="Account Name...">
            <input type="text" name="deposit" placeholder="Initial deposit...">
            <button type="submit" name="submit">Create Checking Account</button>
        </form>
    </ul>

</section>

<section id="create-page" >
    <h2>Create Saving Account</h2>
    <ul>
        <form action="includes/createSavingAccount.inc.php" method="post">
            <input type="text" name="accname" placeholder="Account Name...">
            <input type="text" name="deposit" placeholder="Initial Deposit...">
            <button type="submit" name="submit">Create Saving Account</button>
        </form>
    </ul>

</section>