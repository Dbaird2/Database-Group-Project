<?php
    include_once ("header.php");
?>
<p><b>Both account types</b> have a max deposit of <b>$10,000</b> when creating the account</p>
<section id="create-page" >
    <h2>Create Checking Account</h2>
    <ul>
        <form action="includes/createCheckingAccount.inc.php" method="post">
            <label>Account Checkings Name: </label>
            <input style='width:20%;border: 2px solid #333;border-radius: 8px;' type="text" name="accname" placeholder="Account Name...">
            <label>Amount: </label>
            <input style='width:20%;' type="number" step="0.01" name="deposit" placeholder="Initial deposit...">
            <button style='width:20%;' type="submit" name="submit">Create Checking Account</button>
        </form>
    </ul>

</section>

<section id="create-page" >
    <h2>Create Saving Account</h2>
    <ul>
        <form action="includes/createSavingAccount.inc.php" method="post">
            <label>Account Savings Name: </label>
            <input type="text" name="accname" placeholder="Account Name...">
            <label>Amount: </label>
            <input type="number"  step="0.01" name="deposit" placeholder="Initial Deposit...">
            <button style='width:20%;' type="submit" name="submit">Create Saving Account</button>
        </form>
    </ul>

</section>
