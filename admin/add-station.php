<?php

include_once "includes/header.php";

if(isset($_POST['submit'])) {
    insert("stations", ["name" => $_POST['name'], "country_id" => $_POST["country"]]);

    $msg = "<p class='text-success'>Station added successfully!</p>";
}

$countries = findAll("countries");

if(empty($countries)) {
    die("Please add a country first!");
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
                                <p class="f-20 w-400 my-2">Add Station</p>
                                <?php echo $msg ?? "" ?>
                                <div class="seprator mb-3"></div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="name" class="form-label f-14 w-500">Station Name</label>
                                    <input type="text" name="name" class="form-control" id="name">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <label for="country" class="form-label f-14 w-500">Country</label>
                                <select name="country" class="form-select mb-3" id="country">
                                    <?php if(!empty($countries)): ?>
                                    <?php foreach ($countries as $country): ?>
                                        <option value="<?php echo $country->id ?>"><?php echo $country->name ?></option>
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