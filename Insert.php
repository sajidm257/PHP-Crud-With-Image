<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert</title>
</head>
<body>
    <?php
    include('dbConnection.php');

    if(isset($_POST['InsertBtn'])){
        $name = $_POST['name'];
        $gender = $_POST['gender'];
        $age = $_POST['age'];
        $class = $_POST['class'];
        $image_name = $_FILES['image']['name'];
        $image_temp_name = $_FILES['image']['tmp_name'];
        $image_type = $_FILES['image']['type'];
        $image_size = $_FILES['image']['size'];
        $folder = 'images/';

        if(strtolower($image_type)=="image/jpg"||strtolower($image_type)=="image/jpeg"||strtolower($image_type)=="image/png"){
            if($image_size<=1000000){
                $folder = $folder.$image_name;
                $query = "insert into student(name,gender,age,class,image_path) values ('$name','$gender','$age','$class','$folder')";
                $run = mysqli_query($con, $query);
                if($run){
                    move_uploaded_file($image_temp_name, $folder);
                    echo "<script>alert('Data Inserted Successfully !!');
                    window.location.href='View.php'</script>";
                    
                }else{
                    echo "<script>alert('Data Insertion Failed !!')</script>";
                }
            }else{
                echo "<script>alert('Image size shold Be Less Than 1 MB ');
                window.location.href = 'Home.php'</script>";
            }
        }else{
            echo "<script>alert('Image Format Not Supported !!');
            window.location.href = 'Home.php'</script>";
        }
        
    }
    ?>
</body>
</html>