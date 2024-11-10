<!DOCTYPE html>
<html lang="en">

    <head>
        <title>Delete PHP</title>
        <meta charset="utf-8"/>
        <meta name="description" content="Assignment 3" />
        <meta name="keywords"    content="PHP, MySql" />
    </head>
<body>

<?php
require_once ("settings.php");

$conn = @mysqli_connect($host, $user, $pwd, $sql_db);

if (!$conn) {
    echo "<p> Database collection failure </p>";
} else {

    if (!isset($_POST['Status'])) {
        header ("location: manage.php");
        exit ();
    } if (!isset($_POST['EOINumber'])) {
        header ("location: manage.php");
        exit ();
    }


    $Status = $_POST["Status"];
    $EOINumber = $_POST["EOINumber"];



    $query = "UPDATE EOI SET Status='$Status' WHERE EOINumber = $EOINumber"; 
    $result = mysqli_query($conn,$query);

    if ($result) {
        mysqli_close($conn);
            header('Location: manage.php'); 
            exit();
        } else {
            echo "Updating record failed.";
            header('Location: manage.php');
        }

            
}

?>


</body>
</html>