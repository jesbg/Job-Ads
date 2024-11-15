<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="description" content="index" />
        <meta name="keywords"   content="HTML" />
        <meta name="author"     content="Jessica Boediono Goenawan" />
        <meta name="viewport"   content="width=device-width, initial-scale=1"/>
        
        <title>Index</title>
        <link rel="stylesheet" type="text/css" href="styles/style.css">
        <link href="https://fonts.googleapis.com/css2?family=Shrikhand&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Yrsa:wght@300&display=swap" rel="stylesheet">
        <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
    </head>

    <body id="indexpage">
        <div class="background">
            <?php 
            include_once "header.inc";
            ?>


         <!-- banner-->
         <div class="banner">
         </div>
            
         <!-- about -->
         <section class="about">
               <div class="container">
         
        <h3>About Us</h3>
        <div class="aboutus">
        <p> Je-Tech is an IT company where we provides services such as build and develop mobile app and web.
            We started in 2016 and have successfully completed 100 projects. Your business in a good hands with Je-Tech.<br>
            We are ready to help you whether building a new product or an existing one
        </p>
        <p> Je-Tech's team will always make sure that our clients are satisfied with the product. Je-Tech always maintains our team experts with highly skills and professional services.
            Our teams an experienced, hard-working and creative on their field. <br>
            Our goal is to open new doors concerning the market for all of our clients.<br>
            We always do the best to produce intelligible and stunning application and design.
            That is why we always deliver a best product for you.</p>
        <p>Check out more about us in this website and kindly consider Je-Tech to be your companion for promising
            website or application designs solution in order to help your business grow faster.
        </p>
    </div>
             </div>
         </section>


         <!-- services-->
         


         <section class="services" >
             <h3 class="heading">Services</h3>
             <div class="box-container">
                 <div class="box">
                     <span>01</span>
                     <img src="styles/images/mobileapp.png" id="iconmobile" alt="Mobile Application">
                     <h5>Mobile Applications</h5>
                 </div>
               

                <div class="box">
                    <span>02</span>
                    <img src="styles/images/web.png" id="iconweb" alt="Web Development">
                    <h5>Website Development</h5>
                    </div>

                    
                <div class="box">
                    <span>03</span>
                    <img src="styles/images/design.png" id="icondesign" alt="UI/UX Design">
                    <h5>UI/UX Design</h5>
                </div>
            </div>
        </section>

        <article class="howhelp">
            <h2> How We Can Help </h2>
            <p> Every app and web we create and design suit each individual client. <br>
                We offer consultancy and guidance throughout the entire process
               <br>from the first initial idea through to launch.
            </p>
        </article>

        <aside id="newsletter">Newsletter
            <hr>
             <p id="pnews">Enter your email to receive latest information from us</p>
             <form method="post" action="https://mercury.swin.edu.au/it000000/formtest.php" ><input type="email" name="email" id="mailbox" placeholder="name@domain.com" required="required"/>
            <br>
            <button type="submit">Subscribe</button>
            </form>
             </aside>

             <div id="clock">
                 <div class="mid">
                     <span id="hours" class="clocktime">00</span><p class="hms">HOURS</p>
                 </div>
                 <span>:</span>

                 <div class="mid">
                    <span id="minutes" class="clocktime">00</span><p class="hms">MINUTES</p>
                </div>
                <span>:</span>

                <div class="mid">
                    <span id="seconds" class="clocktime">00</span><p class="hms">SECONDS</p>
                </div>
             </div>
    
             
             <div class="view-box">
             <div id="testimonials">

             <div class="user">
                <h4 class="testititle">Testimonials</h4>
                 <p>We have new website built by Je-Tech and it increase 200% number of visitors and 150% number of people fill out the contact forms which really bring benefit to us. 
                     Our website is much easier to use with an appealing visual design. Thanks Je-Tech!</p>
                 <h4 class="testiname">Fesya Rosaline</h4>
             </div>

             <div class="user space">
                <h4 class="testititle">Testimonials</h4>
                <p>I would highly recommend Je-Tech and trusting them for making mobile applications. They were able to launch mobile app just in a few months and works beautifully. 
                    Je-Tech met all our requirements and they also really good on demonstrating their understanding and make make their clients comfortable. 
                    I’m looking forward to work with Je-Tech again in the future.</p>
                <h4 class="testiname">Tom Rivaldo</h4>
            </div>

            <div class="user">
                <h4 class="testititle">Testimonials</h4>
                <p>Je-Tech is amazing! It’s my second time working with Je-Tech, 
                    and The UI designs they made are top-notch. They have delivered consistent high quality designs. 
                    Besides that, Je-tech is an excellent communicator and always meets the deadline. I highly recommend working with Je-Tech.</p>
                <h4 class="testiname">Valisha Celine</h4>
            </div>

            </div>

            <div class="controls">
                <span id="control1"></span>
                <span id="control2" class="activate"></span>
                <span id="control3"></span>
            </div>
           
        </div>
      
        <a href="#" class="buttontop"><i class="far fa-arrow-alt-circle-up"></i></a>
          
            


    <!-- Footer -->
    <?php 
            include_once "footer.inc";
    ?>
   

</div>
        <script src="scripts/enhancements.js"></script>
    </body>

   
   </html>