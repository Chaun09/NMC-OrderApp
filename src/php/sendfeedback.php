<?php
 include "config.php";

 



// Check the connection
if ($link->connect_error) {
    die("Connection failed: " . $link->connect_error);
}

// Check if the form is submitted
if (isset($_POST['send'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];
    
    // Prepare the SQL statement to insert the data into the database
    $sql = "INSERT INTO feedback (fullname, email, phone, MESSAGE_TEXT) VALUES ('$name', '$email', '$phone', '$message')";
    
    if ($link->query($sql) === TRUE) {
        echo "Data inserted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $link->error;
    }
}

// Close the database connection
$link->close();
?>