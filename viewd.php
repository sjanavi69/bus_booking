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
        #deletedriver,#adddriver{font-size: 18px;}
        *{ background-color: beige;}
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid burlywood;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color:khaki;
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
$sql = "SELECT * FROM driver";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data in a table
    echo "<table>";
    echo "<tr><th>ID</th><th>Name</th><th>Age</th><th>Contact Number</th><th>Address</th><th>Bus Id</th></tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['d_id'] . "</td>";
        echo "<td>" . $row['Name'] . "</td>";
        echo "<td>" . $row['age'] . "</td>";
        echo "<td>" . $row['contact_no'] . "</td>";
        echo "<td>" . $row['address'] . "</td>";
        echo "<td>" . $row['b_id'] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "No drivers found in the database.";
}

?>
  <br><br>
  <center><button type="button" id="adddriver" onclick="toggleform()">Add new driver</button></center>
  <form method="post" action="processd.php" style="display:none; margin-left:40%;" id="driverForm">
  <label for="name"> Name:</label>
        <input type="text" id="name" name="name" required><br><br><br>

        <label for="age">Age:</label>
        <input type="number" id="age" name="age" required><br><br><br>

        <label for="address">Address:</label>
        <input type="text" id="address" name="address" required><br><br><br>

        <label for="phone">Phone Number:</label>
        <input type="number" id="phone" name="phone" required><br><br><br>

        <label for="bus">Bus Id:</label>
        <input type="number" id="bus" name="bus" min="1" required><br><br><br> 

        <button type="submit" name="add_d">Add</button>
    </form>
  <br>
    <center><button type="button" id="deletedriver" onclick="toggle()">Delete a driver</button></center>
   <form method="post" action="" style="display:none; margin-left:40%;" id="deletedriverForm">
        <label for="d_id">Driver id:</label>
        <input type="text" id="d_id" name="d_id" required><br><br>
        <button type="submit" name="delete_d">Delete</button>
   </form>
   <?php

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_d'])) {
    // Get bus ID from the form
    $d_id = $_POST['d_id'];

    // Delete bus from the database
    $sql = "DELETE FROM driver WHERE d_id =' $d_id'";

    if ($conn->query($sql) === TRUE) {
        echo "driver details deleted successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

    <script>
        function toggleform() {
            $('#driverForm').toggle();
        }
        function toggle() {
            $('#deletedriverForm').toggle();
        }
    </script>
</body>
</html>