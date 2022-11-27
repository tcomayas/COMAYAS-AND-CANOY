<?php

$con = mysqli_connect("localhost", "root", "", "db_comayas");

if(!$con)
{
    echo mysqli_connect_error();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <title>Update</title>
</head>
<body style="background: url('./image/mae.jpg'); background-repeat: no-repeat; background-size: cover;">
    
    <?php 

    require "dbcon.php";

    $student_id = $_GET['id'];
    $query = "SELECT * From users WHERE id='$student_id'";
    $query_run = mysqli_query($con, $query);

    if(mysqli_num_rows($query_run) > 0)
    {
        $student = mysqli_fetch_array($query_run);

        ?>

        <form action="code.php" method="post">
        <input type="hidden" name="student_id" value="<?php echo $student['id']; ?>">
            <input type="hidden" name="student_id" value="<?php echo $student['id']; ?>">
            <div class="container p-5">
        <div class="justify-content-center row">
            <div class="col-10"><br><br><br><br><br>
                <div class="card">
                    <h5 class="card-header">Student Details</h5>
                    <div class="card-body"> 
                      <div class="row">
                        <label for="exampleFormControlInput1" class="form-label">Name:</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="enter fullname" value="<?= $student['name']; ?>" required>
            <br>
            <label for="exampleFormControlInput1" class="form-label">Email address:</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="email@example.com" value="<?=$student['email']; ?>" required>
            <br>
            <div class="col-6">
                <label for="exampleFormControlInput1" class="form-label">Birthday:</label>
                <input type="date" class="form-control " id="bdate" name="bdate" value="<?= $student['bdate']; ?>" required>
            </div>
            <br>
            <br>
            <div class="col-6 pt-5">
                Gender:
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="male" value="Male" <?php echo $student['gender'] == "Male" ? "checked" : ""; ?>>
                    <label class="form-check-label" for="inlineRadio1">Male</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="female" value="Female" <?php echo $student['gender'] == "Female" ? "checked" : ""; ?>>
                    <label class="form-check-label" for="inlineRadio2">Female</label>
                  </div>
                      </div>
                     <div class="card-footer text-end">
                        <a href="index.php"><input type="submit" value="Cancel" name="cancel" class="btn btn-dark text-light"></a>
                        <input type="submit" value="Update" name="update" class="btn btn-success text-light">
                       
                     </div>
                    </div>
                  </div>
            </div>
        </div>
    </div>
           
        </form><br><br>

        <?php

    }
    else
    {
        echo "No data found.";
    }
    
    ?>

</body>
</html>