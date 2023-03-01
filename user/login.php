<?php

include_once "../includes/functions.php";

if(isset($_SESSION['user'])) {
    redirect("index.php");
}

$msg = login();

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Farm</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/css-pro-layout@1.1.0/dist/css/css-pro-layout.css">
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../assets/css/typography.css">
    <link rel="stylesheet" href="../assets/css/layout.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/reponsive.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">

</head>

<body>
    <div class="container">
        <div class="row ">
            <div class="col-lg-6 mx-auto">
                <div class="container">
                    <div class="row sign-row d-flex justify-content-center align-items-center">
                        <form class="col-lg-9 sign-form mx-auto" method="post">
                            <h4 class="">Login</h4>
                            <?php echo $msg ?? "" ?>
                            <p class="f-14 w-400 mb-3">Access your portal using yor username and password.</p>
                            <label>Username</label>
                            <input type="text" name="username" class=" w-100 mb-3" placeholder="Username ">
                            <div class="d-flex align-items-center justify-content-between">
                                <label>Password</label>
                            </div>
                            <div class="password">
                                <input type="password" name="password" autocomplete="current-password" required=""
                                    id="id_password" class="w-100">
                                <i class="far fa-eye" id="togglePassword"
                                    style="margin-left: -30px; cursor: pointer;"></i>
                            </div>
                            <a><button type="submit" name="login" class="mt-4 w-600 f-15 w-100">Login</button></a>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.6.0/umd/popper.min.js"
        integrity="sha512-BmM0/BQlqh02wuK5Gz9yrbe7VyIVwOzD1o40yi1IsTjriX/NGF37NyXHfmFzIlMmoSIBXgqDiG1VNU6kB5dBbA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        // Login
const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('#id_password');

        togglePassword.addEventListener('click', function (e) {
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            this.classList.toggle('fa-eye-slash');
        });
    </script>
</body>

</html>