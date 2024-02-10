<?php
// process_bus.php - The page that processes the form submission

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_d'])) {
    // Connect to your MySQL database
   
    $conn = new mysqli('localhost','root','','bus');

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get bus details from the form
    $name = $_POST['name'];
    $age = $_POST['age'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $bus = $_POST['bus'];

    // Insert bus details into the database
    $sql = "INSERT INTO driver (Name, age,contact_no,address, b_id) VALUES ('$name',$age,$phone,'$address',$bus)";

    if ($conn->query($sql) === TRUE) {
        echo "driver added successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>