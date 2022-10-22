<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body>

    <div class="container">
        <div class="col-md-6 offset-md-3">
            <form action="Insert.php" method="post" enctype="multipart/form-data">
                <h2 class="text-center">Insert Form</h2>
                <input type="text" class="form-control" name="name" placeholder="Enter Your Name" required />
                <br>
                <select name="gender" class="form-control" required>
                    <option value="">Select Gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
                <br>
                <input type="number" min="3" max="30" class="form-control" placeholder="Enter Your Age" name="age" required />
                <br>
                <input type="number" min="3" max="30" class="form-control" placeholder="Enter Your Class" name="class" required />
                <br>
                <input type="file" name="image" required />
                <br><br>
                <input type="submit" class="btn btn-info btn-block" value="Insert" name="InsertBtn">

            </form>
        </div>
    </div>
</body>

</html>