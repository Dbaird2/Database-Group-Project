<?php

include_once ("header.php");
include_once ("sidebar.php");
?>
<div class="deposit-h2">
    <h2>A <b>minimum</b> of <b>$1</b> must be deposited</h2>
</div>
<section class="signup-form">
    <form action="includes/deposit.inc.php" method="post">
        <input type="text" name="name_of_account" placeholder="Account to deposit into">
        <input type="text" name="deposit_amt" placeholder="Amount to deposit">
        <button name="submit" type="submit">Place Deposit</button>
</form>
</section>

<?php
include_once ("footer.php");
?>