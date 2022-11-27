<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <title>View</title>
</head>
<body>
    
    <?php    
    require "dbcon.php";

    $student_id = $_GET['id'];
    $query = "SELECT * From users WHERE id='$student_id'";
    $query_run = mysqli_query($con, $query);

    if(mysqli_num_rows($query_run) > 0)
    {
        $student = mysqli_fetch_array($query_run);
    ?>
<?php 
    $bdate = $student['bdate'];
    $age = date_diff(date_create($bdate), date_create('today'))->y;
?>
<div class="container p-5">
        <div class="justify-content-center row">
            <div class="col-10"><br><br><br><br><br><br><br>
                <div class="card">
                    <h5 class="card-header">Student Details</h5>
                    <div class="card-body">
                      <div class="row">
                        <div class="col-6">
                            <p class="card-text col-6"> <b>Name:</b> <br>    <?= $student['name']; ?></p>
                            <p class="card-text col-6"><b>Birthdate:</b> <br> <?= $student['bdate']; ?></p>
                            <p class="card-text col-6"><b>Age:</b> <br> <?php echo $age ?></p><br>
                        </div>
                        <div class="col-6 pb-5">
                            <p class="card-text col-6"><b>Email:</b> <br> <?= $student['email']; ?></p>
                            <p class="card-text col-6"><b>Gender:</b> <br>  <?= $student['gender']; ?></p>
                        </div>
                      </div>
                      <form action="code.php" method="post">
                        <div class="card-footer text-end"><br>
                            <button type="submit" class="btn btn-primary" name="edit" value="<?php echo $student['id']; ?>"><i class="bi bi-pencil-square"></i></button>
                            <a href="index.php" class="btn btn-dark"><i class="bi bi-arrow-90deg-left"></i></a>
                        </div>
                      </form>
                    </div>
                  </div>
            </div>
        </div>
    </div>
        <?php

    }
    else
    {
        echo "No data found.";
    }
    
    ?>

</body>
</html>
