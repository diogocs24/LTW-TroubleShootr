<?php
try {
    $db = new PDO('sqlite:tickets.db');
} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}


    $username = $_POST['username'] ?? '';
    $body = $_POST['body'] ?? '';
    $idTicket = 1;
    $idDepartment = 2;
    $idClient = 3;

    if (!empty($username) && !empty($body)) {
        $ins = $db->prepare('INSERT INTO question (username, body, idClient, idDepartment, idTicket) VALUES (:username, :body, :idClient, :idDepartment, :idTicket)');
        $ins->bindParam(':username', $username);
        $ins->bindParam(':body', $body);
        $ins->bindParam(':idTicket', $idTicket);
        $ins->bindParam(':idDepartment', $idDepartment);
        $ins->bindParam(':idClient', $idClient);
        if ($ins->execute()) {
            echo "Data inserted successfully!";
        } else {
            echo "Error inserting data: " . $ins->errorInfo()[2];
        }
    } else {
        echo "Please enter a username and body.";
    }

?>