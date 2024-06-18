<?php
    include '../part/conntion.php';
    if (isset($_POST['submit'])) {
        $name = $_POST["name"];
        $email = $_POST["email"];
        $password  = $_POST["password"];
        $repassword = $_POST["repassword"];

        //check data here
        if(!empty($name.$email.$password.$repassword)){
            //check password and repassword are same
            if($password == $repassword){
                $enpwd = md5($password);
                
                $chars = array_merge(range(4, 10));
                shuffle($chars);
                $id = (int) implode($chars);
                
                $sql = "INSERT INTO $user_table set
                user_id='$id',
                user_name='$name',
                user_email='$email',
                user_pwd = '$enpwd'
                ";

                $run = mysqli_query($conn, $sql);
                if ($run == true) {
                    echo"<script>alert('Conratulations Your Account has been created Successfully ')</script>";
                    header('refresh: 0; url=../login.html');
                }    

            }else{
                echo"<script>alert('Chack Your password')</script>";
                header('refresh: 0; url=../signup.html');
            }

        }else{
            header('location:../signup.html');
        }
        
    }
?>