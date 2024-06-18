<?php
include 'part/header.php';
$getid = $_GET['id'];
$sql = "SELECT * FROM $table WHERE rid='$getid'";
$sql2 = "SELECT * FROM $table3 WHERE id='$getid'";
$run = mysqli_query($conn, $sql);
$run2 = mysqli_query($conn, $sql2);

if ($row = $run->fetch_assoc()) {
    $info = $row['rdata'];
    $inst = $row['take_info'];
    $name = $row['company_name'];
    $product_name = $row['rname'];
    $img = $row['img'];
}

if (isset($_POST['enter'])) {
    $comment = $_POST['comment'];
    $id = $getid;
    $sql3 = "INSERT INTO $table3 SET comment='$comment', id='$id'";
    $run3 = mysqli_query($conn, $sql3);
    header("Refresh:0");
}

if (isset($_POST['delete'])) {
    $sql4 = "DELETE FROM $table WHERE rid='$getid'";
    $sql5 = "DELETE FROM $table2 WHERE id='$getid'";
    $sql6 = "DELETE FROM $table3 WHERE id='$getid'";

    $run4 = mysqli_query($conn, $sql4);
    $run5 = mysqli_query($conn, $sql5);
    $run6 = mysqli_query($conn, $sql6);

    if ($run4 == true && $run5 == true && $run6 == true) {
        header("Location: list.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipe Manager - Recipe Details</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .recipe-image {
            height: 300px;
            object-fit: cover;
        }
        .recipe-title {
            margin-bottom: 1rem;
        }
        .comment-block {
            margin-top: 1rem;
            padding: 1rem;
            background-color: #f1f1f1;
            border-radius: 0.5rem;
        }
        .comment-block p {
            margin-bottom: 0;
        }

    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            
            <div class="col-md-8">
                <h2 class="recipe-title"><?php echo $product_name; ?></h2>
                <h5>Company Name: <?php echo $name; ?></h5>
                <hr>
                <img src="img/<?php echo $img; ?>" class="img-fluid mb-4 recipe-image" alt="Recipe Image">
                <h4>Info:</h4>
                <p><?php echo $info; ?></p>
                <h4>Instructions:</h4>
                <p><?php echo $inst; ?></p>
                <br>
                <p><strong>ID: </strong><?php echo $getid; ?></p>
                <form method="post">
                    <button type="submit" name="delete" class="btn btn-danger">Delete</button>
                    <a href="php_work/update_data.php?id=<?php echo $getid; ?>" class="btn btn-primary">Update</a>

                </form>
            </div>
            <div class="col-md-4">
                <h4>Comments</h4>
                <form method="post">
                    <div class="form-group">
                        <label for="comment">Leave a comment:</label>
                        <textarea class="form-control" id="comment" rows="3" name="comment" required></textarea>
                    </div>
                    <button type="submit" name="enter" class="btn btn-primary">Submit</button>
                </form>
                <hr>
                <?php while ($row3 = $run2->fetch_assoc()): ?>
                    <div class="comment-block">
                        <p><strong>User:</strong> <?php echo $row3['comment']; ?></p>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
