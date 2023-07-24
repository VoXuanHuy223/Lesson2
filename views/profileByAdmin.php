<?php
require_once '../config/database.php';
spl_autoload_register(function ($className) {
    require_once "../models/$className.php";
});
$userModel = new UserModel();
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $user = $userModel->getUserById($id);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body class="position-relative">
    <div class="container py-5">
        <a href="./homeByAdmin.php" class="btn btn-light">Home</a>
        <a class="btn btn-light" href="../controllers/logout.php">Logout</a>
        <a href="./editByAdmin.php" class="btn btn-primary">Edit</a>


        <div class="main border col-md-6 row-justify-content-center  px-5 py-5 ">

            <form method="POST" action="">
                <div class="mb-3">
                    <label for="fullname" class="form-label">Full Name</label>
                    <input type="text" disabled class="form-control" value="<?php echo $user['full_name']; ?>" name="fullname"
                        id="fullname">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" disabled class="form-control" id="email" name="email"
                        value="<?php echo $user['email']; ?>" aria-describedby="emailHelp">
                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" disabled value="<?php echo $user['password']; ?>" name="password"
                        id="password">
                </div>
                <div class="mb-3">
                    <input type="hidden" class="form-control" name="role" id="role" value="User" disabled>
                    <select class="form-select" aria-label="Default select example" name="permission" disabled>
                        <option selected>
                            <?php echo $user['role'] ?>
                        </option>
                        <option value="Admin">
                            <?php if ($user['role'] != "Admin")
                                echo "Admin";
                            else
                                echo "User"; ?>
                        </option>
                    </select>
                </div>
                <a href="./editByAdmin.php?id=<?php echo $user['id']; ?>" class="btn btn-primary">Edit</a>
            </form>
        </div>
    </div>


</body>

</html>