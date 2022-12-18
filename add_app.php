<?php 
$connect = mysqli_connect('localhost', 'root', 'root', 'hospital');


?>

<!DOCTYPE  html>
<html lang="en">
    <head>
        <title>New appoinment</title>
        <link rel="stylesheet" a href="Poliklinika\css3\main\user_style.css">
        <link rel="stylesheet" a href="Poliklinika\css3\user_pages\my_appointments.css">
   
</head>

    <body>
    <h1>New appointment time</h1>
    <form action="" method="POST">
<label for="docs">Doctors</label>
       
       <select name="docs"> 
    <?php 
    
    $docs = mysqli_query($connect, query:"SELECT Doctor_id, Name, Job_title FROM `doctors`");
    $docs = mysqli_fetch_all($docs); 
    
    
    echo '
    ';
    for($i=0;$i<count($docs);$i++)
    {
    echo'
     <option value='.$docs[$i][0].'>'.$docs[$i][1].' - '.$docs[$i][2].'</option> 
    ';
    
    
    } 
    ?>
    </select>
    <br>
    <label for="date">Enter appointment time in yyyy-mm-dd hh-mm-ss format</label>
        
       <input type="datetime" id="date" name="date">

<br>
    <button type="submit" name="submit">Add an appointment time</button>
        </form>

    </body>
</html>

<?php

if(isset($_POST['submit'])){
    
    $doc_id=$_POST['docs'];
    $new_date=$_POST['date'];

    if(mysqli_query($connect, query:"INSERT INTO appointments (Appointment_id, Patient_id, Date, Doctor_id) VALUES (NULL, NULL, '$new_date', '$doc_id')")){
        echo "New record created";
    }
    else{
echo "Error ".mysqli_error($connect);
    }
   

   



}
?>