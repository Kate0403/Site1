<?php 
$connect = mysqli_connect('localhost', 'root', 'root', 'hospital');

$app_id = $_GET['id'];
$page=$_GET['p'];

mysqli_query($connect, query:"UPDATE `appointments` SET `Patient_id` = null WHERE Appointment_id='".$app_id."'");
if($page==1){
    header('Location: user_appointments.php');
 }
  if($page==2){  
    //$last_url  = 'http://localhost/Site1/patient_app.php';
    header('Location: patient_app.php'); //НЕ РАБОТАЕТ!!!!
 }
?>


