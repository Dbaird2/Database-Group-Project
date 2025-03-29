<?php

    include("header.php");
ini_set('display_errors', 1);
ini_set('display_all_errors',1);
error_reporting(E_ALL);

    if((!isset($_SESSION['uid'])||$_SESSION['uid']==FALSE)&&(!isset($_SESSION['admin'])|| $_SESSION['admin']==FALSE)){

    }else{
        require_once('includes/dbms.inc.php');
        $uid=$_SESSION['uid'];
        $query = $connection->prepare("SELECT * FROM  transactions WHERE pending='Pending' HAVING DATEDIFF(NOW(), timeStamp) > 1");
        $query->execute();
        if($rows=$query->fetchAll(PDO::FETCH_ASSOC)){
            foreach($rows as $row){
                $trans_id=$row['trans_id'];
                $query2=$connection->prepare("UPDATE transactions SET pending=? WHERE trans_id = ?");
                $query2->execute(['Completed',$trans_id]);
            }
        }

    }
?>
<style>
@import url("https://fonts.googleapis.com/css2?family=Noto+Sans+Symbols+2&display=swap");
@import url("https://fonts.googleapis.com/css?family=Montserrat:400,700");
@import url("https://fonts.cdnfonts.com/css/segoe-script");
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}
html,
body {
  overscroll-behavior-x: none;
  overscroll-behavior-y: none;
}
.front-display{
}
html {
  font-size: 100%;
  -webkit-text-size-adjust: 100%;
  font-variant-ligatures: none;
  -webkit-font-variant-ligatures: none;
  text-rendering: optimizeLegibility;
  -moz-osx-font-smoothing: grayscale;
  font-smoothing: antialiased;
  -webkit-font-smoothing: antialiased;
}
body {
  position: relative;
  color: red;
  font-family: "Segoe Script", sans-serif;
  font-size: max(20px, 4vw);
  font-weight: 500;
  width: 100vw;
  min-height: 100vh;
  text-align: center;
  line-height: 1;
  overflow-x: hidden;
}
main {
  position: relative;
}
section {
    border-image: linear-gradient(transparent, rgba(0, 0, 0, 0.1)) 1;  /* Fading gradient */
    box-shadow: 0 0 40px 40px rgba(0, 0, 0, 0);  /* Fading shadow around the box */
    background-image: url("Untitled.jpg");
    background-size:cover;
    background-position:center;
    background-repeat:no-repeat;
  position: relative;
  top: 0;
  left: 0;
  width: 100vw;
  min-height: 100vh;
  overflow-x: hidden;
  overflow-y: visible;
  display: flex;
  justify-content: center;
  align-items: center;
}
h1 {
  font-family: "Montserrat", sans-serif;
  font-size: max(25px, 7vw);
  ont-weight: bold;
}
hr {
  margin: 0.5em 0;
  height: clamp(2px, 0.5vw, 5px);
  background-image: url(https://images.unsplash.com/photo-1605707157753-c723b9d5af4a?&ixid=M3wzMjM4NDZ8MHwxfHJhbmRvbXx8fHx8fHx8fDE2OTUxNDQ3MzB8&ixlib=rb-4.0.3&w=800&q=80&dpr=2);
  background-position: center;
  background-size: 400px auto; /* 必要に応じて調整 */
  background-repeat: repeat;
  border: 0.5px solid rgba(0, 0, 0, 0.1);
  border-radius: 5px;
  animation: bg1 10s linear infinite alternate both;
  filter: saturate(2.2);
}
.emoji {
  margin: 0.3em 0;
  font-family: sans-serif;
  font-size: 1.78rem;
  -webkit-text-stroke: 0.5px rgba(0, 0, 0, 0.3);
  text-stroke: 0.5px rgba(0, 0, 0, 0.3);
  color: transparent;
  background-clip: text;
  background-image: url(https://images.unsplash.com/photo-1605707157753-c723b9d5af4a?&ixid=M3wzMjM4NDZ8MHwxfHJhbmRvbXx8fHx8fHx8fDE2OTUxNDQ3MzB8&ixlib=rb-4.0.3&w=800&q=80&dpr=2);
  background-position: center;
  background-size: 200px auto; /* 必要に応じて調整 */
  background-repeat: repeat;
  transform: translateZ(0);
  animation: bg1 10s linear infinite alternate both;
  filter: saturate(3);
}
#copyright {
  font-size: 0.85rem;
}
#background {
  position: fixed;
  top: 0;
  left: 0;
  width: 100vw;
  height: 100vh;
  overflow: hidden;
  background-color: white;
  background-image: url(https://images.unsplash.com/photo-1615800098779-1be32e60cca3?crop=entropy&cs=srgb&fm=jpg&ixid=M3wzMjM4NDZ8MHwxfHJhbmRvbXx8fHx8fHx8fDE2OTUyNDAwMTN8&ixlib=rb-4.0.3&q=85);
  background-size: cover;
  background-repeat: no-repeat;
  user-select: none;
  pointer-events: none;
  z-index: -1;
}
#background > div {
  --size: 5vw;
  --symbol: "✽";

  --pos_x: 0vw;
  --duration_move: 7s;
  --delay_move: 0s;

  --duration_rotate: 1.5s;
  --delay_rotate: 0s;
  --duration_clip: 10s;
  --delay_clip: 0s;
  --hue: 0deg;

  position: absolute;
  top: 0;
  left: 0;
  font-size: clamp(15px, var(--size), 80px);
  font-family: "Noto Sans Symbols 2", sans-serif;
  transform-origin: center top;
  animation: move var(--duration_move) var(--delay_move) linear infinite normal
    both;
}
#background span {
  display: block;
  position: relative;
  transform-origin: center;
  transform: rotate(0deg);
  animation: rotate var(--duration_rotate) var(--delay_rotate) ease-in-out
    infinite alternate both;
}
#background span:after {
  content: var(--symbol);
  -webkit-text-stroke: 0.5px rgba(0, 0, 0, 0.2);
  text-stroke: 0.5px rgba(0, 0, 0, 0.2);
  line-height: 1.2;
  position: relative;
  display: block;
  color: transparent;
  background-clip: text;
  /*
  filter: contrast(0.8) brightness(1.2) hue-rotate(var(--hue))
    drop-shadow(0px 0px 0.1px gold);
  */
  filter: brightness(1.2) hue-rotate(var(--hue));
  background-image: url(https://images.unsplash.com/photo-1580822115965-0b2532068eff?&ixid=M3wzMjM4NDZ8MHwxfHJhbmRvbXx8fHx8fHx8fDE2OTUxNDUzNzJ8&ixlib=rb-4.0.3&q=100&w=200&dpr=2);
  background-position: center;
  background-size: 200px auto; /* 必要に応じて調整 */
  background-repeat: repeat;
  transform: translateZ(0);
  animation: bg1 var(--duration_clip) var(--delay_clip) linear infinite
    alternate both;
}
#background > div:nth-child(even) span:after {
  animation-name: bg2;
}
@keyframes bg1 {
  0% {
    background-position: 0% 0%;
  }
  100% {
    background-position: 100% 100%;
  }
}
@keyframes bg2 {
  0% {
    background-position: 100% 0%;
  }
  100% {
    background-position: 0% 100%;
  }
}
@keyframes rotate {
  0% {
    transform: rotate(115deg);
  }
  100% {
    transform: rotate(245deg);
  }
}
@keyframes move {
  0% {
    transform: translate3d(var(--pos_x), calc(0vh - var(--size)), 0);
  }
  100% {
    transform: translate3d(var(--pos_x), 100vh, 0);
  }
}

/* 以下、ひたすら量産 */
#background > div:nth-child(23n + 1) {
  --symbol: "🟄";
}
#background > div:nth-child(23n + 2) {
  --symbol: "❉";
}
#background > div:nth-child(23n + 3) {
  --symbol: "🟉";
}
#background > div:nth-child(23n + 4) {
  --symbol: "❈";
}
#background > div:nth-child(23n + 5) {
  --symbol: "✣";
}
#background > div:nth-child(23n + 6) {
  --symbol: "🞯";
}
#background > div:nth-child(23n + 7) {
  --symbol: "🟎";
}
#background > div:nth-child(23n + 8) {
  --symbol: "♦";
}
#background > div:nth-child(23n + 9) {
  --symbol: "✢";
}
#background > div:nth-child(23n + 10) {
  --symbol: "🞵";
}
#background > div:nth-child(23n + 11) {
  --symbol: "✤";
}
#background > div:nth-child(23n + 12) {
  --symbol: "✦";
}
#background > div:nth-child(23n + 13) {
  --symbol: "❇";
}
#background > div:nth-child(23n + 14) {
  --symbol: "🞻";
}
#background > div:nth-child(23n + 15) {
  --symbol: "✶";
}
#background > div:nth-child(23n + 16) {
  --symbol: "✳";
}
#background > div:nth-child(23n + 17) {
  --symbol: "❊";
}
#background > div:nth-child(23n + 18) {
  --symbol: "🟄";
}
#background > div:nth-child(23n + 19) {
  --symbol: "✻";
}
#background > div:nth-child(23n + 20) {
  --symbol: "❋";
}
#background > div:nth-child(23n + 21) {
  --symbol: "✷";
}
#background > div:nth-child(23n + 22) {
  --symbol: "✴";
}

#background > div:nth-child(21n + 1) {
  --pos_x: 5vw;
}
#background > div:nth-child(21n + 2) {
  --pos_x: 10vw;
}
#background > div:nth-child(21n + 3) {
  --pos_x: 15vw;
}
#background > div:nth-child(21n + 4) {
  --pos_x: 20vw;
}
#background > div:nth-child(21n + 5) {
  --pos_x: 25vw;
}
#background > div:nth-child(21n + 6) {
  --pos_x: 30vw;
}
#background > div:nth-child(21n + 7) {
  --pos_x: 35vw;
}
#background > div:nth-child(21n + 8) {
  --pos_x: 40vw;
}
#background > div:nth-child(21n + 9) {
  --pos_x: 45vw;
}
#background > div:nth-child(21n + 10) {
  --pos_x: 50vw;
}
#background > div:nth-child(21n + 11) {
  --pos_x: 55vw;
}
#background > div:nth-child(21n + 12) {
  --pos_x: 60vw;
}
#background > div:nth-child(21n + 13) {
  --pos_x: 65vw;
}
#background > div:nth-child(21n + 14) {
  --pos_x: 70vw;
}
#background > div:nth-child(21n + 15) {
  --pos_x: 75vw;
}
#background > div:nth-child(21n + 16) {
  --pos_x: 80vw;
}
#background > div:nth-child(21n + 17) {
  --pos_x: 85vw;
}
#background > div:nth-child(21n + 18) {
  --pos_x: 90vw;
}
#background > div:nth-child(21n + 19) {
  --pos_x: 95vw;
}
#background > div:nth-child(21n + 20) {
  --pos_x: 100vw;
}

#background > div:nth-child(12n + 1) {
  --hue: 30deg;
}
#background > div:nth-child(12n + 2) {
  --hue: 270deg;
}
#background > div:nth-child(12n + 3) {
  --hue: 90deg;
}
#background > div:nth-child(12n + 4) {
  --hue: 150deg;
}
#background > div:nth-child(12n + 5) {
  --hue: 330deg;
}
#background > div:nth-child(12n + 6) {
  --hue: 180deg;
}
#background > div:nth-child(12n + 7) {
  --hue: 60deg;
}
#background > div:nth-child(12n + 8) {
  --hue: 210deg;
}
#background > div:nth-child(12n + 9) {
  --hue: 120deg;
}
#background > div:nth-child(12n + 10) {
  --hue: 240deg;
}
#background > div:nth-child(12n + 11) {
  --hue: 300deg;
}

#background > div:nth-child(8n + 1) {
  --delay_move: -4s;
}
#background > div:nth-child(8n + 2) {
  --delay_move: -5s;
}
#background > div:nth-child(8n + 3) {
  --delay_move: -6s;
}
#background > div:nth-child(8n + 4) {
  --delay_move: -1s;
}
#background > div:nth-child(8n + 5) {
  --delay_move: -2s;
}
#background > div:nth-child(8n + 6) {
  --delay_move: -3s;
}
#background > div:nth-child(8n + 7) {
  --delay_move: -7s;
}

#background > div:nth-child(9n + 1) {
  --duration_move: 7.5s;
}
#background > div:nth-child(9n + 2) {
  --duration_move: 8s;
}
#background > div:nth-child(9n + 3) {
  --duration_move: 8.5s;
}
#background > div:nth-child(9n + 4) {
  --duration_move: 9s;
}
#background > div:nth-child(9n + 5) {
  --duration_move: 5.5s;
}
#background > div:nth-child(9n + 6) {
  --duration_move: 6s;
}
#background > div:nth-child(9n + 7) {
  --duration_move: 6.5s;
}
#background > div:nth-child(9n + 8) {
  --duration_move: 7.8s;
}

#background > div:nth-child(7n + 1) {
  --delay_rotate: 0.3s;
}
#background > div:nth-child(7n + 2) {
  --delay_rotate: 0.6s;
}
#background > div:nth-child(7n + 3) {
  --delay_rotate: 0.9s;
}
#background > div:nth-child(7n + 4) {
  --delay_rotate: -0.3s;
}
#background > div:nth-child(7n + 5) {
  --delay_rotate: -0.6s;
}
#background > div:nth-child(7n + 6) {
  --delay_rotate: -0.9s;
}

#background > div:nth-child(6n + 1) {
  --duration_rotate: 1s;
}
#background > div:nth-child(6n + 2) {
  --duration_rotate: 1.6s;
}
#background > div:nth-child(6n + 3) {
  --duration_rotate: 1.1s;
}
#background > div:nth-child(6n + 4) {
  --duration_rotate: 1.2s;
}
#background > div:nth-child(6n + 5) {
  --duration_rotate: 1.3s;
}

#background > div:nth-child(5n + 1) {
  --size: 3vw;
}
#background > div:nth-child(5n + 2) {
  --size: 4vw;
}
#background > div:nth-child(5n + 3) {
  --size: 6vw;
}
#background > div:nth-child(5n + 4) {
  --size: 7vw;
}
</style>
<main>
    <div>
      <hr />
    </div>
    <div>
 <header>
        <h1 style="color:#777;">Welcome to Student Credit Union</h1>
        <p style="color:#777;">Your trusted partner in financial growth and security.</p>

    <section class="main-content">
        <div class="intro">
            <h2 style="color:red;"><b>Discover Our Services</b></h2>
            <p><b>At Student Credit Union, we offer a wide range of financial solutions to help you achieve your goals. Whether you're saving for the future, purchasing a home, or planning for retirement, we’re here to support you every step of the way.</b></p>
        </div>
        <div class="services">
            <h3>Our Services</h3>
            <ul>
                <li><strong>Personal Banking:</strong> Checking and savings accounts, debit cards, and more.</li>
                <li><strong>Business Banking:</strong> Business accounts, merchant services, and customized solutions.</li>
                <li><strong>Investing:</strong> Expert financial advice, retirement plans, and investment management.</li>
                <li><strong>Online Banking:</strong> Convenient, secure online and mobile banking for easy account management.</li>
            </ul>
        </div>

        <div style="color:black;" class="call-to-action">
            <h3>Get Started Today!</h3>
            <p>Join Student Credit Union today and start enjoying the benefits of personalized banking services.</p>
            <a href="signup.php" class="cta-button">Sign Up Now</a>
        </div>
    </section>

        <h3 style="color:#777;">Your Security is Our Priority</h3>
        <p style="padding:25px;color:#777;">We understand how important your financial security is. Our state-of-the-art encryption technology ensures that your personal and financial information is protected 24/7.</p>
    </div>
</main>
<div id="background">
  <div><span></span></div>
  <div><span></span></div>
  <div><span></span></div>
  <div><span></span></div>
  <div><span></span></div>
  <div><span></span></div>
  <div><span></span></div>
  <div><span></span></div>
  <div><span></span></div>
  <div><span></span></div>
  <div><span></span></div>
  <div><span></span></div>
  <div><span></span></div>
  <div><span></span></div>
  <div><span></span></div>
  <div><span></span></div>
  <div><span></span></div>
  <div><span></span></div>
  <div><span></span></div>
  <div><span></span></div>
  <div><span></span></div>
  <div><span></span></div>
  <div><span></span></div>
</div>


    

<?php
    include_once("footer.php");
?>
