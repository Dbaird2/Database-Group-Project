<?php

include_once ("header.php");

?>
<style>
/*.container {
    display: flex;
    justify-content: space-between; 
    width: 100%; 
}

.left-text, .right-text {
    display: block; 
    text-align: left; 
}

.right-text {
    display: flex;
    flex-direction: column;
    text-align: right; 
}
*/
.container {
  display: flex;
  justify-content: space-between; /* Push the left and right items to the ends */
  width: 100%; /* Full width of the parent */
}

.left-text {
  display: block;
  text-align: left; /* Align left text to the left */
}

.right-text {
  display: flex;
  flex-direction: column; /* Stack items vertically inside the right container */
  text-align: right; /* Align text to the right side */
}

.right-item {
    text-align:left;
  /* Any additional styling for the individual right items */
}
</style>

<!--<div class="container">
  <span class="left-text">
<br><b style="margin-left:10%">Features</b><br>
1. The ability to deposit money limit of 10k<br>
2. The ability to withdraw money limit of 10k<br>
3. The ability to transfer money from once account to another based off accnum<br>
4. Show Total Transaction Amounts (VIEW 4)<br>
5. Update pending depending on the amount of days past. (1 day)<br>
6. Make excess money from checkings go into your savings based off of settings?<b> OPTIONAL</b><br>
7. Create passwords for all accounts hashed and unhashed<br>
<s>Update transactions when features 1,2,3 are made</s><br>
<s>Create a receipt page/table for transactions?</s><br>
<s>Have the user be able to change account details. Password,Uid,Email,Phone,Address</s><br>
<s> Make admin account that can delete, modify transaction amounts, and account balance</s><br>
<s>Make deleting your account an option but create a backup in a history table</s> <br>
<s>Show Financial Rankings (VIEW 3)</s><br>
<s>Signup Accounts (INSERT PROCEDURE)</s><br>
<s>Show monthly spending (SELECT PROCEDURE)</s><br>

</span>
  <span class="right-text"><br><b style="margin-right:10%;">Page Checks</b><br>
1. If user/admin only page check if non signed in user can type in the url.<br>
2. If numbers: Check for negative values.<br>
3. If based off acounts check: If no account, 1 Checkings, 1 Savings, Both.<br>
4. If text input check: If {info} OR '1=1'.<br>

</span>-->
<div class="container">
  <div class="left-text">
<br><b style="margin-left:10%">Features</b><br>
1. The ability to transfer money from once account to another based off accnum<br>
2. Make excess money from checkings go into your savings based off of settings?<b> OPTIONAL</b><br>
<s>Update pending depending on the amount of days past. (1 day)</s><br>
<s>Update transactions when features 1,2,3 are made</s><br>
<s>Create a receipt page/table for transactions?</s><br>
<s>Have the user be able to change account details. Password,Uid,Email,Phone,Address</s><br>
<s> Make admin account that can delete, modify transaction amounts, and account balance</s><br>
<s>Make deleting your account an option but create a backup in a history table</s> <br>
<s>Show Financial Rankings (VIEW 3)</s><br>
<s>Signup Accounts (INSERT PROCEDURE)</s><br>
<s>Show monthly spending (SELECT PROCEDURE)</s><br>
<s>Create passwords for all accounts hashed and unhashed</s><br>
<s>The ability to deposit money limit of 10k</s><br>
<s>The ability to withdraw money limit of 10k</s><br>

  </div>

  <div class="right-text">
        <div style="margin-left:7%;" class="right-item"><br><b>Page Checks</b></div>
        <div class="right-item">1. If user/admin only page check if non signed in users can type in the url for access</div>
        <div class="right-item">2. If numbers: Check for negative values AND if the account has enough funds.</div>
        <div class="right-item">3. If based off acounts check: If no account, 1 Checkings, 1 Savings, Both.</div>
        <div class="right-item">4. If text input check: If {info} OR '1=1'.</div>
  </div>
</div>
</div>

