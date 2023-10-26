<?php
    include "Includes/config.php";
    $id = $_GET['id'];

    if(isset($_POST['submit'])){
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email = $_POST['email'];
        $birthday = $_POST['birthday'];
        $address = $_POST['address'];
        $gender = $_POST['gender'];

        $sql = "UPDATE `crudtable` SET `firstname`='$first_name',`lastname`='$last_name',`email`='$email', `address`='$address',`gender`='$gender' WHERE id=$id";

        $result = mysqli_query($conn, $sql);

        if ($result){
            header("Location: read.php?msg=Data updated successfully");
        }
        else{
            echo "Failed: " . mysqli_error($conn);
        }
    }

?>

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
        <div class="text-center mb-4">
        <h3>Edit User Information</h3>
            <p class="text-muted">Click update after changing any information</p>
        </div>
        
        <?php
        
        $sql = "SELECT * FROM `users` WHERE id = $id LIMIT 1";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        ?>

        <div class="container d-flex justify-content-center">
            <form action="" method="post" sytle = "width:50vw; min-width:300px;">
                <div class="row mb-2">
                    <div class="col">
                        <label class= "form-label" style="font-weight: 800;">First Name</label>
                        <input type="text" class= "form-control" name="first_name" value ="<?php echo $row['firstname'] ?>">
                    </div>

                    <div class="col">
                    <label class="form-label" style="font-weight: 800;">Last Name:</label>
                        <input type="text" class="form-control" name="last_name" value ="<?php echo $row['lastname'] ?>">
                    </div>
                </div>

                <div class="mb-2">
                    <label class="form-label" style="font-weight: 800;">Email:</label>
                    <input type="text" class="form-control" name="email" value ="<?php echo $row['email'] ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label" style="font-weight: 800;">Address:</label>
                    <input type="text" class="form-control" name="address" value ="<?php echo $row['address'] ?>">
                </div>

                <div class="form-group mb-3">
                    <label style="font-weight: 800;">Gender:</label>  &nbsp;
                    <input type="radio" class="form-check-input" name="gender" id="male" value="Male" <?php echo ($row['gender']=='male')? "checked":""; ?>>
                    <label for="male" class="fomr-input-label">Male</label>
                    &nbsp;
                    <input type="radio" class="form-check-input" name="gender" id="female" value="Female" <?php echo ($row['gender']=='female')? "checked":""; ?>>
                    <label for="female" class="fomr-input-label">Female</label>
                </div>

                <div>
                    <button type="submit" class="btn btn-success" name="submit" style="font-weight: 600;">UPDATE</button>
                    <a href="read.php" class="btn btn-danger" style="font-weight: 600;">CANCEL</a>
                </div>

            </form>
        </div>
    </div>

    <!-- bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>