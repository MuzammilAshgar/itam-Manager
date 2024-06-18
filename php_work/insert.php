<?php
include '../part/conntion.php';
if (isset($_POST['submit'])) {
    $rname = $_POST['recipeName'];
    $rdata = $_POST['ingredients'];
    $take_info = $_POST['instructions'];
    $company = $_POST['company'];
    $img = $_FILES['recipeImage']['name'];
    $tmp_name = $_FILES['recipeImage']['tmp_name'];
    
    move_uploaded_file($tmp_name,"../img/$img");
    $chars = array_merge(range(4, 10));
    shuffle($chars);
    $id = (int) implode($chars);
   
    $sql = "INSERT INTO $table SET
    rid = '$id',
    rname = '$rname',
    rdata = '$rdata',
    take_info = '$take_info',
    company_name = '$company',
    img = '$img';
    ";
    $run = mysqli_query($conn,$sql);
    if ($run == true) {
        unset($sql,$run);

        echo"<script>alert('Conratulations Your data has been created Successfully ')</script>";
        header('refresh: 0; url=../list.php');
    }
    else{
        echo"<script>alert('SORRY data unSuccessfully ')</script>";
        header('refresh: 0; url=../index.php');
    }

    
}
if (isset($_POST['back'])) {
    header("refresh: 0; url=../index.php");
}
?>