<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<?php include 'part/header.php';

if(isset($_POST['submit'])){
    $data_form = $_POST['name'];
  

    function check($vales){
        global $table,$conn;
        if (ctype_alpha($vales)) {
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

                // this prat 2
                elseif(ctype_digit($vales)){
                    $sql = "SELECT rid FROM $table WHERE rid='$vales'";
                    $run = mysqli_query($conn,$sql);

                    if($run){
                        if(mysqli_num_rows($run)){
                    if ($row=$run->fetch_assoc()) {
                        $id = $row['rid'];
                        header("location:veiw.php?id=$id");
            
                    }
                } else{
                    echo"<script>alert('NO data find ')</script>";
                    header('refresh: 0; url=index.php');
                }
                
                  
                }
                else{
                        echo"<script>alert('ERROR 404')</script>";
                        header('refresh: 0; url=index.php');
                    }
        }
    }

    if(!empty($data_form)){
        check($data_form);
    }  

}


?>

    <div class="container mt-5">
        <div class="jumbotron">
            <h1 class="display-4">Welcome to Data Manager!</h1>
            <p class="lead">A place to manage to item data.</p>
            <div class="input-group mb-3">
                <div class="col-5">
                <form method="post">
                <input type="text" name="name" class="form-control" placeholder="Name / Id">
                <button class="btn btn-outline-secondary mt-2" type="submit" name="submit">search</button>
                
                </form>
                </div>
            </div>
            <hr class="my-4">
            <p>chack owe mart data.</p>
            <a class="btn btn-primary btn-lg" href="list.php" role="button">View item</a>
        </div>

        
        
     
            
               
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
