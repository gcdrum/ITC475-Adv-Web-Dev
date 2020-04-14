<html>

        <head>
            <link rel="stylesheet" href="Style1.css">
        </head>

    <body>

        <header>

            <img src="mega travel logo.png" alt="Mega Logo" width="400px" height="200px">

        </header>

        <article>

        <div class="col-1-2" id="contact">

            <p>Thank you for submitting your travel agent contact request! Here is the information you submitted:</p>

            <br>

            <p>Client First name: <?php echo $_POST['firstName']; ?></p>

            <p>Client Last name: <?php echo $_POST["lastName"]; ?></p>

            <p>Client Phone Number: <?php echo $_POST["phoneNumber"]; ?></p>

            <p>Client Email: <?php echo $_POST["emailAddress"]; ?></p>

            <p>Number of Adults: <?php echo $_POST["numAdults"]; ?></p>

            <p>Number of Children: <?php echo $_POST["numChildren"]; ?></p>

            <!--<p>Destination: Data recieved from checkbox </p>--> 
            <p>Destination:  
                <?php
                if(!empty($_POST['destinationSelection']))
                {
                // Loop to store and display values of individual checked checkbox.
                foreach($_POST['destinationSelection'] as $selected)
                {
                echo $selected;
                }
                }
                ?>
            </p>

            <p>Travel Dates: <?php echo $_POST["dateOfTrip"]; ?></p>   

            <!--<p>Interested activites: Data recieved from checkbox </p>--> 
            <p>Interested activities:   
                <?php
                if(!empty($_POST['activitiesSelection']))
                {
                // Loop to store and display values of individual checked checkbox.
                foreach($_POST['activitiesSelection'] as $selected)
                {
                echo $selected;
                }
                }
                ?>
                </p>  
                
            <p>An agent will be in touch with you soon!</p>

            </div>
            </article>

    </body>

    <footer>

            <p>Copyright Protected. All rights reserved.<br>
               <br>
               MEGA TRAVELS<br>
               mega@travels.com
            </p>
            
    </footer>

</html>

