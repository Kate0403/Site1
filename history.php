<?php 
$connect = mysqli_connect('localhost', 'root', 'root', 'hospital');
$patient_id=$_GET['patient_id'];
?>

<!DOCTYPE  html>
<html lang="en">
    <head>
        <title>My appoinments</title>
        <link rel="stylesheet" a href="Poliklinika\css3\main\user_style.css">
        <link rel="stylesheet" a href="Poliklinika\css3\user_pages\my_appointments.css">
   
</head>

    <body>
    <h1>Histories</h1>
        <table>
            <tr class="head">
               <th>Patient name</th>
                <th>Date of birth</th>
                <th>Address</th>
                <th>History</th>
                <th>Actoins</th>
            </tr>
            
            
            <?php
       if($patient_id){
            $appointments = mysqli_query($connect, query:"SELECT Name, Surname, Date_of_birth, Address, medical_cards.Diagnosis, patients.Patient_id FROM patients LEFT JOIN medical_cards ON patients.Patient_id=medical_cards.Patient_id WHERE patients.Patient_id=$patient_id");
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
           <td>' .$appointments[0]. ' '.$appointments[1].'</td>
           <td>' .$appointments[2].'</td>
           <td>' .$appointments[3].'</td>
           <td>' .$appointments[4].'</td>

                   <td><a href="update_history.php?patient_id='.$appointments[5].'">Update history</a></td>
               </tr>
            ';
           }
        }
    }
        else{
            $appointments = mysqli_query($connect, query:"SELECT Name, Surname, Date_of_birth, Address, medical_cards.Diagnosis, patients.Patient_id FROM patients LEFT JOIN medical_cards ON patients.Patient_id=medical_cards.Patient_id");
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
           <td>' .$appointments[0]. ' '.$appointments[1].'</td>
           <td>' .$appointments[2].'</td>
           <td>' .$appointments[3].'</td>
           <td>' .$appointments[4].'</td>
                   <td><a href="update_history.php?patient_id='.$appointments[5].'">Update history</a></td>
               </tr>
               ';
              }
           }
        }
            ?>

        </table>
            

    </body>
</html>
