<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <?php
    include('dbConnection.php');

    $id = $_GET['id']??'';

    $query = "SELECT * FROM student where id='$id'";
    $run = mysqli_query($con,$query);
    $data = mysqli_fetch_array($run);
    


    ?>
    <div class="container">
        <div class="col-md-6 offset-md-3">
            <form action="" method="post" enctype="multipart/form-data">
                <h2 class="text-center">Update Form</h2>
                <input type="hidden" name="id" value="<?php echo $data[0]; ?>">
                <input type="text" class="form-control" name="name" placeholder="Enter Your Name" value="<?php echo $data[1]; ?>" required />
                <br>
                <select name="gender" class="form-control" required>
                
                <?php
                if($data[2]=="Male"){
                    echo "
                    <option value='' >Select Gender</option>
                    <option value='Male' selected>Male</option>
                    <option value='Female'>Female</option>
                    ";
                }else{
                    echo "
                    <option value='' >Select Gender</option>
                    <option value='Male'>Male</option>
                    <option value='Female' selected>Female</option>
                    ";
                }
                ?>
                
                </select>
                <br>
                <input type="number" value="<?php echo $data[3]; ?>" class="form-control" placeholder="Enter Your Age" name="age" required />
                <br>
                <input type="number" value="<?php echo $data[4]; ?>" class="form-control" placeholder="Enter Your Class" name="class" required />
                <br>
                <?php
                if($data[5] != "" && $data[5] != null){
                    echo "<img src = '$data[5]' height='70' width='70'/>";
                }
                ?>
                <input type="hidden" name="OldImage" value="<?php echo $data[5]; ?>">
                <br>
                <input type="file" name="image" class="form-control" />
                <br><br>
                <input type="submit" class="btn btn-info btn-block" value="Update" name="UpdateBtn">

            </form>
        </div>
    </div>

    <?php
    if(isset($_POST['UpdateBtn'])){
        $id = $_POST['id'];
        $name = $_POST['name'];
        $gender = $_POST['gender'];
        $age = $_POST['age'];
        $class = $_POST['class'];
        $OldImage = $_POST['OldImage'];
        $image_name = $_FILES['image']['name'];
        $image_temp_name = $_FILES['image']['tmp_name'];
        $image_type = $_FILES['image']['type'];
        $image_size = $_FILES['image']['size'];
        $folder = 'images/';
        if(is_uploaded_file($_FILES['image']['tmp_name'])){
            

        if(strtolower($image_type)=="image/jpg"||strtolower($image_type)=="image/jpeg"||strtolower($image_type)=="image/png"){
            if($image_size<=1000000){
                $folder = $folder.$image_name;
                $query = "update student set name = '$name',gender = '$gender',age = '$age',class = '$class',image_path = '$folder' where id = '$id'";
                $run = mysqli_query($con, $query);
                if($run){
                    move_uploaded_file($image_temp_name, $folder);
                    echo "<script>alert('Data Updated Successfully !!');
                    window.location.href='View.php'</script>";
                    
                }else{
                    echo "<script>alert('Data Updation Failed !!')</script>";
                }
            }else{
                echo "<script>alert('Image size shold Be Less Than 1 MB ')</script>";
            }
        }else{
            echo "<script>alert('Image Format Not Supported !!')</script>";
        }
        }else{
            $query = "update student set name = '$name',gender = '$gender',age = '$age',class = '$class', where id = '$id'";
                $run = mysqli_query($con, $query);
                if($run){
                    unlink(realpath($OldImage));
                    move_uploaded_file($image_temp_name, $folder);
                    echo "<script>alert('Data Updated Successfully !!');
                    window.location.href='View.php'</script>";
                    
                }else{
                    echo "<script>alert('Data Updation Failed !!')</script>";
                }
        }
    }
    ?>
</body>
</html>