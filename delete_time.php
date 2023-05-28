<?php 
$connect = mysqli_connect('localhost', 'root', 'root', 'hospital');

$app_id=$_GET['id'];

mysqli_query($connect, query:"DELETE FROM appointments WHERE `appointments`.`Appointment_id` = $app_id");
header('Location: doc_schedule.php');
?>

