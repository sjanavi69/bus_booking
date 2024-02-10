<?php
// process_bus.php - The page that processes the form submission

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_route'])) {
    // Connect to your MySQL database
   
    $conn = new mysqli('localhost','root','','bus');

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get bus details from the form
    $source = $_POST['src'];
    $dest = $_POST['dest'];
    $bid = $_POST['bus'];

    // Insert bus details into the database
    $sql = "INSERT INTO route(source,destination,b_id) VALUES ('$source','$dest', $bid)";

    if ($conn->query($sql) === TRUE) {
        echo "route added successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>