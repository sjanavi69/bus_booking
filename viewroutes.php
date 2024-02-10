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
        #addroute{margin-left: 40%;
        font-size: 18px;}
        #deleteroute{margin-left: 40%; font-size: 18px;}
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
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
$sql = "SELECT * FROM route";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data in a table
    echo "<table>";
    echo "<tr><th>ID</th><th>Source</th><th>Destination</th></tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['ro_id'] . "</td>";
        echo "<td>" . $row['source'] . "</td>";
        echo "<td>" . $row['destination'] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "No routes found in the database.";
}

?>
  <br><br>
<button type="button" id="addroute" onclick="toggleform()">Add new route</button>
  <form method="post" action="process_route.php" style="display:none; margin-left:40%;" id="routeform">
        <label for="src">Source:</label>
        <input type="text" id="src" name="src" required><br><br>

        <label for="dest">Destination:</label>
        <input type="text" id="dest" name="dest" required><br><br>

        <label for="bus">Bus Id:</label>
        <input type="number" id="bus" name="bus" min="1" required><br><br>

        <button type="submit" name="add_route">Add</button>
    </form>
    
    <br><br>
    <button type="button" id="deleteroute" onclick="toggle()">Delete a route</button>
   <form method="post" action="" style="display:none; margin-left:40%;" id="deleterouteForm">
        <label for="ro_id">Route id:</label>
        <input type="text" id="ro_id" name="ro_id" required><br><br>
        <button type="submit" name="delete_route">Delete</button>
   </form>
   <?php

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_route'])) {
    // Get bus ID from the form
    $ro_id = $_POST['ro_id'];

    // Delete bus from the database
    $sql = "DELETE FROM route WHERE ro_id =' $ro_id'";

    if ($conn->query($sql) === TRUE) {
        echo "route deleted successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

    <script>
        function toggleform() {
            $('#routeform').toggle();
        }
        function toggle() {
            $('#deleterouteForm').toggle();
        }
    </script>
</body>
</html>