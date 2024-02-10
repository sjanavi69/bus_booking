<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bus Booking System</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <style>
        *{background-image: url(image/images.jpg);
            background-repeat: no-repeat;
        background-size: cover;}
        button{ margin-top: 20%;
        font-size: large;}
        h3{ font-size: large;}
    </style>
<?php
  $conn = mysqli_connect('localhost','root','','bus');

 echo "<center><h1>Bus Booking System</h1></center>";
 echo "<h3><pre><a href='index.php'>home</a>     <a href='viewbus.php'>view buses</a>     <a href='viewroutes.php'>view routes</a>      <a href='viewres.php'>view reservations</a>      <a href='viewpass.php'>view passengers</a>      <a href='viewd.php'>view drivers</a></pre></h3>";    

// Close MySQL connection
mysqli_close($conn);
?>

   <center><button type="button" onclick="redirect()">Reserve your ticket</button></center>

   <script>
    function redirect(){
        window.location.href='reservation.php';
    }
   </script>
</body>
</html>