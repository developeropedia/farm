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
    update("bull_service_record", $_POST, "id", $_GET['id']);

    $msg = "<p class='text-success'>Record updated successfully!</p>";
}

$bull_service = findById("bull_service_record", $_GET['id']);

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
                                <p class="f-20 w-400 my-2">Edit Bull Service</p>
                                <?php echo $msg ?? "" ?>
                                <div class="seprator mb-3"></div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="name" class="form-label f-14 w-500">Bull Name</label>
                                    <input required value="<?php echo $bull_service->bull_name; ?>" type="text" name="bull_name" class="form-control" id="name">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="service_date" class="form-label f-14 w-500">Service Date</label>
                                    <input required value="<?php echo $bull_service->service_date; ?>" type="date" name="service_date" class="form-control" id="service_date">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="service_type" class="form-label f-14 w-500">Service Type</label>
                                    <input required value="<?php echo $bull_service->service_type; ?>" type="text" name="service_type" class="form-control" id="service_type">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="veterinarian" class="form-label f-14 w-500">Veterinarian Name</label>
                                    <input required value="<?php echo $bull_service->veterinarian; ?>" type="text" name="veterinarian" class="form-control" id="veterinarian">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="comment" class="form-label f-14 w-500">Remarks</label>
                                    <input type="text" value="<?php echo $bull_service->remarks; ?>" name="remarks" class="form-control" id="comment">
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