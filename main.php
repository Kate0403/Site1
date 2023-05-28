<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Home</title>
        <link rel="stylesheet" a href="Poliklinika\css3\main\user_style.css">
        <link rel="stylesheet" a href="Poliklinika\css3\main\nurse_style.css">
        <link rel="stylesheet" a href="Poliklinika\css3\main\doc_style.css">
</head>
    <body>
<h1>Wellcome to our hospital</h1>
<!--menu for patient-->
<?php if($_COOKIE['role_cookie']=='user'): ?> <nav class="user">
        <a class="user" href="user_appointments.php">My appointments</a>
        <a class="user" href="new_app_doc.php?p=1">Make an appointmant</a>
        <a class="user" href="user_profile.php">Personal info</a>
        <a class="user" href="doc_stuff.php">Our stuff</a>
      <!--  <a class="user" href="#">Hospital info</a> -->
    <div class="user_animation start-home"></div>
</nav <?php endif; ?>>

<!--menu for nurse-->
<?php if($_COOKIE['role_cookie']=='nurse'): ?> <nav class="nurse">
        <a class="nurse" href="doc_schedule.php">Doctor's schedule</a>
        <a class="nurse" href="patient_app.php">Patient's appointmants</a>
        <a class="nurse" href="doc_stuff.php">Our stuff</a>
    <div class="nurse_animation start-home"></div>
</nav <?php endif; ?>>

<!--menu for doc-->
<?php if($_COOKIE['role_cookie']=='doc'): ?> <nav class="doc">
        <a class="doc" href="my_doc_app.php">My schedule</a>
        <a class="doc" href="history.php">Patient's histories</a>
        <a class="doc" href="doc_stuff.php">Our stuff</a>
    <div class="doc_animation start-home"></div>
</nav <?php endif; ?>>

</body>    
</html>

<?php
$connect = mysqli_connect('localhost', 'root', 'root', 'hospital');

?>