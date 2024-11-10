<?php declare(strict_types=1);

ini_set('display_errors', '1');
error_reporting(E_ALL | E_STRICT);

session_start();

$loginerr = null;
$attemptData = $_SESSION['login_attempt'] ?? [];
$attempt = $attemptData['count'] ?? 0;
$maxAttempt = 3;
if ($attempt >= $maxAttempt) { // Terlalu banyak percobaan login

    /**
     * @var \DateTimeImmutable
     */
    $lockedAt = $attemptData['lockedAt'];
    $expireAt = $lockedAt->modify('30 second');
    $now = new DateTimeImmutable();
    if ($expireAt <= $now) {
        // You can login again
        unset($_SESSION['login_attempt']);
        $attemptData = [];
        $attempt = 0;
    } else {
        $second = $expireAt->getTimestamp() - $now->getTimestamp();
        die('Locked. Please try again in ' . $second . ' second');
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    require_once ("settings.php");

    $conn = @mysqli_connect($host, $user, $pwd, $sql_db);
    
    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn,$query);
    $user = mysqli_fetch_assoc($result);
    if ($user) {
        unset($_SESSION['login_attempt']); // reset login attempt
        die('You have successfully logged in.');
    } else {
        $loginerr = 'You have entered incorrect username or password';
        $attemptData['count']= ++$attempt;
        $attemptData['lockedAt'] = null;

        if ($attempt >= $maxAttempt) {
            $lockedAt = new DateTimeImmutable();
            $attemptData['lockedAt'] = $lockedAt;
            $_SESSION['login_attempt'] = $attemptData;
            die('Too many failed attempts. Please wait for 30 seconds.');
        }

        $_SESSION['login_attempt'] = $attemptData;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="description" content="jobs" />
        <meta name="keywords"   content="HTML" />
        <meta name="author"     content="Jessica Boediono Goenawan" />
        <meta name="viewport"   content="width=device-width, initial-scale=1"/>

        <title>Jobs</title>

        <link rel="stylesheet" type="text/css" href="styles/style.css">
        <link href="https://fonts.googleapis.com/css2?family=Shrikhand&display=swap" rel="stylesheet">
        <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
    </head>
    <?php
         include_once "header.inc";
    ?>

    <body id="loginpage">
        
    <div id="logincard">

    <h2 id="logintitle"> Login</h2>
    <?php if($attempt > 0): ?>
      <p>
        You have <?= $maxAttempt - $attempt ?> attempt(s) left.
      </p>
    <?php endif; ?>
        <form action="" method="POST" id="loginform">
            
            <p class="userpass">Username </p> 
            <input type="text" name="username" id="username" class="logininput"/>
            
            <p class="userpass">Password </p>
            <input type="text" name="password" id="password" class="logininput" />

            <div id="loginbutton">
                <input type="submit" value="Login" name="submit" class="buttons" id="submitbtn"/>
            </div>

            <small>
            <?php
                		if (isset($_SESSION['loginerr'])) {
	                		echo $_SESSION['loginerr'];
                		}
            ?>
            </small>
        </form>
    </div>


    <?php 
            include_once "footer.inc";
    ?>
    </body>
    </html>