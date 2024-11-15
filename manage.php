<!DOCTYPE html>
<html lang="en">

    <head>
        <title>Manage PHP</title>
        <meta charset="utf-8"/>
        <meta name="description" content="Assignment 3" />
        <meta name="keywords"    content="PHP, MySql" />

        <link rel="stylesheet" type="text/css" href="styles/style.css">
        <link href="https://fonts.googleapis.com/css2?family=Shrikhand&display=swap" rel="stylesheet">
        <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
    </head>
<body id="manage">

<?php 
    include_once "header.inc";
?>

    <h1 id="mn1"> Welcome Home </h1>

    <h2 class="mnge"> All Applicants Data </h2>
    
<?php
require_once ("settings.php");

$conn = @mysqli_connect($host, $user, $pwd, $sql_db);

if (!$conn) {
    echo "<p> Database collection failure </p>";
} else {
    
    
   // Search or List EOI
    $query = "SELECT * FROM EOI";
    if (array_key_exists('search', $_POST)){
        $refnumber = $_POST['refnumber'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];

        $searchBy = [];
        if (empty($refnumber) === false) {
            $searchBy[] = "job_reference_number LIKE '%$refnumber%'";
        }

        if (empty($firstname) === false){
            $searchBy[] = "First_name LIKE '%$firstname%'";
        }

        if (empty($lastname) === false){
            $searchBy[] = "Last_name LIKE '%$lastname%'";
        }

        if (count($searchBy) > 0){
            $query .= ' WHERE '  . join(' OR ',  $searchBy);
        }
}


    #$sql_table = "EOI";
    #$query = " SELECT * FROM EOI ";
    
    $result = mysqli_query($conn,$query);

    if (!$result) {
        echo "<p> Something is wrong with ", $query, "</p>";
    } else {
        echo "<table border=\"1\">\n";
        echo "<tr>\n"
            ."<th scope =\"col\"> EOINumber </th>\n"
            ."<th scope =\"col\"> Job reference number </th>\n"
            ."<th scope =\"col\"> First Name </th>\n"
            ."<th scope =\"col\"> Last Name </th>\n"
            ."<th scope =\"col\"> Street address </th>\n"
            ."<th scope =\"col\"> Suburb </th>\n"
            ."<th scope =\"col\"> State </th>\n"
            ."<th scope =\"col\"> Postcode </th>\n"
            ."<th scope =\"col\"> Email address </th>\n"
            ."<th scope =\"col\"> Phone number </th>\n"
            ."<th scope =\"col\"> Skills </th>\n"
            ."<th scope =\"col\"> Other skills </th>\n"
            ."<th scope =\"col\"> Status </th>\n"
            ."<th scope =\"col\"> Operation </th>\n"
            ."</tr>\n";

            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>\n";
                echo "<td>",$row["EOINumber"],"</td>\n ";
                echo "<td>",$row["Job_reference_number"],"</td>\n ";
                echo "<td>",$row["First_name"],"</td>\n ";
                echo "<td>",$row["Last_name"],"</td>\n ";
                echo "<td>",$row["Street_address"],"</td>\n ";
                echo "<td>",$row["Suburb"],"</td>\n ";
                echo "<td>",$row["State"],"</td>\n ";
                echo "<td>",$row["Postcode"],"</td>\n ";
                echo "<td>",$row["Email_address"],"</td>\n ";
                echo "<td>",$row["Phone_number"],"</td>\n ";
                echo "<td>",$row["Skills"],"</td>\n ";
                echo "<td>",$row["Other_skills"],"</td>\n ";
                echo "<td>",$row["Status"],"</td>\n ";
                echo "<td><a href='delete.php?EOINumber=".$row['EOINumber']."'>Delete</a></td>\n ";
                echo "</tr>\n" ;
            }
            
    echo "</table>\n";
    mysqli_free_result($result);
    }


}
?>

    <h2 class="mnge"> Managing Data </h2>
    <h4 class="titlem"> List EOI by </h4>

    <div class="operate">
    <form action="manage.php" method="post">
        <p> Job reference number </p>
        <input type="text" name="refnumber" />
        <p> First name </p>
        <input type="text" name="firstname" />
        <p> Last name </p>
        <input type="text" name="lastname" /><br>

        <span class="btnmanage">
        <input type="submit" name="search" value="Show" />
        </span>

    </form> 
    </div>

    <aside id="logout">
        <p>This data belong to Je-Tech, and under Je-Tech protection <br>
            Don't forget to log out when you are finish.</p> <br>
            <a href="logout.php" id="logoutbtn">Logout</a>
    </aside>


    <h2 class="titlem"> Update Status </h2>

    <div class="operate">
    <form action="update.php" method="post">
        <p> EOINumber </p>
        <input type="text" name="EOINumber" />
        <p> Edit Status </p>
        <input type="text" name="Status" /><br>

        <span class="btnmanage">
        <input type="submit" value="Update" />
        </span>

    </form> 
    </div>





    <?php
        include_once "footer.inc";
    ?>
</body>
</html>