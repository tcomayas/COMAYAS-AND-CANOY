<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</head>
<body>
<br><br>
<div class="container">
<div class="row">
<div class="col text-end p-5">
    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
<i class="bi bi-plus-circle"> Create</i>
</button>
</div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Create</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
            <?php if(isset($_GET['error'])){?>
                <div class="alert alert-danger text-start">
                    <?php echo $_GET['error'];?>
                </div>
            <?php } ?>
        <div class="modal-body">
        <form action="code.php" method="post">
        <label for="name" class="form-label">Name:</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="firstname, lastname" required><br>
        <label for="email" class="form-label">Email address:</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="email@example.com" required><br>
        Date of Birth: <input type="date" name="bdate" id="bdate" required>><br><br>
        Gender:    
        Male  <input type="radio" name="gender" id="male" value="Male" required>>
        Female  <input type="radio" name="gender" id="female" value="Female" required>><br><br>
        
        
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-success" name="create">Create</button>
        </div>
    </div>
  </div>
</div>
</div>
    
    <div class="container">
        <div class="row">
            <div class="col m-5">
                <?php if(isset($_GET['error'])){?>
                    <div class="alert alert-danger text-start">
                        <?php echo $_GET['error'];?>
                    </div>
                <?php } ?>
                <?php if(isset($_GET['success'])){?>
                    <div class="alert alert-success text-start">
                        <?php echo $_GET['success'];?>
                    </div>
                <?php } ?>
                <table class="table table-bordered table-secondary table-striped text-center">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Date of Birth</th>
                    <th>Age</th>
                    <th>Gender</th>
                    <th>Action</th>
                </tr>
                <?php
                    require "dbcon.php";
                    $query = "SELECT * From users";
                    $query_run = mysqli_query($con, $query);

                    if(mysqli_num_rows($query_run) > 0)
                    {
                        foreach($query_run as $student)
                        {
                ?>
                <?php 
                $bdate = $student['bdate'];
                $age = date_diff(date_create($bdate), date_create('today'))->y;
                ?>
                <?php 
                $i = 0; 
                for($i = 0; $i < $student['id']; $i++){
                    $i;
                }
                ?>
                        <tr>
                            <td><?php echo $i ?></td>
                            <td><?php echo $student['name']; ?></td>
                            <td><?php echo $student['email']; ?></td>
                            <td><?php echo $student['bdate']; ?></td>
                            <td><?php echo $age; ?></td>
                            <td><?php echo $student['gender']; ?></td>
                            <td>
                                <form action="code.php" method="post">
                                    <button type="submit" class="btn btn-dark" name="view" value="<?php echo $student['id']; ?>"><i class="bi bi-eye"></i></button>
                                    <button type="submit" class="btn btn-primary" name="edit" value="<?php echo $student['id']; ?>"><i class="bi bi-pencil-square"></i></button>
                                    <button type="submit" class="delete btn btn-danger" name="delete" value="<?php echo $student['id']; ?>" onclick="return confirm('Are you sure you want to delete the Student on the list?');"><i class="bi bi-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                            <?php
                        }
                    }
                    else
                    {
                        echo "<tr><td colspan='6'>No data found.</td></tr>";
                    }
                ?>
                        </tr>
                    </table>
            </div>
        </div>
</body>
</html>