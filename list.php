<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipe Manager - Recipes</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .card-img-top {
            height: 200px;
            object-fit: cover;
        }
        .card-title {
            font-size: 1.25rem;
            margin-bottom: 0.75rem;
        }
        .card-text {
            font-size: 0.9rem;
        }
        .container h2 {
            text-align: center;
            margin-bottom: 2rem;
        }
    </style>
</head>
<body>
    <?php include 'part/header.php'; ?>

    <div class="container mt-5">
        <h2>Recipe List</h2>
        <div class="row">
        <?php 
        $sql = "SELECT * FROM $table";
        $run = mysqli_query($conn,$sql);
        if ($run == true) {
            $count = mysqli_num_rows($run);
            if ($count > 1){
                while($row=$run->fetch_assoc()){
                    $rid = $row['rid'];
                    $name = $row['rname'];
                    $rdata = $row['rdata'];
                    $take_info = $row['take_info'];
                    $company_name = $row['company_name'];
                    $img = $row['img'];
                ?>
        
            <!-- Repeat this block for each recipe -->
            <div class="col-md-4">
                <div class="card mb-4 shadow-sm">
                    <img src="img/<?php echo $img; ?>" class="card-img-top" alt="Recipe Image">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $name; ?></h5>
                        <h6 class="card-subtitle mb-2 text-muted"><?php echo $company_name; ?></h6>
                        <p class="card-text"><?php echo $rdata; ?></p>
                        <div class="d-flex justify-content-between align-items-center">
                            <small class="text-dark">ID: <?php echo $rid; ?></small>
                            <a href="veiw.php?id=<?php echo $rid; ?>" class="btn btn-primary btn-sm">View itam</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of recipe block -->
        
        <?php
                }
            } else {
                echo "<div class='col-12'><h1 class='text-center'>No data found</h1></div>";
            }
        }
        ?> 
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
