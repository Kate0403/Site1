<?php 
$connect = mysqli_connect('localhost', 'root', 'root', 'hospital');
?>

<!DOCTYPE  html>
<html lang="en">
    <head>
        <title>Doctor's schedule</title>
        <link rel="stylesheet" a href="Poliklinika\css3\main\user_style.css">
        <link rel="stylesheet" a href="Poliklinika\css3\user_pages\my_appointments.css">
   
</head>

    <body>
    <h1>Patient's scedual</h1>
            
   <FORM action="" method="POST">
    <label for="path_name">Enter patient Name or Surname</label>
    <input name="path_name" type="search">
    
    <br>
    <button type="submit" name="search">Search</button>
</FORM>
   
            <?php
          // $patients=mysqli_query($connect, "SELECT Name, Surname FROM patients");
       //  $patients = mysqli_fetch_all($patients);
          
       if(isset($_POST['search'])){

        $n_s=$_POST['path_name'];
   // echo $n_s;
        $patient=mysqli_query($connect, "SELECT Patient_id, Name, Surname FROM patients WHERE Name LIKE '%$n_s%' OR Surname LIKE '%$n_s%'");
        $patient = mysqli_fetch_all($patient);
       //echo $patient[0][0];
       // $appo=mysqli_query($connect, "SELECT Date, doctors.Name, doctors.Job_title FROM appointments LEFT JOIN doctors ON appointments.Doctor_id=doctors.Doctor_id WHERE Date >UTC_TIMESTAMP()");
       if(count($patient)==0){
         echo'
         <table>
         <tr>
         <td colspan="4" align="center">There is NO appointments for this patient</td>
         </tr>
         </table>
         ';
        }
        else{
          for($i=0;$i<count($patient);$i++){

                 //echo $patient[$i];
                 $p=$patient[$i][0];
            $appo=mysqli_query($connect, "SELECT Date, doctors.Name, doctors.Job_title FROM appointments 
            LEFT JOIN doctors ON appointments.Doctor_id=doctors.Doctor_id 
            WHERE appointments.Patient_id=$p AND Date > UTC_TIMESTAMP()");
         
          //  $appo=mysqli_query($connect, "SELECT Date, doctors.Name, doctors.Job_title FROM appointments LEFT JOIN doctors ON appointments.Doctor_id=doctors.Doctor_id WHERE ='".$patients[$i][2]."' AND Date >UTC_TIMESTAMP()");
            //print_r ($docs[$i][2]);
            $appo = mysqli_fetch_all($appo);
       

            echo'
            <table>
        <tr class="head">
           <th colspan="4">' .$patient[$i][1]. ' '.$patient[$i][1].' appointments</th>
        </tr>
        ';
        if(count($appo)==0){
         echo'
         <tr>
         <td colspan="4" align="center">There is NO appointments for this patient</td>
         </tr>
         ';
        }
        else{
        for($j=0;$j<count($appo);$j++){

         

     
        echo'
        <tr>
        <td>'.$appo[$j][0].'</td>
        <td>'.$appo[$j][1].'</td>
        <td>'.$appo[$j][2].'</td>
     </tr>
         ';
      }
        }
        echo'<table><br>';
        
           }
        }
      }
           ?>
          
         <!--  <p style="text-align: center"><button><a href="add_app.php">Add appointment time</button> -->

    </body>
</html>
