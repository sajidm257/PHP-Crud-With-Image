<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete</title>
</head>
<body>
    <?php
    include('dbConnection.php');

    $id = $_GET['id']??'';

    $query2 = "select * from student where id='$id'";
    $run2 = mysqli_query($con, $query2);

    while($row = mysqli_fetch_array($run2)){
        $img = $row[5];
        unlink($img);
    }

    $query = "delete from student where id='$id'";
    $run = mysqli_query($con,$query);
    if($run){
        echo "<script>alert('Data Deleted Successfully !!');
        window.location.href='View.php';
        </script>";
    }else{
        echo "<script>alert('Data Deleted Failed !!');
        window.location.href='View.php';
        </script>";
    }

    ?>
</body>
</html>