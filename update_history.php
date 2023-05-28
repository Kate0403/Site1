<?php 
$connect = mysqli_connect('localhost', 'root', 'root', 'hospital');

$patient_id=$_GET['patient_id'];

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
    <h1>Update history</h1>
    <form action="" method="POST">
        <p>Patient data</p>
    <label for="name">Name</label>
       
       
    <?php 
 //echo $patient_id;
    $pathient_history = mysqli_query($connect, query:"SELECT Name, Surname, Date_of_birth, medical_cards.Diagnosis FROM patients LEFT JOIN medical_cards ON patients.Patient_id=medical_cards.Patient_id WHERE patients.Patient_id=$patient_id");
    $pathient_history = mysqli_fetch_row($pathient_history);
   // echo $patient_id;
    //echo $pathient_history[0]; 
 echo ' <input type="text" id="name" name="name" value="'.$pathient_history[0].'" readonly>
 <br><label for="surname">Surname</label>
 <input type="text" id="surname" name="surname" value="'.$pathient_history[1].'" readonly>
 <br><label for="bd">Surname</label>
 <input type="text" id="bd" name="bd" value="'.$pathient_history[2].'" readonly>
 <br><label for="history">History</label>
 <textarea type="text" id="history" name="history" style="width: 600px; height: 90px;">'.$pathient_history[3].'</textarea>
 ';

 ?>
<br>
   
<br>
    <button type="submit" name="submit">Update a History</button>
        </form>

    </body>
</html>

<?php

if(isset($_POST['submit'])){
    
   $history=$_POST['history'];
 

    mysqli_query($connect, query:"UPDATE medical_cards  SET Diagnosis = '$history' WHERE Patient_id=$patient_id");
 
        //$last_url  = 'http://localhost/Site1/patient_app.php';
    header('Location: history.php'); //НЕ РАБОТАЕТ!!!!
}

?>