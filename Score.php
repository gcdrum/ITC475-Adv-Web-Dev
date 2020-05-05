<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8" />
        <meta name="keywords" content="Breaking Blocks game" />
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <link rel="stylesheet" href="StyleGame.css">
        <meta charset="utf-8" />
        <title>Scores</title>
    </head>
    
    <body>
        <header>       
            <img src="logo.jpg" alt="Game Logo" width="50%" height="50%">
        </header>

        <div class ="subHead"> 

        <nav>
            <a href="Game.html">Game</a>
            <a href="rules.html">Rules</a>
            <a href="highscore.php">High Scores</a>             
        </nav>
        
        <article>

            <?php   

                // define all global Database Variables
                $servername = "localhost";
                $username = "root";
                $password = '';
                $dbname = "block";
                $playerScore = $_GET['score'];

                echo "<h1>Score Results</h1>";
                echo "<br></br>";
                echo "<p>Score : " . $playerScore . "</p>";
                echo "<br></br>";

                // Create connection
                $conn = new mysqli($servername, $username, $password);

                //Check connection
                if ($conn->connect_error) 
                {
                    die("Connection failed: " . $conn->connect_error);
                }
                echo "Connected successfully   ";
                echo "<br></br>";

                // Create database
                $sql = "CREATE DATABASE block";
                if ($conn->query($sql) === TRUE) 
                {
                    echo "Database created successfully   ";
                } else 
                {
                    echo "Error creating database: " . $conn->error;
                }

                $conn->close();

                echo "<br></br>";

                // Create connection
                $servername = "localhost";
                $username = "root";
                $password = '';
                $dbname = "block";

                $conn = new mysqli($servername, $username, $password, $dbname);

                //Check connection
                if ($conn->connect_error) 
                {
                    die("Connection failed: " . $conn->connect_error);
                }
                echo "Connected successfully   ";
            
                echo "<br></br>";

                //Create Table
                $sql = "CREATE TABLE highscores 
                    (
                        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                        playerscore INT(30) NOT NULL
                    )";
    
                if ($conn->query($sql) === TRUE) 
                {
                    echo "Table HighScores created successfully";
                } else 
                {
                    echo "Error creating table: " . $conn->error;
                }

                    echo "<br></br>";


                //Insert Records
                $sql = "INSERT INTO highscores (playerscore)
                    VALUES ('$playerScore')";

                if ($conn->query($sql) === TRUE) 
                {
                    echo "New record created successfully";
                } else 
                {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }

                $conn->close();

            ?> 

        </article>
        
        <footer>
            <h3>PLAY AGAIN BY <a href="Game.html">CLICKING HERE</a>!</h3>
        </footer>
    </body>

</html>