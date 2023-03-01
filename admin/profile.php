<?php

include_once "includes/header.php";

if(isset($_POST['submit'])) {
    $data = array();
    $data['username'] = $_POST['username'];
    if(isset($_POST['password']) && !empty($_POST['password'])) {
        $data['password'] = password_hash($_POST['password'], PASSWORD_BCRYPT);
    }
    update("users", $data, "id", $_SESSION['user']);

    $msg = "<p class='text-success'>Profile updated successfully!</p>";
}

$user = findById("users", $_SESSION['user']);
?>


<!-- -----------Main Contents----------- -->
<main class="content pb-4">
    <div class="container-fluid">
        <div class="row m-0 p-0">
            <div class="col-lg-12 mt-4 ">
                <div class="panel-card">
                    <form action="" method="post">
                        <div class="row">
                            <div class="col-lg-12">
                                <p class="f-20 w-400 my-2">Edit Profile</p>
                                <?php echo $msg ?? "" ?>
                                <div class="seprator mb-3"></div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="name" class="form-label f-14 w-500">Username</label>
                                    <input type="text" value="<?php echo $user->username ?>" name="username" class="form-control" id="name">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="password" class="form-label f-14 w-500">Password <small>(Leave blank to not change)</small></label>
                                    <input type="password" name="password" class="form-control" id="password">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="d-flex align-items-center justify-content-between ">
                                    <button type="submit" name="submit" class="panel-button2">Submit</button>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>

</main>

<?php

include_once "includes/footer.php";

?>