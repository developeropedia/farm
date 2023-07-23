<?php

include_once "includes/header.php";

$userStation = getUserStation();
if (empty($userStation)) {
    echo "<script>alert('You are not assigned a station!')</script>";
    redirect("index.php");
}

if (isset($_POST['submit'])) {
    $_POST['station_id'] = $userStation->station_id;
    unset($_POST['submit']);
    update("calf_status_record", $_POST, "id", $_GET['id']);

    $msg = "<p class='text-success'>Record updated successfully!</p>";
}

$calf = findById("calf_status_record", $_GET['id']);

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
                                <p class="f-20 w-400 my-2">Edit Calf Status</p>
                                <?php echo $msg ?? "" ?>
                                <div class="seprator mb-3"></div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="name" class="form-label f-14 w-500">Calf Name</label>
                                    <input required value="<?php echo $calf->calf_name; ?>" type="text" name="calf_name" class="form-control" id="name">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="service_date" class="form-label f-14 w-500">Birth Date</label>
                                    <input required value="<?php echo $calf->birth_date; ?>" type="date" name="birth_date" class="form-control" id="service_date">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <label for="gender" class="form-label f-14 w-500">Gender</label>
                                <select name="gender" class="form-select mb-3" id="gender">
                                    <option <?php echo $calf->gender == "Male" ? "selected" : ""; ?> value="Male">Male</option>
                                    <option <?php echo $calf->gender == "Female" ? "selected" : ""; ?> value="Female">Female</option>
                                </select>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="weight" class="form-label f-14 w-500">Weight (KG)</label>
                                    <input required value="<?php echo $calf->weight; ?>" type="text" name="weight" class="form-control" id="weight">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <label for="health_condition" class="form-label f-14 w-500">Health Condition</label>
                                <select name="health_condition" class="form-select mb-3" id="health_condition">
                                    <option <?php echo $calf->health_condition == "Good" ? "selected" : ""; ?> value="Good">Good</option>
                                    <option <?php echo $calf->health_condition == "Fair" ? "selected" : ""; ?> value="Fair">Fair</option>
                                    <option <?php echo $calf->health_condition == "Poor" ? "selected" : ""; ?> value="Poor">Poor</option>
                                </select>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="comment" class="form-label f-14 w-500">Remarks</label>
                                    <input value="<?php echo $calf->remarks; ?>" type="text" name="remarks" class="form-control" id="comment">
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