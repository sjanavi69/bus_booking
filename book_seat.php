<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<style>
        .ticket {
            border: 2px solid #000;
            padding: 10px;
            width: 300px;
        }

        .ticket-info {
            margin-bottom: 10px;
        }

        .label {
            font-weight: bold;
        }
    </style>
<?php
    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['book'])) {
        // Perform the desired PHP function
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
    $route = $_POST['route'];
    $seats=$_POST['seats'];
    $bus=$_POST['bus'];
    
    $sql = "INSERT INTO passenger(Name,age,address,contact_number) VALUES ('$name',$age,'$address', $phone)";
    if ($conn->query($sql) === TRUE) {
        echo "<center><large>Reservation done successfully!</large><center>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $sql = "INSERT INTO reservation(no_of_persons,ro_id,name,b_id) VALUES ($seats,$route,'$name',$bus)";
    if ($conn->query($sql) === TRUE) {
        echo "<br><button type='submit' id='tic'>get your ticket</button><br><br>";

    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    $sql = "SELECT res_id FROM reservation WHERE name='$name' ";
   $r=$conn->query($sql);
   if($r === False){
    die("error: ".$conn->error);
   }
   $row=$r->fetch_assoc();
   $resid=$row['res_id'];
   $amount=$resid-200;

   $sql = "INSERT INTO ticket(res_id,amount,payment_method) VALUES ($resid,$amount,'cash')";
    if ($conn->query($sql) === TRUE) {
        echo "<br>";

    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
   
    $sq="SELECT * FROM ticket WHERE res_id = $resid";
    $r=$conn->query($sq);
    if($r === False){
     die("error: ".$conn->error);
    }
    $row=$r->fetch_assoc();
    $resid=$row['res_id'];
    $tno=$row['t_no'];
    $dt=$row['date/time'];
    $pm=$row['payment_method'];
    $amt=$row['amount'];
    // Close the database connection
   $conn->close();
    }
    ?>
    
    <div class="ticket"   style="display:none"; id="tick">
        <div class="ticket-info">
            <span class="label">Ticket No:</span> <?php echo $tno; ?>
        </div>
        <div class="ticket-info">
            <span class="label">Reservation ID:</span> <?php echo $resid; ?>
        </div>
        <div class="ticket-info">
            <span class="label">Date/Time:</span> <?php echo $dt; ?>
        </div>
        <div class="ticket-info">
            <span class="label">Amount:</span> <?php echo $amt; ?>
        </div>
        <div class="ticket-info">
            <span class="label">Payment Method:</span> <?php echo $pm; ?>
        </div>
    </div>
 
    <script>
       document.getElementById('tic').addEventListener('click', function() {
        // Toggle the visibility of the ticket block
        var ticketBlock = document.getElementById('tick');
        ticketBlock.style.display = (ticketBlock.style.display === 'none') ? 'block' : 'none';
    }); 
    </script>
    </body>
</html>