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
            background-color: #f2f2f2;
        }
    *{background-color:aliceblue;}
    </style>
<?php
// Connect to MySQL database
$conn = mysqli_connect('localhost','root','','bus');

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


// Retrieve buses from the database
$sql = "SELECT * FROM reservation";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data in a table
    echo "<table>";
    echo "<tr><th>ID</th><th>Reserved date/time</th><th>Number of Seats</th><th>Route ID</th><th>Passenger Name</th><th>Bus Id</th></tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['res_id'] . "</td>";
        echo "<td>" . $row['reserved date/time'] . "</td>";
        echo "<td> ". $row['no_of_persons'] . "</td>";
        echo "<td>" . $row['ro_id'] . "</td>";
        echo "<td>" . $row['name'] . "</td>";
        echo "<td>" . $row['b_id'] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "No reservations found in the database.";
}

?>
 
</body>
</html