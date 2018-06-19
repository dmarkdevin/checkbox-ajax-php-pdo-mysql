<?php

include('db_connect.php');

try {
   
    print_r($_POST);

    if(isset($_POST["home"])):
            $sql = "UPDATE users SET name = :name WHERE id = :id ";
            $statement = $conn->prepare($sql);
            $statement->bindValue(':id', $_POST['id']);
            $statement->bindValue(':name', $_POST['home']);
    endif;

    $statement->execute();
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
    
