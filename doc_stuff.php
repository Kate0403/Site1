<?php 
$connect = mysqli_connect('localhost', 'root', 'root', 'hospital');
?>

<!DOCTYPE  html>
<html lang="en">
    <head>
        <title>Hospital stuff</title>
        <link rel="stylesheet" a href="Poliklinika\css3\main\user_style.css">
        <link rel="stylesheet" a href="Poliklinika\css3\user_pages\my_appointments.css">
   
</head>

    <body>
    <h1>Our hospital stuff</h1>
        <table>
            <tr class="head">
               <th>Name</th>
               <th>Job title</th>
                <th>Work experience</th>
                <th>Education</th>
            </tr>
            
            
            <?php
  
            $stuff = mysqli_query($connect, query:"SELECT * FROM doctors");
         // $appointments = mysqli_query($connect, query:"SELECT * FROM `appointments`");
           // var_dump($appointments);

           if(mysqli_num_rows($stuff)==0){
            echo'
            <tr>
            <td colspan="4" align="center">We retired all stuff</td>
            </tr>
            ';
           }
           else{
           $stuff = mysqli_fetch_all($stuff);
           //var_dump($appointments);
           foreach($stuff as $stuff){
        echo '
        <tr>
               <td>' .$stuff[1]. '</td>
               <td>' .$stuff[2]. '</td>
                <td>' .$stuff[4].'</td>
                <td>' .$stuff[3].'</td>
            </tr>
            ';
           }
        }
            ?>

        </table>
            

    </body>
</html>
