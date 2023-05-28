<?php 
$connect = mysqli_connect('localhost', 'root', 'root', 'hospital');

//$doc_id = $_GET['doc_id'];
$old_app_id = $_GET['id'];
$page=$_GET['p'];


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
          
        <p>Doctor</p>
        <?php 
      $ids = mysqli_query($connect, query:"SELECT Doctor_id, Patient_id FROM appointments WHERE Appointment_id=$old_app_id");
      $ids = mysqli_fetch_all($ids);
     $doc_id=$ids[0][0]; 
     $patient_id=$ids[0][1];
        $doc_name = mysqli_query($connect, query:"SELECT Name, Job_title FROM `doctors` WHERE Doctor_id='".$doc_id."'");
        $doc_name = mysqli_fetch_assoc($doc_name);
        //$doc_name['Name']='Rtgfdvd';
        echo $last_url;
        ?>
        <input type="text" name="Name" id="name" value="<?= $doc_name['Name']?> - <?= $doc_name['Job_title']?>" title="You can not change doctor. Delete your appoinntment and make a new one" readonly>
        <p>Date</p>
       
   <select name="dates"> 
<?php 

$dates = mysqli_query($connect, query:"SELECT Appointment_id, Date FROM `appointments` WHERE Doctor_id='".$doc_id."' AND Patient_id IS NULL AND Date > UTC_TIMESTAMP()");
$dates = mysqli_fetch_all($dates); 


echo '
';
for($i=0;$i<count($dates);$i++)
{
echo'
 <option value='.$dates[$i][0].'>'.$dates[$i][1].'</option> 
';


} 
?>
</select>
        <button type="submit" name="submit">Update </button>
        </form>
    </body>
</html>
<?php
// $last_url  = $_SERVER['HTTP_REFERER'];
if(isset($_POST['submit'])){

    $appointment_id=$_POST['dates'];
    $name=$_POST['Name'];
    $check=mysqli_query($connect, query:"SELECT Patient_id FROM `appointments` WHERE Appointment_id='".$appointment_id."'");
    $check=mysqli_fetch_array($check);

if($check[0]==NULL){
    mysqli_query($connect, query:"UPDATE `appointments` SET `Patient_id` = '".$patient_id."' WHERE Appointment_id='".$appointment_id."'");
    mysqli_query($connect, query:"UPDATE `appointments` SET `Patient_id` = NULL WHERE Appointment_id='".$old_app_id."'");

if($page==1){
   header('Location: user_appointments.php');
}
 if($page==2){  
   //$last_url  = 'http://localhost/Site1/patient_app.php';
   header('Location: patient_app.php'); 
}
}
else{
    
    header('Location: update_app.php?id='.$old_app_id.'');
    print_r('Error. Please choose other date and try again');
}
}
?>