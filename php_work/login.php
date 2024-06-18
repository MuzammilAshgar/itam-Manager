<?php
include '../part/conntion.php';

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $pwd = $_POST['password'];
    $encode = md5($pwd);

   $sql = "SELECT * from $user_table where
    user_email='$email'
   
    ";

    $run = mysqli_query($conn,$sql);
    if($run == true){
        if($row =$run->fetch_assoc()){
        $check_data = mysqli_num_rows($run);
        if ($check_data > 0) {
            $name = $row['user_name'];
            echo "<script>alert('Welcome to My Website')</script>";
            setcookie("login",true,84600,"/");
            header('location:../index.php');
           
        }
        else{
            echo "<script>alert('ERROR 405 NO DATA FIND')</script>";
        }
    }else{
        echo "<script>alert('ERROR 404')</script>";
    }
    
}
}

?>