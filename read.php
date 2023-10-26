
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>view page</title>
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css"> -->
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>
<body style= "background-color:khaki;">
<nav class="navbar navbar-light justify-content-center fs-3 mb-5" style= "background-color: #00ff5573;">
        REGISTRATION APPLICATION
    </nav>
    <div class="container">
        <?php
        if(isset($_GET['msg'])){
            $msg = $_GET['msg'];
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            '.$msg.'
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        }
        ?>
        <a href="create1.php" class="btn btn-dark mb-3">Add New</a>

        <table class="table table-hover text-center">
            <thead class="table-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">First name</th>
                <th scope="col">Last name</th>
                <th scope="col">Email</th>
                <th scope="col">Address</th>
                <th scope="col">Gender</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
        <tbody>
            <?php
            include "Includes/config.php";
            $sql = "SELECT * FROM `users`";
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_assoc($result)){
            ?>

                    <tr>
                        <td><?php echo $row['id'];?> </td>
                        <td><?php echo $row['firstname'];?> </td>
                        <td><?php echo $row['lastname'];?> </td>
                        <td><?php echo $row['email'];?> </td>
                        <td><?php echo $row['address'];?> </td>
                        <td><?php echo $row['gender'];?> </td>
                       <td><a class="btn btn-success" href="update.php?id=<?php echo $row['id']; ?>">Edit</a>
                       &nbsp;<a class= "btn btn-danger"href="delete.php?id=<?php echo $row['id'];?>"> Delete</a>
                    </td>
                    </tr>

                <?php   
                    
                }
                    ?>
        </tbody>
        </table>
    </div>
</body>
</html>