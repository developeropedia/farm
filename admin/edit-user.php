<?php

include_once "includes/header.php";

if(!isset($_GET['id'])) {
    redirect("users.php");
}

if(isset($_POST['submit'])) {
    $data = array();
    $data['username'] = $_POST['username'];
    $data['level'] = $_POST['level'];
    if(isset($_POST['password']) && !empty($_POST['password'])) {
        $data['password'] = password_hash($_POST['password'], PASSWORD_BCRYPT);
    }
    update("users", $data, "id", $_GET['id']);

    $msg = "<p class='text-success'>User updated successfully!</p>";
}

$user = findById("users", $_GET['id']);
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
                                <p class="f-20 w-400 my-2">Edit User</p>
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
                                <label for="level" class="form-label f-14 w-500">Level</label>
                                <select name="level" class="form-select mb-3" id="level">
                                    <?php if(!empty($levels)): ?>
                                    <?php foreach ($levels as $level): ?>
                                        <option <?php echo $level->id == $user->level ? "selected" : "" ?> value="<?php echo $level->id ?>"><?php echo $level->name ?></option>
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