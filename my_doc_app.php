<?php 
$connect = mysqli_connect('localhost', 'root', 'root', 'hospital');
?>

<!DOCTYPE  html>
<html lang="en">
    <head>
        <title>My appoinments</title>
        <link rel="stylesheet" a href="Poliklinika\css3\main\user_style.css">
        <link rel="stylesheet" a href="Poliklinika\css3\user_pages\my_appointments.css">
   
</head>

    <body>
    <h1>My appointments</h1>
        <table>
            <tr class="head">
               <th>Date</th>
               <th>Patient name</th>
                <th>Date of birth</th>
                <th>Actions</th>
            </tr>
            
            
            <?php
            $user_id= $_COOKIE['user_id'];
            $appointments = mysqli_query($connect, query:"SELECT Date, patients.Name, patients.Surname, patients.Date_of_birth, patients.Patient_id FROM appointments LEFT JOIN patients ON appointments.Patient_id=patients.Patient_id WHERE Doctor_id=$user_id AND Date > UTC_TIMESTAMP() AND patients.Patient_id <> 'NULL'");
         // $appointments = mysqli_query($connect, query:"SELECT * FROM `appointments`");
           // var_dump($appointments);

           if(mysqli_num_rows($appointments)==0){
            echo'
            <tr>
            <td colspan="5" align="center">You do not have any appoinments</td>
            </tr>
            ';
           }
           else{
           $appointments = mysqli_fetch_all($appointments);
           //var_dump($appointments);
           
           foreach($appointments as $appointments){
        echo '
        <tr>
               <td>' .$appointments[0]. '</td>
               <td>' .$appointments[1]. ' '.$appointments[2].'</td>
                <td>' .$appointments[3].'</td>
                <td><a href="history.php?patient_id='.$appointments[4].'">View history</a></td>
            </tr>
            ';
           }
        }
            ?>

        </table>
            

    </body>
</html>
