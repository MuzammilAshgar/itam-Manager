<?php include '../part/conntion.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipe Add</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php
$id = $_GET['id'];
$sql = "SELECT * FROM $table WHERE rid = '$id'";
$run = mysqli_query($conn, $sql); 
if ($run == true) {
   
    if($row=$run->fetch_assoc()) {
    $name = $row['rname'];
    $company_name = $row['company_name'];
    $ingredients = $row['rdata'];
    $instructions = $row['take_info'];
    $img = $row['img'];

   
    }
    ;
} 

if (isset($_POST['submit'])) {
    $pname = $_POST['recipeName'];
    $pcompany_name = $_POST['company'];
    $pingredients = $_POST['ingredients'];
    $pinstructions = $_POST['instructions'];
    $img = $_FILES['recipeImage']['name'];
    $tmp_name = $_FILES['recipeImage']['tmp_name'];

   

          
            $sql = "UPDATE $table SET
            rname='$pname',
            company_name='$pcompany_name',
            rdata='$pingredients',
            take_info='$pinstructions',
            img='$img'
            WHERE rid='$id'";
            $run = mysqli_query($conn, $sql); 
        
            if ($run) {
                move_uploaded_file($tmp_name,"../img/$img");
                echo"<script>alert('Conratulations Your data has been Update Successfully ')</script>";
                header("refresh: 0; url=../veiw.php?id=$id");
            }
            else{
                echo"<script>alert('ERROR 404 DATE NOT FIND ')</script>";
                header("refresh: 0; url=../updata.php");
            }
    }



        
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="index.php">Recipe Manager</a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="../index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../add.php">Add Recipe</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../list.php">View Recipe</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../updata.php">Updata Recipe</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container mt-5">
        <h2>Add/Edit Recipe</h2>
        <form action="" method="POST"  enctype="multipart/form-data"">
            <div class="form-group">
                <label for="recipeName">Recipe Name</label>
                <input type="text" class="form-control text-dark" name="recipeName" value="<?php print $name; ?>"  required>
            </div>
             <div class="form-group">
                <label for="recipeName">Company Name</label>
                <input type="text" class="form-control text-dark" name="company" value="<?php print $company_name ?>"  required>
            </div>
            <div class="form-group">
                <img src="../img/<?php echo$img;?>"width="400px" height="500px"><br>
                <label for="recipeImage">Recipe Image</label>
                <input type="file" class="form-control-file" name="recipeImage" required>
            </div>
            <div class="form-group">
                <label for="ingredients">Ingredients</label>
                <textarea class="form-control text-dark" name="ingredients" rows="3"  required><?php print $ingredients; ?> </textarea>
            </div>
            <div class="form-group">
                <label for="instructions">Instructions</label>
                <textarea class="form-control text-dark" name="instructions" rows="5"  required><?php print $instructions; ?></textarea>
            </div>
            <div class="form-group">
                <input class="btn btn-primary" type="submit" name="submit" value="Upload">
                <a class="btn btn-dark"  name="back" href="../list.php">Back</a>
            </div>
            
        </form>
    </div>
</body>
</html>