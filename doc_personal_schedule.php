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
    <h1>Doctor's schedule</h1>
            
   
   
            <?php
           $docs=mysqli_query($connect, "SELECT Name, Job_title, Doctor_id FROM doctors");
          $docs = mysqli_fetch_all($docs);
          
          

          for($i=0;$i<count($docs);$i++){  
                $doc_id=$docs[$i][2];
            $appo=mysqli_query($connect, "SELECT Date, patients.Name, patients.Surname, Appointment_id FROM appointments LEFT JOIN patients ON appointments.Patient_id=patients.Patient_id WHERE Doctor_id=$doc_id AND Date >UTC_TIMESTAMP()");
            //print_r ($docs[$i][2]);
            $appo = mysqli_fetch_all($appo);
            
            echo'
            <table>
        <tr class="head">
           <th colspan="4">' .$docs[$i][0]. ' appointments ('.$docs[$i][1].')</th>
        </tr>
        <tr class="head">
            <th>Date</th>
            <th>Name</th>
            <th>Surname</th>
            <th>History</th>
        </tr>
        ';
        if(count($appo)==0){
         echo'
         <tr>
         <td colspan="5" align="center">There is NO appointments for this doctor</td>
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
        <td><a href="update_time.php?id='.$appo[$j][3].'">View patient History</a></td>
     </tr>
         ';
      }
        }
        echo' <table><br>';
        
           }
           ?>
           </table> 
           

    </body>
</html>
