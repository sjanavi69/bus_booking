<?php
// process_bus.php - The page that processes the form submission

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_bus'])) {
    // Connect to your MySQL database
   
    $conn = new mysqli('localhost','root','','bus');

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get bus details from the form
    $bus_no = $_POST['bus_no'];
    $bus_name = $_POST['bus_type'];
    $bus_capacity = $_POST['bus_capacity'];
    $dd = $_POST['date'];
    $dt = $_POST['time'];

    // Insert bus details into the database
    $sql = "INSERT INTO bus (b_no,b_type,no_of_seats,departuredate,departuretime) VALUES ('$bus_no','$bus_name', $bus_capacity,$dd, $dt)";

    if ($conn->query($sql) === TRUE) {
        echo "Bus added successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>