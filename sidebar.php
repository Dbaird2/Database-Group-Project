<?php
    session_start();
?>
<div class="container">
    <aside class="sidebar">
        <div class="dropdown">
            <button class="dropbtn">Personal<i id="dropArrow" class='bx bx-chevron-down'></i></button>
            <div class="dropdown-content">
                <?php
                    if ($_SESSION['uid'] == 2) {
                    echo "<a href='account.php'>Account<i class='bx bxs-user-account' ></i></a>";
                    echo "<a href='index.php'>Credit Cards<i class='bx bx-credit-card' ></i></a>";
                    echo "<a href='index.php'>Checkings<i class='bx bx-wallet-alt' ></i></a>";
                    echo "<a href='index.php'>Savings<i class='bx bx-wallet' ></i></a>";
                    echo "<a href='index.php'>Loans?<i class='bx bx-down-arrow-alt' ></i><i class='bx bx-money' >?</i></a>";
                    } else {
                        echo "<a href='login.php'>Login</a>";
                    }
                ?>
            </div>
        </div>
            <a href="aboutUs.php">About Us</a>
        </div>
        
    </aside>
</div>