<?php 
$connect = mysqli_connect('localhost', 'root', 'root', 'hospital');
$patient_id=$_COOKIE['user_id'];
$doc_id = $_GET['doc_id'];
$old_app_id = $_GET['id'];


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
        
       // echo $doc_id;
        $doc_name = mysqli_query($connect, query:"SELECT Name, Job_title FROM `doctors` WHERE Doctor_id='".$doc_id."'");
        $doc_name = mysqli_fetch_assoc($doc_name);
        //$doc_name['Name']='Rtgfdvd';
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
if(isset($_POST['submit'])){
    
    $appointment_id=$_POST['dates'];
    $name=$_POST['Name'];
    $check=mysqli_query($connect, query:"SELECT Patient_id FROM `appointments` WHERE Appointment_id='".$appointment_id."'");
    $check=mysqli_fetch_array($check);

if($check[0]==NULL){
    mysqli_query($connect, query:"UPDATE `appointments` SET `Patient_id` = '".$patient_id."' WHERE Doctor_id='".$doc_id."' AND Appointment_id='".$appointment_id."'");
    mysqli_query($connect, query:"UPDATE `appointments` SET `Patient_id` = null WHERE Doctor_id='".$doc_id."' AND Appointment_id='".$old_app_id."'");

    header('Location: user_appointments.php');
}
else{
    
    header('Location: update_app.php?id='.$old_app_id.'&doc_id= '.$doc_id.'');
    print_r('Error. Please choose other date and try again');
}
}
?>