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
            <a href="Rules.html">Rules</a>
            <a href="Highscore.php">Highscore</a>            
        </nav>  
        
        <article>

            <?php   
                // define all global Database Variables
                $servername = "localhost";
                $username = "root";
                $password = '';
                $dbname = "block";
                $nr = 0;

                // Create connection
                $conn = new mysqli($servername, $username, $password, $dbname);

                // Check connection
                if ($conn->connect_error) 
                {
                    die("Connection failed: " . $conn->connect_error);
                }
                echo "Connected successfully   ";
            
                echo "<br></br>";

                echo "<h1>TOP 10 HIGH SCORES</h1>";

                echo "<br></br>";

                $sql = "SELECT id, playerScore FROM highscores ORDER BY playerscore DESC LIMIT 10";
                $result = $conn->query($sql);

                if($result->num_rows > 0)
                {
                    // output data of each row

                    while($row = $result->fetch_assoc())
                    {
                        $nr++;
                        echo "<p><b>RANK " . $nr . "</b></p>";
                        echo "<p>Player ID: " . $row["id"] . "</p>";
                        echo "<p><b>Player Score: " . $row["playerScore"] . "</b></p>";
                        echo "<br></br>";
                    }

                }else
                    {
                        echo "0 results";
                    }

                $conn->close();
                
            ?> 

        </article>
        
        <footer>
            <h3>READY TO BEAT THESE SCORES?!?</h3>
            <p>Play <a href="Game.html">The Game</a> again!</p>
            </p>
        </footer>
    </body>

</html>