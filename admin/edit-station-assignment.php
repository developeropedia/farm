<?php

include_once "includes/header.php";

if (!isset($_GET['id'])) {
    redirect("station-assignments.php");
}

if (isset($_POST['submit'])) {
    $user_id = $_POST['user'];
    $station_id = $_POST['station'];
    update("user_station", ["user_id" => $user_id, "station_id" => $station_id], "id", $_GET['id']);

    $msg = "<p class='text-success'>Station assignment updated successfully!</p>";
}

$stations = findAll("stations");
$users = findAllByQuery("SELECT * FROM users WHERE level != 1 AND level != 2");
$us = findById("user_station", $_GET['id']);

if (empty($stations)) {
    echo "<script>alert('Please add a station first!')</script>";
    redirect("add-station.php");
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
                                <p class="f-20 w-400 my-2">Edit Station Assignment</p>
                                <?php echo $msg ?? "" ?>
                                <div class="seprator mb-3"></div>
                            </div>
                            <div class="col-lg-6">
                                <label for="name" class="form-label f-14 w-500">User</label>
                                <select name="user" class="form-select mb-3" id="name">
                                    <?php if (!empty($users)) : ?>
                                        <?php foreach ($users as $user) : ?>
                                            <option <?php echo $user->id == $us->user_id ? "selected" : ""; ?> value="<?php echo $user->id ?>"><?php echo $user->username ?></option>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </select>
                            </div>
                            <div class="col-lg-6">
                                <label for="country" class="form-label f-14 w-500">Station</label>
                                <select name="station" class="form-select mb-3" id="country">
                                    <?php if (!empty($stations)) : ?>
                                        <?php foreach ($stations as $station) : ?>
                                            <option <?php echo $station->id == $us->station_id ? "selected" : ""; ?> value="<?php echo $station->id ?>"><?php echo $station->name ?></option>
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