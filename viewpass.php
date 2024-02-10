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
$sql = "SELECT * FROM passenger";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data in a table
    echo "<table>";
    echo "<tr><th>ID</th><th>Name</th><th>Age</th><th>Address</th><th>Contact Number</th></tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['p_id'] . "</td>";
        echo "<td>" . $row['Name'] . "</td>";
        echo "<td> ". $row['age'] . "</td>";
        echo "<td>" . $row['address'] . "</td>";
        echo "<td>" . $row['contact_number'] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "No passengers found in the database.";
}

?>
 
</body>
</html