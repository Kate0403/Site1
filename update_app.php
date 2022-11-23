<?php 
$connect = mysqli_connect('localhost', 'root', 'root', 'hospital');
?>

<!DOCTYPE  html>
<html lang="en">
    <head>
        <title>Update appointment</title>
        <link rel="stylesheet" a href="Poliklinika\css3\main\user_style.css">
        <link rel="stylesheet" a href="Poliklinika\css3\user_pages\my_appointments.css">
   
</head>

    <body>
    <h1>Update my appointment</h1>
        <form action="" method="POST">
        <p>Date</p>
        <input type="text" name="yyyy-mm-dd hh:mm"> --!надо найти на ютубе как сделать календарь пикер--!
        <p>Doctor</p>
        <input type="text" name="xxxxxx">
        <button type="submit">Update 
        </form>
    </body>
</html>
