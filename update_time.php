<?php 
$connect = mysqli_connect('localhost', 'root', 'root', 'hospital');

$app_id=$_GET['id'];
$date=$_GET['date'];
//$path=mysqli_fetch_all();
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
<p>Patients</p>
       
       <select name="pathient"> 
    <?php 

    $pathient = mysqli_query($connect, query:"SELECT Patient_id, Name, Surname FROM `patients`");
    $pathient = mysqli_fetch_all($pathient); 
    
    
   echo ' <option value="NULL">NO patient</option>';
    for($i=0;$i<count($pathient);$i++)
    {
    echo'
     <option value='.$pathient[$i][0].'>'.$pathient[$i][1].' '.$pathient[$i][2].'</option> 
    ';
    
    
    } 
    ?>
    </select>
<br>
    <label for="date">Enter appointment time in yyyy-mm-dd hh-mm-ss format</label>
        
      <input type="datetime" id="date" name="date" value="<?php echo $date;?>">
    
<br>
    <button type="submit" name="submit">Update an appointment</button>
        </form>

    </body>
</html>

<?php

if(isset($_POST['submit'])){
    
   $path_id=$_POST['pathient'];
   $date=$_POST['date'];

    mysqli_query($connect, query:"UPDATE `appointments` 
    SET `Patient_id` = $path_id, `Date`='$date'
     WHERE `Appointment_id`='$app_id'");
 
        //$last_url  = 'http://localhost/Site1/patient_app.php';
    header('Location: doc_schedule.php'); //НЕ РАБОТАЕТ!!!!
}

?>