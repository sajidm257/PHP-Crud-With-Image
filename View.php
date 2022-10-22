<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body>
    <?php
    include('dbConnection.php');

    $query = "select * from student";
    $run = mysqli_query($con, $query);
    $TotalRows = mysqli_num_rows($run);
    if ($TotalRows != 0) {
    ?>
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3">


                    <table class="table table-bordered table-striped table-hover">
                        <tr>
                            <th colspan="8" class="text-center">
                                <h2>Student Details</h2>
                            </th>
                        </tr>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Gender</th>
                            <th>Age</th>
                            <th>Class</th>
                            <th>Image</th>
                            <th>Update</th>
                            <th>Delete</th>

                        </tr>
                    <?php
                    while ($data = mysqli_fetch_array($run)) {
                        echo "<tr>
                                <td>" . $data['0'] . "</td>
                                <td>" . $data['1'] . "</td>
                                <td>" . $data['2'] . "</td>
                                <td>" . $data['3'] . "</td>
                                <td>" . $data['4'] . "</td>
                                <td><img src='$data[5]' height='70' width='70'/></td>
                                <td><a href='Update.php?id=$data[0]'>Update</a></td>
                                <td><a href='Delete.php?id=$data[0]' onclick='return Confirmation()'>Delete</a></td>";
                    };
                } else {
                    echo "No Rows Found";
                }

                    ?>
                    </table>
                </div>
            </div>
        </div>

        <script>
            function Confirmation() {
                return confirm('Are You Sure To Delete Data ??');
            }
        </script>
</body>

</html>