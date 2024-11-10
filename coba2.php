<!DOCTYPE html>
<html lang="en">

    <head>
        <title> Process EOI</title>
        <meta charset="utf-8"/>
        <meta name="description" content="Assignment 3" />
        <meta name="keywords"    content="PHP, MySql" />

        <link rel="stylesheet" type="text/css" href="styles/style.css">
        <link href="https://fonts.googleapis.com/css2?family=Shrikhand&display=swap" rel="stylesheet">
        <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
    </head>
<body>

<?php
    include_once "header.inc";
?>

    <h1> Thank You for Applying ! </h1>
    
<?php
require_once ("settings.php");

$conn = @mysqli_connect($host, $user, $pwd, $sql_db);

if (!$conn) {
    echo "<p> Database collection failure </p>";
} 
 else {
   
    function sanitise_input ($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    
    function calculateAge ($dataString) {
        $dob = str_replace("/","-",$_POST['dob']);
        $current_year = new DateTime(date("d-m-Y H:i:s"));
        $newdob = new DateTime (date("d-m-Y", strtotime($dob)));
        $age = $current_year ->diff($newdob);
        return $age->y;
    }



    if(!isset($_POST['submit'])) {
        header("Location: apply.php");
        exit;
    } else {
        // start session 
    	session_start();

        if (isset ($_POST["refnumber"])) {
            $refnumber = $_POST['refnumber'];
            $refnumber = sanitise_input($_POST['refnumber']);
            if ($refnumber == "") {
                $refnumberErr = "Reference number can not be empty.";
                } else if(!preg_match("/^[a-zA-Z0-9]{5}$/", $refnumber)) {
                    $refnumberErr = "Please enter a valid reference number.";
                }    
        }

        if (isset($_POST['firstname'])) {
        	$firstname = $_POST['firstname'];
        	$firstname = sanitise_input($_POST['firstname']);
        	if ($firstname == "") {
        		$firstnameErr = "First name can not be empty.";
        	} else if(!preg_match("/^[a-zA-Z]{1,20}$/", $firstname)) {
	        	$firstnameErr = "Please enter a valid first name.";
        	}
        }

        if (isset($_POST["lastname"])) {
            $lastname = $_POST['lastname'];
            $lastname = sanitise_input($_POST['lastname']);
            if ($lastname == "") { 
                $lastnameErr = "Last name can not be empty.";
            } else if(!preg_match("/^[a-zA-Z]{1,20}$/", $lastname)) {
                $lastnameErr = "Please enter a valid last name.";
            }
        }

        if (isset($_POST["dob"])) {
            $dob = $_POST['dob'];
            if ($dob == "") { 
                $dobErr = "Please enter your date of birth.";
            }
                $dob = calculateAge($_POST['dob']);
                if($dob < 15 || $dob > 80) {
                $dobErr = "Applicants must be between 15 and 80.";
            }
        }

        $dateofbirth = $_POST['dob'];

        // Gender (radiobutton)
        if(isset($_POST["gender"])) {
            $gender = $_POST["gender"];
        } else {
            $genderErr = "Please choose a gender.";
        }

        if (isset ($_POST["address"])) {
            $address = $_POST['address'];
            $address = sanitise_input($_POST['address']);
            if ($address == "") {
                $addressErr = "Street address can not be empty.";
                } else if(strlen($address) > 40) {
                        $addressErr = "Please enter a valid street address.";
                }
        }
        
        if (isset($_POST["town"])) {
            $town = $_POST['town'];
            $town = sanitise_input($_POST['town']);
            if ($town == "") { 
                $townErr = "Suburb/ town can not be empty.";
            } else if(strlen($town) > 40) {
                $townErr = "Please enter a suburb/town.";
            }
        }

        if (isset($_POST["state"])) {
            $state = $_POST['state'];
            if ($state == "") {
                $stateErr = "Please select a state.";
            }
        }

        if (isset($_POST["postcode"])) {
            $postcode = $_POST['postcode'];
            $postcode = sanitise_input($_POST['postcode']);
            if ($postcode == "") { 
                $postcodeErr = "Postcode can not be empty.";
            } else if(!preg_match("/^[0-9]{4}$/", $postcode)) {
                $postcodeErr = "Please enter a valid postcode";
            }
        }


        // **
        // rule for postcode
        switch ($_POST['state']) {
            case "VIC":
                // first char must be "3" or "8"
                if ($_POST['postcode'][0] != "3" && $_POST['postcode'][0] != "8") $postcodeErr = "Postcode for VIC state must start with '3' or '8'";
                break;
            case "NSW":
                // first char must be "1" or "2"
                if ($_POST['postcode'][0] != "1" && $_POST['postcode'][0] != "2") $postcodeErr = "Postcode for NSW state must start with '1' or '2'";
                break;
            case "QLD":
                // first char must be "4" or "9"
                if ($_POST['postcode'][0] != "4" && $_POST['postcode'][0] != "9") $postcodeErr = "Postcode for QLD state must start with '4' or '9'";
                break;
            case "NT":
                // first char must be "0"
                if ($_POST['postcode'][0] != "0") $postcodeErr = "Postcode for NT state must start with '0'";
                break;
            case "WA":
                // first char must be "6"
                if ($_POST['postcode'][0] != "6") $postcodeErr = "Postcode for WA state must start with '6'";
                break;
            case "SA":
                // first char must be "5"
                if ($_POST['postcode'][0] != "5") $postcodeErr = "Postcode for SA state must start with '5'";
                break;
            case "TAS":
                // first char must be "7"
                if ($_POST['postcode'][0] != "7") $postcodeErr = "Postcode for TAS state must start with '7'";
                break;
            case "ACT":
                // first char must be "0"
                if ($_POST['postcode'][0] != "0") $postcodeErr = "Postcode for ACT state must start with '0'";
                break;
        }

        if (isset ($_POST["email"])) {
            $email = $_POST['email'];
            $email = sanitise_input($_POST['email']);
            if($email == "") {
                $emailErr = "Email address can not be empty.";
                } else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $emailErr = "Please enter a valid email address.";
                } 
        }

        if (isset($_POST["phone"])) {
            $phone = $_POST['phone'];
            $phone = sanitise_input($_POST['phone']);
            if ($phone == "") {
                $phoneErr = "Phone number can not be empty.";
            } else if(!preg_match("/^[0-9 ]{8,12}$/", $phone)) { 
                $phoneErr = "Please enter a valid phone number.";
            }
        }
    	
        /*if(isset($_POST["skills"])) {
            $skills = $_POST["skills"];
            for($x = 0; $x < count($skills); $x++ )
            {
                if($skills[$x] == "Other"){
                    if(isset($_POST["oskills"])) {
                        $oskills = $_POST["oskills"];
                        if ($oskills == "") {
                            $oskillsErr = "Other Skills can not be empty.";
                        } 
                    }
                } 
            }
            $skills = implode (",", $skills);
        } else {
            $skillsErr = "Please choose one or more skills.";
        } 

        if (isset($_POST['skills'])) {
            // **
            // check if "Other" is selected, and check if other skills text area is empty
            // set error if true
            if (in_array("Other", $_POST['skills']) && $_POST['oskills'] == "") {
                $oskillsErr = "Other Skills can not be empty.";
            }

            // **
            // create temporary array for skills
            $temp = $_POST['skills'];

            // **
            // delete "Other" from this temporary array
            unset($temp[array_search("Other", $_POST['skills'])]);

            // **
            // join the array
            $skills_without_other = implode(", ", $temp);
        } else {
            $skillsErr = "Please choose one or more skills.";
        } */

        
        
        // **
        // set session for error
        if (isset($refnumberErr)) {
        	$_SESSION['refnumberErr'] = $refnumberErr;
    	}
    	if (isset($firstnameErr)) {
        	$_SESSION['firstnameErr'] = $firstnameErr;
    	}
    	if (isset($lastnameErr)) {
        	$_SESSION['lastnameErr'] = $lastnameErr;
    	}
        if (isset($dobErr)) {
        	$_SESSION['dobErr'] = $dobErr;
    	}
        if (isset($addressErr)) {
        	$_SESSION['addressErr'] = $addressErr;
    	}
        if (isset($townErr)) {
        	$_SESSION['townErr'] = $townErr;
    	}
        if (isset($stateErr)) {
        	$_SESSION['stateErr'] = $stateErr;
    	}
        if (isset($postcodeErr)) {
        	$_SESSION['postcodeErr'] = $postcodeErr;
    	}
        if (isset($emailErr)) {
        	$_SESSION['emailErr'] = $emailErr;
    	}
        if (isset($phoneErr)) {
        	$_SESSION['phoneErr'] = $phoneErr;
    	}
        if (isset($genderErr)) {
        	$_SESSION['genderErr'] = $genderErr;
    	}
        if (isset($skillsErr)) {
        	$_SESSION['skillsErr'] = $skillsErr;
    	}
        if (isset($oskillsErr)) {
        	$_SESSION['oskillsErr'] = $oskillsErr;
    	}



        if (isset($refnumberErr) || isset($firstnameErr) || isset($lastnameErr) || isset($genderErr) || isset($dobErr) ||
            isset($addressErr) || isset ($townErr) || isset($stateErr) || isset($postcodeErr) || isset($emailErr) || 
            isset($phoneErr)  || isset($skillsErr)  || isset($oskillsErr)) {
            header("Location: apply.php");

            exit;
        } else {

        $sql_table = "EOI";
        $query = " SELECT job_reference_number, first_name, last_name, street_address, suburb,
        state, postcode, email_address, phone_number, skills, other_skills 
        FROM EOI order by job_reference_number, first_name, last_name, street_address, suburb,
        state, postcode, email_address, phone_number, skills, other_skills " ;
        
        
        $result = mysqli_query($conn,$query);

        

           
        if (!$result) {
            echo "<p> Something is wrong with ", $query, "</p>";
        } else {
            $insert_query = "INSERT INTO EOI ( job_reference_number, first_name, last_name, street_address, suburb,
            state, postcode, email_address, phone_number, skills, other_skills )
            VALUES ('$refnumber', '$firstname', '$lastname', '$address', '$town', 
            '$state', '$postcode', '$email', '$phone', '$skills', '$oskills')";
            $insert_result = mysqli_query ($conn, $insert_query);
                if ($insert_query) {
                echo "<p> Thank You  ", $firstname, " for applying to JE-TECH </p>";
                echo "Your EOINumber is ". mysqli_insert_id($conn). ". </p> ";

            } 
        }
    }
}
                
}

?>

<table class="table"> 
        <tr>
            <th>Personal Details</th>
            <th>Value</th>
        </tr>
        <tr>
            <td>Job Reference Number</td>
            <td><?= $refnumber ?></td>
        </tr>
        <tr>
            <td>First Name</td>
            <td><?= $firstname ?></td>
        </tr>
        <tr>
            <td>Last Name</td>
            <td><?= $lastname ?></td>
        </tr>
        <tr>
            <td>Date of Birth</td>
            <td><?= $dateofbirth ?></td>
        </tr>
        <tr>
            <td>Gender</td>
            <td><?= $gender ?></td>
        </tr>
        <tr>
            <td>Street Address</td>
            <td><?= $address ?></td>
        </tr>
        <tr>
            <td>Suburb/Town</td>
            <td><?= $town ?></td>
        </tr>
        <tr>
            <td>State</td>
            <td><?= $state ?></td>
        </tr>
        <tr>
            <td>Postcode</td>
            <td><?= $postcode ?></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><?= $email ?></td>
        </tr>
        <tr>
            <td>Phone number</td>
            <td><?= $phone ?></td>
        </tr>
        <tr>
            <td>Skills</td>
            <td><?= $skills ?></td>
        </tr>
        <tr>
            <td>Other skills</td>
            <td><?= $skills ?></td>
        </tr>
        
        
</table>


<?php

    include_once "footer.inc";

?>
</body>
</html>