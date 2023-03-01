<?php

include_once "includes/header.php";

if(isset($_POST['submit'])) {
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    insert("users", ["username" => $_POST['username'], "password" => $password, "level" => $_POST['level']]);

    $msg = "<p class='text-success'>User created successfully!</p>";
}

$levels = findAll("user_levels");
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
                                <p class="f-20 w-400 my-2">Add User</p>
                                <?php echo $msg ?? "" ?>
                                <div class="seprator mb-3"></div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="name" class="form-label f-14 w-500">Username</label>
                                    <input type="text" name="username" class="form-control" id="name">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="password" class="form-label f-14 w-500">Password</label>
                                    <input type="password" name="password" class="form-control" id="password">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <label for="level" class="form-label f-14 w-500">Level</label>
                                <select name="level" class="form-select mb-3" id="level">
                                    <?php if(!empty($levels)): ?>
                                    <?php foreach ($levels as $level): ?>
                                        <option value="<?php echo $level->id ?>"><?php echo $level->name ?></option>
                                    <?php endforeach; ?>
                                    <?php endif; ?>
                                </select>
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