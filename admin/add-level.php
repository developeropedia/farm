<?php

include_once "includes/header.php";

if(isset($_POST['submit'])) {
    insert("user_levels", ["name" => $_POST['level']]);

    $msg = "<p class='text-success'>Level created successfully!</p>";
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
                                <p class="f-20 w-400 my-2">Add Level</p>
                                <?php echo $msg ?? "" ?>
                                <div class="seprator mb-3"></div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="name" class="form-label f-14 w-500">Level</label>
                                    <input type="text" name="level" class="form-control" id="name">
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