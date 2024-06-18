<?php
   include 'part/header.php'; 
   if (isset($_POST['go'])) {
    $vales = $_POST['textbox'];
    if(!empty($vales)){

    if (ctype_alpha($vales) == true) {
      $sql = "SELECT rid FROM $table WHERE rname='$vales'";
          $run = mysqli_query($conn,$sql);
          if($run){
              if(mysqli_num_rows($run)){
          if ($row=$run->fetch_assoc()) {
              $id = $row['rid'];
              header("location:veiw.php?id=$id");
  
          }
      }
              else{
                  echo"<script>alert('NO data find ')</script>";
                  header('refresh: 0; url=index.php');
              }
              
          }
          else{
              echo"<script>alert('ERROR 404 :( ')</script>";
              header('refresh: 0; url=index.php');
          }
          }
          if(ctype_digit($vales)){
            header("location:php_work/update_data.php?id=$vales");
          }
          else{
            echo"<script>alert('NO data find ')</script>";
            header('refresh: 0; url=index.php');
         
        }
          
        }  
 }
   ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UpdataRecipe</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    </head>

<body>
  <Br>
  <Br>
  <div class="container md">

  <form method="post">
  <div class="input-group ">
  <input name="textbox" type="text" class="form-control" placeholder="Id / Name" aria-label="Recipient's Id">
  <button name="go" class="btn btn-outline-primary" type="submit" >Search</button>
  </form>
  </div>
</div>
</body>
    </html>


 