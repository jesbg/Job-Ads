
<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="description" content="apply" />
        <meta name="keywords"   content="HTML" />
        <meta name="author"     content="Jessica Boediono Goenawan" />
        <meta name="viewport"   content="width=device-width, initial-scale=1"/>

        <title>Job application</title>

        <link rel="stylesheet" type="text/css" href="styles/style.css">
        <link href="https://fonts.googleapis.com/css2?family=Shrikhand&display=swap" rel="stylesheet">
        <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
    </head>

    <body class="formbody" id="applypage">
        
    <?php 
        include_once "header.inc";
    ?>

        <div class="form">
        <h1 class="h1form">Job Application Form</h1>
        <form id="regform" method="post" action="processEOI.php" novalidate="novalidate" >
        <fieldset>

            <legend class="legend">Personal Details</legend>

          
               
                <div class="form-control">
                <label for="refnumber" class="refnumber">Job reference number</label>
                <input type="text" name="refnumber" id="refnumber"  />
                <i class="fas fa-check-circle" ></i>
                <i class="fas fa-exclamation-circle"></i> 
                <small><?php
                		if (isset($_SESSION['refnumberErr'])) {
	                		echo $_SESSION['refnumberErr'];
                		}
                	?></small>
                </div>
            
           
                <div class="form-control">
                <label for="firstname">First name</label>
                <input type="text" name="firstname" id="firstname" />
                <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation-circle"></i>
                <small>
                	<?php
                		if (isset($_SESSION['firstnameErr'])) {
	                		echo $_SESSION['firstnameErr'];
                		}
                	?>
                </small>
                </div>
            

                <div class="form-control">
                <label for="lastname">Last name</label>
                <input type="text" name="lastname" id="lastname"  />
                <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation-circle"></i>
                <small>
                	<?php
                		if (isset($_SESSION['lastnameErr'])) {
	                		echo $_SESSION['lastnameErr'];
                		}
                	?>
                </small>
                </div>
            
           
                <div class="form-control">
                <label for="dob">Date of birth</label>
                <!--<input type="date" name="day" id="dob"  />-->
                <input type="text" name="dob" id="dob" placeholder="dd/mm/yyyy" pattern="\d{1,2}/\d{1,2}/\d{4}" >
                <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation-circle"></i>
                <small>
                <?php
                		if (isset($_SESSION['dobErr'])) {
	                		echo $_SESSION['dobErr'];
                		}
                ?>
                </small>
                </div>
            

                <div class="form-control">
                <p>Gender :</p> <br>
                <label for="female">Female</label>
                <input type="radio" name="gender" value="female" id="female" class="gender" />
                <label for="male">Male</label>
                <input type="radio" name="gender" value="male" id="male" class="gender"/>
                <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation-circle"></i>
                <small>
                <?php
                		if (isset($_SESSION['genderErr'])) {
	                		echo $_SESSION['genderErr'];
                		}
                ?>
                </small>
                </div>
           
            
                <div class="form-control">
                <label for="address">Street Address</label>
                <input type="text" name="address" id="address"  pattern=.{1,40} />
                <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation-circle"></i>
                <small><?php
                		if (isset($_SESSION['addressErr'])) {
	                		echo $_SESSION['addressErr'];
                		}
                	?>
                </small>
                </div>
            
           
                <div class="form-control">
                <label for="town">Suburb/Town</label>
                <input type="text" name="town" id="town"  pattern=.{1,40} /> 
                <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation-circle"></i>
                <small>
                <?php
                		if (isset($_SESSION['townErr'])) {
	                		echo $_SESSION['townErr'];
                		}
                ?>
                </small>
                </div>
            
                <div class="form-control">
                <label for="state">State</label>
                <select name="state" id="state" >
                <option value="" selected="selected">Please Select</option>
                <option value="VIC" id="vic">VIC</option>
                <option value="NSW" id="nsw">NSW</option>
                <option value="QLD" id="qld">QLD</option>
                <option value="NT" id="nt">NT</option>
                <option value="WA" id="wa">WA</option>
                <option value="SA" id="sa">SA</option>
                <option value="TAS" id="tas">TAS</option>
                <option value="ACT" id="act">ACT</option> </select>
                <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation-circle"></i>
                <small>
                <?php
                		if (isset($_SESSION['stateErr'])) {
	                		echo $_SESSION['stateErr'];
                		}
                ?>
                </small>
                </div>

                <div class="form-control">
                <label for="postcode">Postcode</label>
                <input type="text" name= "postcode" id="postcode" />
                <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation-circle"></i>
                <small>
                <?php
                		if (isset($_SESSION['postcodeErr'])) {
	                		echo $_SESSION['postcodeErr'];
                		}
                ?>
                </small>
                </div>
            
                <div class="form-control">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" placeholder="name@domain.com" />
                <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation-circle"></i>
                <small>
                <?php
                		if (isset($_SESSION['emailErr'])) {
	                		echo $_SESSION['emailErr'];
                		}
                ?>
                </small>
                </div>

                <div class="form-control">
                <label for="phone">Phone number</label>
                <input type="tel" name="phone" id="phone"  />
                <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation-circle"></i>
                <small>
                <?php
                		if (isset($_SESSION['phoneErr'])) {
	                		echo $_SESSION['phoneErr'];
                		}
                ?>
                </small>
                </div>

        <!-- CHECKBOX SKILLS-->
                <div class="form-control">
                <p class="skills">Skills</p>
                <br />
                <label><input type="checkbox" name="skills[]" value="Java" id="java"/>Java</label>
                <label><input type="checkbox" name="skills[]" value="HTML/CSS" id="html"/>HTML/CSS</label>
                <label><input type="checkbox" name="skills[]" value="JavaScript" id="js"/>JavaScript</label><br>
                <label><input type="checkbox" name="skills[]" value="PHP" id="php"/>PHP</label>
                <label><input type="checkbox" name="skills[]" value="SQL" id="sql" />SQL</label>
                <label><input type="checkbox" name="skills[]" value="Ruby" id="ruby"/>Ruby</label>
                <label><input type="checkbox" name="other_skill" value="Other" id="other" />Other skills</label>
                <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation-circle"></i>
                <small>
                <?php
                		if (isset($_SESSION['skillsErr'])) {
	                		echo $_SESSION['skillsErr'];
                		}
                ?>
                </small>
                </div>

        <!-- OTHER SKILLS TEXT AREA-->
            <div class="form-control">
            <label for="oskills" class="skills">Other Skills</label><br />
            <textarea name="oskills" rows="4" cols="30" id="oskills" ></textarea>
            
            <i class="fas fa-check-circle"></i>
            <i class="fas fa-exclamation-circle" ></i>
            <small>
                <?php
                		if (isset($_SESSION['oskillsErr'])) {
	                		echo $_SESSION['oskillsErr'];
                		}
                ?>
            </small>
            </div>


         </fieldset>
        
         <div class="button">
        <p><input type="submit" value="Apply" name="submit" class="buttons" id="submitbtn"/>
            <input type="reset" value="Reset form" class="buttons" id="resetbtn"/></p>
        </div>


        </form>
        </div>

        <!--logo-->
        <div class="logoapply">
           <a href="jobs.html">
            <img src="styles/images/logo.png" alt="Je-Tech Logo" id="imgapply"></a>
        </div>

        <a href="#" class="buttontop"><i class="far fa-arrow-alt-circle-up"></i></a>
          

        <!--footer-->
        <?php 
            include_once "footer.inc";
        ?>
            <script src="scripts/apply.js"></script>
            <script src="scripts/enhancements.js"></script>
    </body>

    </html>
    <?php session_destroy() ?>