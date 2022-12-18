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
            $appo=mysqli_query($connect, "SELECT Date, patients.Name FROM appointments LEFT JOIN patients ON appointments.Patient_id=patients.Patient_id WHERE Doctor_id='".$docs[$i][2]."' AND Date >UTC_TIMESTAMP()");
            //print_r ($docs[$i][2]);
            $appo = mysqli_fetch_all($appo);
            
            echo'
            <table>
        <tr class="head">
           <th colspan="4">' .$docs[$i][0]. ' appointments ('.$docs[$i][1].')</th>
        </tr>
        ';
        if(count($appo)==0){
         echo'
         <tr>
         <td colspan="4" align="center">There is NO appointments for this doctor</td>
         </tr>
         ';
        }
        else{
        for($j=0;$j<count($appo);$j++){

         

     
        echo'
        <tr>
        <td>'.$docs[$i][0].'</td>
        <td>'.$docs[$i][1].'</td>
        <td>'.$appo[$j][0].'</td>
        <td>'.$appo[$j][1].'</td>
     </tr>
         ';
      }
        }
        echo' <table><br>';
        
           }
           ?>
           </table> 
           <p style="text-align: center"><button><a href="add_app.php">Add appointment time</button>

    </body>
</html>
