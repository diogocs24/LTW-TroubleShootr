<?php

  try{$db = new PDO('sqlite:database.db');}
  catch (PDOException $e){die("Error: ". $e->getMessage());}
    $result = pg_query($db, "SELECT username, body FROM Ticket");
    while($row = pg_fetch_assoc($result)){
      echo "Username: " . $row['username'] . "<br>";
      echo "Body: " . $row['body'] . "<br><br>";
    }
    pg_close($dbconn);
  
?>