<?php 
$connect = mysqli_connect('localhost', 'root', 'root', 'hospital');
?>

<!DOCTYPE  html>
<html lang="en">
    <head>
        <title>Personal data</title>
        <link rel="stylesheet" a href="Poliklinika\css3\main\user_style.css">
        <link rel="stylesheet" a href="Poliklinika\css3\user_pages\my_appointments.css">
   
</head>

    <body>
    <h1>My personal data</h1>
        <table>
            <tr class="head">
               <th>Name</th>
               <th>Surname</th>
                <th>Date of birth</th>
                <th>Address</th>
            </tr>
            
            
            <?php
            $user_id= $_COOKIE['user_id'];
            $info = mysqli_query($connect, query:"SELECT * FROM patients WHERE Patient_id='".$user_id."'");
         // $appointments = mysqli_query($connect, query:"SELECT * FROM `appointments`");
           // var_dump($appointments);

           if(mysqli_num_rows($info)==0){
            echo'
            <tr>
            <td colspan="4" align="center">You do not have any info</td>
            </tr>
            ';
           }
           else{
           $info = mysqli_fetch_all($info);
           //var_dump($appointments);
           foreach($info as $info){
        echo '
        <tr>
               <td>' .$info[1]. '</td>
               <td>' .$info[2]. '</td>
                <td>' .$info[3].'</td>
                <td>' .$info[4].'</td>
            </tr>
            ';
           }
        }
            ?>

        </table>
            <h1>Medical history</h1>

            <table>
            <tr class="head">
               <th>Diagnoses</th>
               
            
            </tr>
            
            
            <?php
            $user_id= $_COOKIE['user_id'];
            $diagnoses = mysqli_query($connect, query:"SELECT Diagnosis FROM medical_cards WHERE Patient_id='".$user_id."'");
         // $appointments = mysqli_query($connect, query:"SELECT * FROM `appointments`");
           // var_dump($appointments);

           if(mysqli_num_rows($diagnoses)==0){
            echo'
            <tr>
            <td colspan="3" align="center">Your medical history is empty</td>
            </tr>
            ';
           }
           else{
           $diagnoses = mysqli_fetch_all($diagnoses);
           //var_dump($appointments);
           foreach($diagnoses as $diagnoses){
        echo '
        <tr>
               <td>' .$diagnoses[0]. '</td>
            </tr>
            ';
           }
        }
            ?>

        </table>

    </body>
</html>
