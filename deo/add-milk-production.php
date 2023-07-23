<?php

include_once "includes/header.php";

$userStation = getUserStation();
if (empty($userStation)) {
    echo "<script>alert('You are not assigned a station!')</script>";
    redirect("index.php");
}

if(isset($_POST['submit'])) {
    unset($_POST['submit']);
    $_POST['total_production'] = $_POST['morning_production'] + $_POST['evening_production'];
    insert("milk_production", $_POST);

    $msg = "<p class='text-success'>Milk production created successfully!</p>";
}

$cattle = findAll("cattle");
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
                                <p class="f-20 w-400 my-2">Add Milk Production</p>
                                <?php echo $msg ?? "" ?>
                                <div class="seprator mb-3"></div>
                            </div>
                            <div class="col-lg-6">
                                <label for="level" class="form-label f-14 w-500">Tag No.</label>
                                <select name="cattle_id" class="form-select mb-3" id="level">
                                    <?php if(!empty($cattle)): ?>
                                        <?php foreach ($cattle as $c): ?>
                                            <option value="<?php echo $c->id ?>"><?php echo $c->tag_num ?></option>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </select>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="pd" class="form-label f-14 w-500">Production Date</label>
                                    <input type="date" name="production_date" class="form-control" id="pd">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="mp" class="form-label f-14 w-500">Morning Production</label>
                                    <input type="number" name="morning_production" class="form-control" id="mp">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="ep" class="form-label f-14 w-500">Evening Production</label>
                                    <input type="number" name="evening_production" class="form-control" id="ep">
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