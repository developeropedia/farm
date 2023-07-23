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
    update("diseases", $_POST, "id", $_GET['id']);

    $msg = "<p class='text-success'>Record updated successfully!</p>";
}

$disease = findById("diseases", $_GET['id']);
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
                                <p class="f-20 w-400 my-2">Edit Disease</p>
                                <?php echo $msg ?? "" ?>
                                <div class="seprator mb-3"></div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="name" class="form-label f-14 w-500">Disease Name</label>
                                    <input type="text" value="<?php echo $disease->name; ?>" name="name" class="form-control" id="name">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="description" class="form-label f-14 w-500">Description</label>
                                    <input type="text" value="<?php echo $disease->description; ?>" name="description" class="form-control" id="description">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="symptoms" class="form-label f-14 w-500">Symptoms</label>
                                    <input type="text" value="<?php echo $disease->symptoms; ?>" name="symptoms" class="form-control" id="symptoms">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="prevention_measures" class="form-label f-14 w-500">Prevention Measures</label>
                                    <input type="text" value="<?php echo $disease->preventive_measures; ?>" name="preventive_measures" class="form-control" id="prevention_measures">
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