<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <style>
        form{position: center;}
        *{background-color: blanchedalmond;
        color: black;}
    </style>
    <center><h1>Reservation form</h1>
   <form id="bookingForm"  method="post" action="book_seat.php">
        <label for="name">Full Name:</label>
        <input type="text" id="name" name="name" required><br><br><br>

        <label for="age">Age:</label>
        <input type="number" id="age" name="age" required><br><br><br>

        <label for="address">Address:</label>
        <input type="text" id="address" name="address" required><br><br><br>

        <label for="phone">Phone Number:</label>
        <input type="number" id="phone" name="phone" required><br><br><br>

        <label for="route">Route id:</label>
        <input type="text" id="route" name="route" required><br><br><br>

        <label for="seats">Number of Seats:</label>
        <input type="number" id="seats" name="seats" min="1" required><br><br><br>

        <label for="bus">Bus Id:</label>
        <input type="number" id="bus" name="bus" min="1" required><br><br><br> 

        <button type="submit" name="book">Book Now</button>
        
    </form></center>
    
</body>
</html>