<?php
    include_once ("header.php");
    require_once 'includes/dbms.inc.php';
    if ($_SESSION['uid'] == FALSE || empty($_SESSION['uid'])) {
        header("location: index.php");
    }
?>
<style>

.sibling-fade { visibility: hidden; }
/* Prevents :hover from triggering in the gaps between items */

.sibling-fade > * { visibility: visible; }
/* Brings the child items back in, even though the parent is `hidden` */

.sibling-fade > * { transition: opacity 150ms linear 100ms, transform 150ms ease-in-out 100ms; }
/* Makes the fades smooth with a slight delay to prevent jumps as the mouse moves between items */

.sibling-fade:hover > * { opacity: 0.4; transform: scale(0.9); }
/* Fade out all items when the parent is hovered */

.sibling-fade > *:hover { opacity: 1; transform: scale(1); transition-delay: 0ms, 0ms; }
/* Fade in the currently hovered item */







/* Presentational Styles */

.sibling-fade {
    text-align:center;
  display: flex;
  width:20%;
  height:1%;
  align-items:center;
}

.sibling-fade > * {
  background: #4CAF50;
  padding: 1em;
  flex: auto;
  margin: 0.3em;
  text-align: center;
  color: white;
  font-size: 1.5em;
  text-decoration: none;
}

/**/
    </style>

<section>
 <header>
        <h2>Choose a Transaction</h2>
    </header>
<div class="sibling-fade">
  <a href="deposit.php">Deposit</a>
  <a href="withdrawMoney.php">Withdrawal</a>
  <a href="transfer.php">Transfer</a>
</div>
</section>
<!--<section>
    <h2>Account Deposit/Withdrawal</h2>
    <ul>
        <li><a href="deposit.php">Deposit</a></li>
        <li><a href="withdrawMoney.php">Withdrawal</a></li>
        <li><a href="transfer.php">Transfer</a></li>
    </ul>
</section>-->


<?php
    include_once("footer.php");
?>
