

<!DOCTYPE  html>
<html lang="en">
    <head>
        <title>Login</title>
        <link rel="stylesheet" a href="Poliklinika\css3\login\style.css"/>
        <link ref="stylesheet" a href="Poliklinika\css3\login\fontawesome.min.css"/>
    </head>
    <body>
<div class="container">
    <img src="Poliklinika\css3\image\login.png">
    <form method="POST" action="#">
        <div class="form_input">
            <input type="text" name="username" placeholder="Enter your Username"/>
        </div>
        <div class="form_input">
            <input type="password" name="password" placeholder="Enter your Password"/>
        </div>
        <input type="submit" name="submit" value="LOGIN" class="btn-login"/>
    </form>
    </body>
</html>

<?php
$connect = mysqli_connect('localhost', 'root', 'root', 'hospital');
/*
$patients = mysqli_query($connect, "SELECT * FROM `Patients`");
$patients=mysqli_fetch_all($patients);

echo'<pre>';
print_r($patients);
echo '</pre>';

*/

if(!$connect){
die('Connection error!!!');
exit;
}


////////херня из ютуба https://www.youtube.com/watch?v=aIsu9SPcGbU

if(isset($_POST['submit'])){
    
   $uname=$_POST['username'];
   $password=$_POST['password'];
    
    $sql="select role from users where Login='".$uname."'AND Password='".$password."' limit 1";
    
   // $sql="select * from users where Login='test'AND Password='test' limit 1";
   
    $result=mysqli_query($connect, $sql);
    
    


    if(mysqli_num_rows($result)==1){
        echo "You Have Successfully Logged in";
        $role = mysqli_fetch_array($result);
        setcookie("role_cookie", $role['role']);

        $sql="select user_id from users where Login='".$uname."'AND Password='".$password."' limit 1";
        $result=mysqli_query($connect, $sql);
        $user_id = mysqli_fetch_array($result);
        setcookie("user_id", $user_id['user_id']);
      // header('Location:/Site1/error.php');
       header('Location:/Site1/main.php');
        
        exit();
    }
    else{
        header('Location:/error.php');
        echo " You Have Entered Incorrect Password";
        
    }
        
}


?>
