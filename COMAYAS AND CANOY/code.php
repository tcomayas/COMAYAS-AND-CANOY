<?php 
    require 'dbcon.php';

    if(isset($_POST['create'])){
        function validate ($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data; 
        }
    
        $name = validate($_POST['name']);
        $email = validate($_POST['email']);
        $gender = validate($_POST['gender']);
        $bdate = $_POST['bdate'];
        $age = date_diff(date_create($bdate), date_create('today'))->y;
    
        $query = "INSERT INTO users(name, email, gender, bdate) VALUES('$name', '$email', '$gender', '$bdate')";
        $query_run = mysqli_query($con, $query);
    
        if(!$query_run){
            echo "Create Failed";
        }
        else{
            header ("Location: index.php?Successfully Updated"); 
        }

    }

    if(isset($_POST['edit']))
    {
        $student_id = $_POST['edit'];
        header("Location: edit.php?id=$student_id");
    }

    if(isset($_POST["update"])){
        function validate ($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data; 
        }

        $student_id = $_POST['student_id'];

        $name = validate($_POST['name']);
        $email = validate($_POST['email']);
        $gender = validate($_POST['gender']);
        $bdate = $_POST['bdate'];
        
        $query = "UPDATE users 
                SET name='$name', email='$email', bdate='$bdate', gender='$gender'
                WHERE id='$student_id'";
        $query_run = mysqli_query($con, $query);

        if(!$query_run){
            echo "Update Failed";
        }
        else{
            header ("Location: index.php?Successfully Created"); 
        }
        
    }

    if(isset($_POST['delete']))
    {
        $student_id = $_POST['delete'];

        $query = "DELETE FROM users WHERE id='$student_id'";
        $query_run = mysqli_query($con, $query);

        if(!$query_run)
        {
            echo "Student not deleted!";
        }
        else
        {
            header("Location: index.php");
        }

    }

    if(isset($_POST['view']))
    {
        $student_id = $_POST['view'];
        header("Location: view.php?id=$student_id");
    }

    if(isset($_POST["update"]))
    {
        $student_id = $_POST['student_id'];

        $name = $_POST['name'];
        $email = $_POST['email'];
        $bdate = $_POST['bdate'];
        $gender = $_POST['gender'];
       
        $query = "UPDATE users 
                   SET name='$name', email='$email', bdate='$bdate', gender='$gender'
                  WHERE id='$student_id'";
        $query_run = mysqli_query($con, $query);

        if(!$query_run){
            echo "Update Failed";
        }
        else{
            header ("Location: index.php?Successfully Updated"); 
        }

    }

    if(isset($_POST['cancel'])){
        $student_id = $_POST['student_id'];

        $name = $_POST['name'];
        $email = $_POST['email'];
        $bdate = $_POST['bdate'];
        $gender = $_POST['gender'];

        $query = "SELECT id, name, email, bdate, gender FROM users
                    WHERE id='$student_id'";

        $query_run = mysqli_query($con, $query);
        if(!$query_run)
        {
            echo "Update failed!";
        }
        else
        {
            header("Location: index.php");
        }
    }

?>