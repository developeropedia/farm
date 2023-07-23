<?php

include_once "includes/header.php";

if (!isset($_GET['id'])) {
    redirect("country-assignments.php");
}

if (isset($_POST['submit'])) {
    $user_id = $_POST['user'];
    $country_id = $_POST['country'];
    update("user_country", ["user_id" => $user_id, "country_id" => $country_id], "id", $_GET['id']);

    $msg = "<p class='text-success'>Country assignment updated successfully!</p>";
}

$countries = findAll("countries");
$users = findAllByQuery("SELECT * FROM users WHERE level != 1 AND level != 3 AND level != 4");
$uc = findById("user_country", $_GET['id']);

if (empty($countries)) {
    echo "<script>alert('Please add a country first!')</script>";
    redirect("add-country.php");
}
if (empty($users)) {
    echo "<script>alert('Please add a user first!')</script>";
    redirect("add-user.php");
}
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
                                <p class="f-20 w-400 my-2">Edit Country Assignment</p>
                                <?php echo $msg ?? "" ?>
                                <div class="seprator mb-3"></div>
                            </div>
                            <div class="col-lg-6">
                                <label for="name" class="form-label f-14 w-500">User</label>
                                <select name="user" class="form-select mb-3" id="name">
                                    <?php if (!empty($users)) : ?>
                                        <?php foreach ($users as $user) : ?>
                                            <option <?php echo $user->id == $uc->user_id ? "selected" : ""; ?> value="<?php echo $user->id ?>"><?php echo $user->username ?></option>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </select>
                            </div>
                            <div class="col-lg-6">
                                <label for="country" class="form-label f-14 w-500">Country</label>
                                <select name="country" class="form-select mb-3" id="country">
                                    <?php if (!empty($countries)) : ?>
                                        <?php foreach ($countries as $country) : ?>
                                            <option <?php echo $country->id == $uc->country_id ? "selected" : ""; ?> value="<?php echo $country->id ?>"><?php echo $country->name ?></option>
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