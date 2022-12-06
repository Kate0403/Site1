<?php 
$connect = mysqli_connect('localhost', 'root', 'root', 'hospital');

$app_id = $_GET['id'];

mysqli_query($connect, query:"UPDATE `appointments` SET `Patient_id` = null WHERE Appointment_id='".$app_id."'");
header('Location: user_appointments.php');
?>


