<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="description" content="about" />
        <meta name="keywords"   content="HTML" />
        <meta name="author"     content="Jessica Boediono Goenawan" />
        <meta name="viewport"   content="width=device-width, initial-scale=1"/>

        <title>About</title>

        <link rel="stylesheet" type="text/css" href="styles/style.css" />
        <link href="https://fonts.googleapis.com/css2?family=Shrikhand&display=swap" rel="stylesheet">
        <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
    </head>
    

    <body class="abtbody" id="aboutpage">
        
        <?php 
        include_once "header.inc";
        ?>

             <aside id="moreme">
                <p>I'm an International student<br> that currently studying<br>Computer Science at Swinburne University.<br>
                    I'm taking Software Development as my major.<br>Since Melbourne still close the border,<br>
                     i'm staying at my home country<br> which is Indonesia. <br>
                     I enjoy travelling a lot, and love food <br> whether it's savoury or sweet one. <br>
                     During the free time, i usually spend my time <br> by watching movies or dramas<br> and playing games.
                </p>
            </aside>

            <aside id="quote">
                <p> If you want something you never had,<br>
                    You have to do something you've never done.<br>
                    DON'T STOP UNTIL YOU'RE PROUD
                </p>
            </aside>
        
    
        <div id="profilecard">
            <div id="card-header">
              
            <h4 id="name"> About Me </h4>
            <div class="pic">
                <img src="styles/images/pic.jpg" alt="Jessica Boediono Goenawan">
            </div>
            <div class="desc"> <p><dl>
                <dt>Full Name</dt>
                    <dd>Jessica Boediono Goenawan</dd> 
                <dt>Student ID</dt> 
                    <dd>103523649</dd> 
                <dt>Tutor's Name</dt>
                    <dd>Guangming</dd> 
                <dt>Course</dt> 
                    <dd>Computer Science</dd>
                <dt>Major</dt>  
                <dd>Software Development</dd>
            </dl>
 
            <!--Table-->
        <table class="table"> 
            <caption>Timetable</caption>
            <thead>
                <tr>
                <th>Time</th>
                <th>Monday</th>
                <th>Tuesday</th>
                <th>Wednesday</th>
                <th>Thursday</th>
                <th>Friday</th>
                </tr>
            </thead>
                <tbody>
                 <tr>
                    <td rowspan="2" class="time">08.00</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td rowspan="2" class="time">09.00</td>
                    <td>&nbsp;</td>
                    
                    <td rowspan="2" class="COS10009"> COS10009<p>Live Online</p></td>
                    <td>&nbsp;</td>
                    <td rowspan="4" class="COS10003">COS10003<p>Live Online</p></td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td rowspan="2" class="time">10.00</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td rowspan="2" class="time">11.00</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td rowspan="2" class="COS10009">COS10009<p>Live Online</p></td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td rowspan="2" class="time">12.00</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td rowspan="4" class="COS20001">COS20001<p>Tutorial</p></td>
                    <td rowspan="4" class="COS10003">COS10003<p>Tutorial</p></td>
                    <td rowspan="4" class="COS10009">COS10009<p>Lab</p></td>
                </tr>
                <tr>
                    <td rowspan="2" class="time">13.00</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td rowspan="2" class="time">14.00</td>
                    <td rowspan="2" class="COS10011">COS10011<p>Live Online</p></td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td rowspan="4" class="COS10011">COS10011<p>Lab</p></td>
                    <td>&nbsp;</td>
                    <td rowspan="4" class="COS10009">COS10009<p>Workshop</p></td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td rowspan="2" class="time">15.00</td>
                    <td rowspan="2" class="COS20001">COS20001<p>Live Online</p></td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td rowspan="2" class="time">16.00</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                   
        </table>

        </div>
    </div>
    </div>

    <section id="enhancements">
    <h5><a href="enhancements2.html" id="enhtml"> Enhancements</a></h5>
    </section>
        
    <a href="#" class="buttontop"><i class="far fa-arrow-alt-circle-up"></i></a>
          
    <!--Footer-->
    <?php 
            include_once "footer.inc";
    ?>

    <script src="scripts/enhancements.js"></script>
    </body>

</html>