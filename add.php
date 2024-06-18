
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipe ADD</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php include 'part/header.php'; 
 

?>
    <div class="container mt-5">
        <h2>Add/Edit Recipe</h2>
        <form action="php_work/insert.php" method="POST"  enctype="multipart/form-data"">
            <div class="form-group">
                <label for="recipeName">Recipe Name</label>
                <input type="text" class="form-control" name="recipeName" placeholder="Enter recipe name"  required>
            </div>
             <div class="form-group">
                <label for="recipeName">Company Name</label>
                <input type="text" class="form-control" name="company" placeholder="Enter company name"  required>
            </div>
            <div class="form-group">
                <label for="recipeImage">Recipe Image</label>
                <input type="file" class="form-control-file" name="recipeImage"  required>
            </div>
            <div class="form-group">
                <label for="ingredients">Ingredients</label>
                <textarea class="form-control" name="ingredients" rows="3" placeholder="List ingredients"  required></textarea>
            </div>
            <div class="form-group">
                <label for="instructions">Instructions</label>
                <textarea class="form-control" name="instructions" rows="5" placeholder="Write step-by-step instructions"  required></textarea>
            </div>
            <div class="form-group">
                <input class="btn btn-primary" type="submit" name="submit" value="Upload">
                <input class="btn btn-dark" type="submit" name="back" value="Back">

            </div>
        </form>
    </div>
</body>
</html>