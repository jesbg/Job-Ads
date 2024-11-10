<!DOCTYPE html>
<html lang="en">

    <head>
        <title>Apply Job</title>
        <meta charset="utf-8"/>
        <meta name="description" content="Apply form" />
        <meta name="keywords"    content=" " />
    </head>

<body>
    <h1>Apply</h1>

<?php

require_once ("settings.php");

$conn = @mysqli_connect($host, $user, $pwd, $sql_db);

var vicRE = preg_match("/^(3||8)([0-9]{3})$/");
var nswRE = preg_match("/^(1||2)([0-9]{3})$/");
var qldRE = preg_match("/^(4||9)([0-9]{3})$/");
var ntRE = preg_match("/^(0)([0-9]{3})$/");
var waRE = preg_match("/^(6)([0-9]{3})$/");
var saRE = preg_match("/^(5)([0-9]{3})$/");
var tasRE = preg_match("/^(7)([0-9]{3})$/");
var actRE = preg_match("/^(0)([0-9]{3})$/");


function sanitise_input ($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if (isset ($_POST["refnumber"])) {
    $refnumber = $_POST["refnumber"];
    $refnumber = sanitise_input($refnumber);
    echo "<p>Reference number:  $refnumber</p>";
} else {
    header ("location: apply.php");
    echo "<p>Error: Enter data in the <a href=\"apply.php\">form</a></p>";
}


if (isset ($_POST["firstname"])) {
    $firstname = $_POST["firstname"];
    $firstname = sanitise_input($firstname);
    echo "<p>This is a test: Your first name is $firstname</p>";
} else {
    header ("location: register.html");
    echo "<p>Error: Enter data in the <a href=\"register.html\">form</a></p>";
}

if (isset ($_POST["lastname"])) {
    $lastname = $_POST["lastname"];
    $lastname = sanitise_input($lastname);
    echo "<p>This is a test: Your last name is $lastname</p>";
} else {
    header ("location: register.html");
    echo "<p>Error: Enter data in the <a href=\"register.html\">form</a></p>";
}

if (isset ($_POST["age"])) {
    $age = $_POST["age"];
    $age = sanitise_input($age);
    echo "<p>This is a test: Your age is $age</p>";
} else {
    header ("location: register.html");
    echo "<p>Error: Enter data in the <a href=\"register.html\">form</a></p>";
}

if (isset ($_POST["address"])) {
    $address = $_POST["address"];
    $address = sanitise_input($address);
    echo "<p>Address:  $address</p>";
} else {
    header ("location: register.html");
    echo "<p>Error: Enter data in the <a href=\"register.html\">form</a></p>";
}

if (isset ($_POST["town"])) {
    $town = $_POST["town"];
    $town = sanitise_input($town);
    echo "<p>Town:  $town</p>";
} else {
    header ("location: register.html");
    echo "<p>Error: Enter data in the <a href=\"register.html\">form</a></p>";
}

if (isset ($_POST["email"])) {
    $email = $_POST["email"];
    $email = sanitise_input($email);
    echo "<p> Email:  $email</p>";
} else {
    header ("location: register.html");
    echo "<p>Error: Enter data in the <a href=\"register.html\">form</a></p>";
}

if (isset ($_POST["phone"])) {
    $phone = $_POST["phone"];
    $phone = sanitise_input($phone);
    echo "<p> Phone number:  $phone</p>";
} else {
    header ("location: register.html");
    echo "<p>Error: Enter data in the <a href=\"register.html\">form</a></p>";
}



// Radio Button
if(isset($_POST["species"])) {
    $species = $_POST["species"];
} else {
    $species = "Unknown species";
}

// Checkboxes
$tour = "";

if(isset($_POST["1day"])) 
    $tour = $tour . "One-day tour";
if(isset($_POST["4day"])) 
    $tour = $tour . "Four-day tour";
if(isset($_POST["10day"])) 
    $tour = $tour . "Ten-day tour";

// Selection
if (isset($_POST["food"])) {
    $food = $_POST["food"];
    if ($food != "none")
        echo "<p> This is a test: Your menu is $food </p>";
    else
        echo "<p>Error: Enter data in the <a href=\"register.html\">form</a></p>";
} else {
    echo "<p>Error: Enter data in the <a href=\"register.html\">form</a></p>";
}

$errMsg = "";

if ($refnumber=="") {
    $errMsg .= "<p> You must enter your first name. </p>";
} else if (!preg_match("/^[a-zA-Z0-9]{5}*$/", $refnumber)) {
    $errMsg .= "<p> Only alpha letters allowed in your first name. </p>";
}

if ($firstname=="") {
    $errMsg .= "<p> You must enter your first name. </p>";
} else if (!preg_match("/^[a-zA-Z]{0,20}*$/", $firstname)) {
    $errMsg .= "<p> Only alpha letters allowed in your first name. </p>";
}

if ($lastname=="") {
    $errMsg .= "<p> You must enter your first name. </p>";
} else if (!preg_match("/^[a-zA-Z]{0,20}*$/", $lastname)) {
    $errMsg .= "<p> Only alpha letters allowed in your last name. </p>";
}


if ($age=="") {
    $errMsg .= "<p> You must enter your age. </p>";
} else if (!is_numeric($age)) {
    $errMsg .= "<p> Your age must be a number. </p>";
} else if ($age < 10 || $age > 10000) {
    $errMsg .= "<p> Your age must be between 10 and 10,000. </p>";
}


if ($address=="") {
    $errMsg .= "<p> You must enter your first name. </p>";
} else if (!preg_match("/^[a-zA-Z]{0,40}*$/", $address)) {
    $errMsg .= "<p> Only alpha letters allowed in your last name. </p>";
}


if ($town=="") {
    $errMsg .= "<p> You must enter your first name. </p>";
} else if (!preg_match("/^[a-zA-Z]{0,40}*$/", $town)) {
    $errMsg .= "<p> Only alpha letters allowed in your last name. </p>";
}


if ($phone=="") {
    $errMsg .= "<p> You must enter your first name. </p>";
} else if (!preg_match("/^[0-9 ]{8,12}*$/", $phone)) {
    $errMsg .= "<p> Only alpha letters allowed in your last name. </p>";
}

if ($email=="") {
    $errMsg .= "<p> You must enter your email. </p> ";
} else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errMsg .= "<p> Invalid email format </p>";
}

if ($errMsg != "") {
    echo "<p> $errMsg </p>";
} else {
    echo "<p> Welcome $firstname $lastname! </p>
        <p> You are now booked on $tour </p>
        <p> Species : $species </p>
        <p> Age : $age </p>
        <p> Meal Preference : $food </p>
        <p> Number of travellers : $partySize </p>";
}


echo "<table border=\"1\">\n";
echo "<tr>\n"
    ."<th scope =\"col\"> Personal Details </th>\n"
    ."<th scope =\"col\"> Value </th>\n"
    ."</tr>\n";

echo "<tr>\n"
    ."<td>Job reference number</td>\n "
    ."<td>",$refnumber,"</td>\n "
    ."</tr>\n" ;

 echo "<tr>\n"
    ."<td>First Name</td>\n "
    ."<td>",$firstname,"</td>\n "
    ."</tr>\n" ;

echo "<tr>\n"
    ."<td>Last Name</td>\n "
    ."<td>",$lastname,"</td>\n "
    ."</tr>\n" ;

echo "<tr>\n"
    ."<td>Age</td>\n "
    ."<td>",$dob,"</td>\n "
    ."</tr>\n" ;

 echo "<tr>\n"
    ."<td>Gender</td>\n "
    ."<td>",$gender,"</td>\n "
    ."</tr>\n" ;

echo "<tr>\n"
    ."<td>Street address</td>\n "
    ."<td>",$address,"</td>\n "
    ."</tr>\n" ;

echo "<tr>\n"
    ."<td>Suburb/Town</td>\n "
    ."<td>",$town,"</td>\n "
    ."</tr>\n" ;

echo "<tr>\n"
    ."<td>State</td>\n "
    ."<td>",$state,"</td>\n "
    ."</tr>\n" ;

echo "<tr>\n"
    ."<td>Postcode</td>\n "
    ."<td>",$postcode,"</td>\n "
    ."</tr>\n" ;

echo "<tr>\n"
    ."<td>Email</td>\n "
    ."<td>",$email,"</td>\n "
    ."</tr>\n" ;

echo "<tr>\n"
    ."<td>Phone number</td>\n "
    ."<td>",$phone,"</td>\n "
    ."</tr>\n" ;

echo "<tr>\n"
    ."<td>Skills</td>\n "
    ."<td>",$skills,"</td>\n "
    ."</tr>\n" ;

echo "<tr>\n"
    ."<td>Other skills</td>\n "
    ."<td>",$oskills,"</td>\n "
    ."</tr>\n" ;

    
echo "</table>\n";
mysqli_free_result($result);


?>

</body>
</html>