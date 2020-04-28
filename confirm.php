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

            <!--SQL-->

            <?php
            // define global database Variables
            $servername = "localhost";
            $username = "root";
            $password = '';
            $dbname = "megaDB";
            $firstName = $_POST['firstName'];
            $lastName = $_POST['lastName'];
            $phoneNumber = $_POST["phoneNumber"];
            $email = $_POST["emailAddress"];
            $numberOfAdults = $_POST["numAdults"];
            $numberOfChilderen = $_POST["numChildren"];
            $destination= $_POST["destinationSelection"];
            $destination1 = $destination[0];
            $traveldate = $_POST["dateOfTrip"];
            $activities = $_POST["activitiesSelection"];
            $activities1 = isset($activities[0]) ? $activities[0] : null;
            $activities2 = isset($activities[1]) ? $activities[1] : null;
            $activities3 = isset($activities[2]) ? $activities[2] : null;
            $activities4 = isset($activities[3]) ? $activities[3] : null;
            $activities5 = isset($activities[4]) ? $activities[4] : null;

            // Create connection
                $conn = new mysqli($servername, $username, $password);

                // Check connection
                if ($conn->connect_error) 
                {
                    die("Connection failed: " . $conn->connect_error);
                }
                echo "Connected successfully   ";
            
                echo "<br></br>";

             //   Create database
                $sql = "CREATE DATABASE megaDB";
                if ($conn->query($sql) === TRUE) 
                {
                    echo "Database created successfully   ";
                } else 
                {
                    echo "Error creating database: " . $conn->error;
                }

                $conn->close();    
                echo "<br></br>";

                $conn = new mysqli($servername, $username, $password, $dbname);
                // Check connection
                if ($conn->connect_error) 
                {
                    die("Connection failed: " . $conn->connect_error);
                }
                // sql to create table
                $sql = "CREATE TABLE Customer 
                            (
                                id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                                firstname VARCHAR(30) NOT NULL,
                                lastname VARCHAR(30) NOT NULL,
                                phonenumber VARCHAR(30) NOT NULL,
                                email VARCHAR(50) NOT NULL,
                                numberofadults VARCHAR(30) NOT NULL,
                                numberofchildren VARCHAR(30) NOT NULL,
                                destination1 VARCHAR(30),
                                traveldate VARCHAR(30) NOT NULL,
                                activities1 VARCHAR(30),
                                activities2 VARCHAR(30),
                                activities3 VARCHAR(30),
                                activities4 VARCHAR(30),
                                activities5 VARCHAR(30)
                            )";
    
                if ($conn->query($sql) === TRUE) 
                {
                    echo "Table Customer created successfully";
                } else 
                {
                    die("Error creating table: " . $conn->error);
                }

                echo "<br></br>";

                //Insert Records
                $sql = "INSERT INTO Customer (firstname, lastname, phonenumber, email, numberofadults, numberofchildren, destination1, traveldate, activities1,  activities2,  activities3,  activities4,  activities5)
                    VALUES ('$firstName', '$lastName','$phoneNumber','$email','$numberOfAdults','$numberOfChilderen','$destination1','$traveldate','$activities1','$activities2','$activities3','$activities4','$activities5')";

                if ($conn->query($sql) === TRUE) 
                {
                    echo "New record created successfully";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }

                $conn->close();
            
                ?> 
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

