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

    <body id="loginpage">

    <?php 
    session_start();

        include_once "header.inc";

        require_once ("settings.php");

        $conn = @mysqli_connect($host, $user, $pwd, $sql_db);

        $_SESSION['loginerr'] = "";
        #$_SESSION["login_attempts"] = 0;

        /*if (isset($_POST["username"])) {
            $username = $_POST["username"];
            $password = $_POST["password"];

            session_start();
            $isLocked = false;
            $loginerr = null;
            // Cek dulu adakah login attempt di session
            if (!$_SESSION[$username]) {
                $isLocked = $_SESSION[$username]['attemp'] >= 3;
            }

            if ($isLocked === false){
                $query = "SELECT * FROM users WHERE username LIKE '%$username%' AND password LIKE '%$password%' limit 1";
                $result = mysqli_query($conn,$query);
                if (mysqli_num_rows($result)==1) {
                    unset($_SESSION[$username]);
                    echo " You have successfully logged in.";
                    header('Location: manage.php');
                } else {
                    $attempt = $_SESSION[$username]['attempt'] ?? 0;
                    $_SESSION[$username]['attempt'] = $attempt++;
                    $loginerr =  " You have entered incorrect username or password";
                }
            } else {
               
                $query = "SELECT * FROM lock_table WHERE username='$username'"
            } */
            if (isset($_POST["username"])) {
            $username = $_POST["username"];
            $password = $_POST["password"];

           

            $query = "SELECT * FROM users WHERE username LIKE username = '$username' AND password LIKE password = '$password' limit 1";

            $result = mysqli_query($conn,$query);
            if (mysqli_num_rows($result)==1) {
                echo " You have successfully logged in.";
                header('Location: manage.php');
            } else {
                $loginerr =  " You have entered incorrect username or password";
                $_SESSION['loginerr'] = $loginerr;
               
            }
        }
    ?>
    
    <div id="logincard">
   
            <h2 id="logintitle"> Login</h2>
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