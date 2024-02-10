<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>
<body>
    <style>
        pre{ font-size: 18px;}
        #addbus{margin-left: 40%;
        font-size: 18px;}
        #deletebus{font-size: 18px;}
        *{background-color:blanchedalmond;}
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color:navajowhite;
        }
    </style>
<?php
// Connect to MySQL database
$conn = mysqli_connect('localhost','root','','bus');

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


// Retrieve buses from the database
$sql = "SELECT * FROM bus";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data in a table
    echo "<table>";
    echo "<tr><th>ID</th><th>Bus Number</th><th>Bus Type</th><th>Number Of Seats</th><th>Departure Date</th><th>Departure Time</th></tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['b_id'] . "</td>";
        echo "<td>" . $row['b_no'] . "</td>";
        echo "<td>" . $row['b_type'] . "</td>";
        echo "<td>" . $row['no_of_seats'] . "</td>";
        echo "<td>" . $row['departuredate'] . "</td>";
        echo "<td>" . $row['departuretime'] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "No buses found in the database.";
}

?>
  <br><br>
  <button type="button" id="addbus" onclick="toggleform()">Add new bus</button>
  <form method="post" action="process_bus.php" style="display:none; margin-left:40%;" id="busForm">
        <label for="bus_no">Bus Number:</label>
        <input type="text" id="bus_no" name="bus_no" required><br><br>

        <label for="bus_type">Bus Type:</label>
        <input type="text" id="bus_type" name="bus_type" required><br><br>

        <label for="bus_capacity">No Of Seats:</label>
        <input type="number" id="bus_capacity" name="bus_capacity" min="1" required><br><br>

        <label for="date">Departure Date:</label>
        <input type="date" id="date" name="date" min="1" required><br><br>

        <label for="time">Departure Time:</label>
        <input type="text" id="time" name="time" min="1" required><br><br>

        <button type="submit" name="add_bus">Add</button>
    </form>

    <button type="button" id="deletebus" onclick="toggle()">Delete a bus</button>
   <form method="post" action="" style="display:none; margin-left:40%;" id="deletebusForm">
        <label for="bus_id">Bus id:</label>
        <input type="text" id="bus_id" name="bus_id" required><br><br>
        <button type="submit" name="delete_bus">Delete</button>
   </form>
   <?php

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_bus'])) {
    // Get bus ID from the form
    $bus_id = $_POST['bus_id'];

    // Delete bus from the database
    $sql = "DELETE FROM bus WHERE b_id =' $bus_id'";

    if ($conn->query($sql) === TRUE) {
        echo "Bus deleted successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

    <script>
        function toggleform() {
            $('#busForm').toggle();
        }
        function toggle() {
            $('#deletebusForm').toggle();
        }
    </script>
</body>
</html>