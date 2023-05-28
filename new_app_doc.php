<?php 
$connect = mysqli_connect('localhost', 'root', 'root', 'hospital');

if(!$_GET['path_id']){ //смотрим есть ли в get user_id. если нет, то берём из cookie
$patient_id=$_COOKIE['user_id'];
}
else{
    $patient_id=$_GET['path_id'];
}
$doc_id = $_GET['doc_id'];

$page=$_GET['p'];

?>

<!DOCTYPE  html>
<html lang="en">
    <head>
        <title>New appoinment</title>
        <link rel="stylesheet" a href="Poliklinika\css3\main\user_style.css">
        <link rel="stylesheet" a href="Poliklinika\css3\user_pages\my_appointments.css">
   
</head>

    <body>
    <h1>New appointment</h1>
    <form action="" method="POST">
<p>Doctors</p>
       
       <select name="docs"> 
    <?php 

    $docs = mysqli_query($connect, query:"SELECT Doctor_id, Name, Job_title FROM `doctors`");
    $docs = mysqli_fetch_all($docs); 
    
    
    echo '
    ';
    for($i=0;$i<count($docs);$i++)
    {
    echo'
     <option value='.$docs[$i][0].'>'.$docs[$i][1].' - '.$docs[$i][2].'</option> 
    ';
    
    
    } 
    ?>
    </select>
    <button type="update" name="update">Get available time</button>
    <p>Available dates for visit to
         <?
           //  echo $patient_id;
    $chosen_doc = mysqli_query($connect, query:"SELECT Name, Job_title FROM `doctors` WHERE Doctor_id='".$doc_id."'");
    $chosen_doc = mysqli_fetch_row($chosen_doc); 
         echo $chosen_doc[0], ' - ', $chosen_doc[1];
         ?>
        </p>
       
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
<br>
    <button type="submit" name="submit">Create an appointment</button>
        </form>

    </body>
</html>

<?php
if(isset($_POST['update'])){
    
    $doc_id=$_POST['docs'];
    header('Location: new_app_doc.php?doc_id= '.$doc_id.'&path_id='.$patient_id.'&p='.$page.'');
}
if(isset($_POST['submit'])){
    
    $appointment_id=$_POST['dates'];
    $check=mysqli_query($connect, query:"SELECT Patient_id FROM `appointments` WHERE Appointment_id='".$appointment_id."'");
    $check=mysqli_fetch_array($check);

if($check[0]==NULL){
    mysqli_query($connect, query:"UPDATE `appointments` SET `Patient_id` = '".$patient_id."' WHERE Doctor_id='".$doc_id."' AND Appointment_id='".$appointment_id."'");

    if($page==1){
        header('Location: user_appointments.php');
     }
      if($page==2){  
        //$last_url  = 'http://localhost/Site1/patient_app.php';
        header('Location: patient_app.php'); //НЕ РАБОТАЕТ!!!!
     }
}
else{
    
    header('Location: new_app_doc.php?doc_id= '.$doc_id.'&path_id='.$patient_id.'&p='.$page.'');
    print_r('Error. Please choose other date and try again');
}
}
?>