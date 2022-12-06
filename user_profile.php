?php 
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
            $appointments = mysqli_query($connect, query:"SELECT * FROM appointments LEFT JOIN doctors ON appointments.Doctor_id=doctors.Doctor_id WHERE Patient_id='".$user_id."' AND Date > UTC_TIMESTAMP()");
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
               <td>' .$appointments[2]. '</td>
               <td>' .$appointments[5]. '</td>
                <td>' .$appointments[6].'</td>
                <td><a href="update_app.php?id='.$appointments[0].'&doc_id= '.$appointments[4].'">Update</a></td>
                <td><a href="delete_app.php?id='.$appointments[0].'">Delete</a></td>
            </tr>
            ';
           }
        }
            ?>

        </table>
            <h1>My past appointments</h1>

            <table>
            <tr class="head">
               <th>Date</th>
               <th>Doctor's name</th>
                <th>Doctor's job title</th>
            
            </tr>
            
            
            <?php
            $user_id= $_COOKIE['user_id'];
            $appointments = mysqli_query($connect, query:"SELECT * FROM appointments LEFT JOIN doctors ON appointments.Doctor_id=doctors.Doctor_id WHERE Patient_id='".$user_id."' AND Date < UTC_TIMESTAMP()");
         // $appointments = mysqli_query($connect, query:"SELECT * FROM `appointments`");
           // var_dump($appointments);

           if(mysqli_num_rows($appointments)==0){
            echo'
            <tr>
            <td colspan="3" align="center">Your appointments history is empty</td>
            </tr>
            ';
           }
           else{
           $appointments = mysqli_fetch_all($appointments);
           //var_dump($appointments);
           foreach($appointments as $appointments){
        echo '
        <tr>
               <td>' .$appointments[2]. '</td>
               <td>' .$appointments[5]. '</td>
                <td>' .$appointments[6].'</td>
            </tr>
            ';
           }
        }
            ?>

        </table>

    </body>
</html>
