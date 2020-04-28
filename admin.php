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

                <p>The information submitted to the megaDB is as follows:</p>

                <br>

                <?php

                    // Declare variables
                        $servername = "localhost";
                        $username = "root";
                        $password = '';
                        $dbname = "megaDB";

                    // Create connection
                        $conn = new mysqli($servername, $username, $password, $dbname);

                    // Check connection
                        if ($conn->connect_error) 
                        {
                            die("Connection failed: " . $conn->connect_error);
                        }
                        echo "Connected successfully   ";
                    
                        echo "<br></br>";

                    //Display data from table
                    $sql = "SELECT id, firstname, lastname, phonenumber, email, numberofadults, numberofchildren, 
                     destination1, traveldate, activities1, activities2, activities3, activities4, activities5 FROM customer";
                    $result = $conn->query($sql);
                    
                    if ($result->num_rows > 0) {
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                            echo "<p>Client name: ". $row["firstname"]. " " . $row["lastname"]. "<p>Client Phone Number: ". $row["phonenumber"].
                             "<p>Client Email: ". $row["email"]. "<p>Number of Adults: ". $row["numberofadults"]. "<p>Number of Children: " . $row["numberofchildren"].
                              "<p>Destination: " . $row["destination1"]. "<p>Travel Dates: " . $row["traveldate"]. "<p>Interested Activities: " . $row["activities1"]. "<br>";
                        }
                    } else {
                        echo "0 results";
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

