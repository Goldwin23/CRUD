<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Font -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Registration Form</title>
</head>
<body style= "background-color: darkkhaki;">
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
        <a href="create.php" class="btn btn-dark mb-3" style="font-weight: 800;">Add New</a>

        <table class="table table-hover text-center ">
            <thead class="table-dark">  
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Date of Birth</th>
                    <th scope="col">Address</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
        <tbody>
        <?php
             include "Includes/dbconn.php";

                $sql = "SELECT * FROM  `crudtable`";
                $result = mysqli_query($conn, $sql);
                while  ($row = mysqli_fetch_assoc($result)){
        ?>
                <tr>
                    <td><?php echo $row['id'] ?></td>
                    <td><?php echo $row['firstname'] ?></td>
                    <td><?php echo $row['lastname'] ?></td>
                    <td><?php echo $row['gmail'] ?></td>
                    <td><?php echo $row['dateofbirth'] ?></td>
                    <td><?php echo $row['address'] ?></td>
                    <td><?php echo $row['gender'] ?></td>

                <td>
                <a href="update.php?id=<?php echo $row['id'] ?>" class="link-dark"><i class= "fa-solid fa-pen-to-square fs-5 me-3"></i></a>
                <a href="delete.php?id=<?php echo $row['id'] ?>" class="link-dark"><i class= "fa-solid fa-trash fs-5 me-3"></i></a>
                </td>
        </tr>
        <?php
    }
?> 


    </tbody>
    </table>
    </div>

    <!-- bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>