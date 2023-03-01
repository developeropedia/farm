<?php

include_once "includes/header.php";

if(isset($_POST['submit'])) {
    unset($_POST['submit']);
    insert("cattle", $_POST);

    $msg = "<p class='text-success'>Cattle created successfully!</p>";
}

function generateTagNumber() {
    $length = 8; // length of tag number
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $tagNumber = '';
    for ($i = 0; $i < $length; $i++) {
        $tagNumber .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $tagNumber;
}

do {
    $tagExists = "";
    $tagNumber = generateTagNumber();
    $tagExists = findByQuery("SELECT * FROM cattle WHERE tag_num = '{$tagNumber}'");
} while (!empty($tagExists));

$types = findAll("cattle_types");
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
                                <p class="f-20 w-400 my-2">Add Cattle</p>
                                <?php echo $msg ?? "" ?>
                                <div class="seprator mb-3"></div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="breed" class="form-label f-14 w-500">Breed</label>
                                    <input type="text" name="breed" class="form-control" id="breed">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="tag_num" class="form-label f-14 w-500">Tag No.</label>
                                    <input readonly type="text" value="<?php echo $tagNumber ?>" name="tag_num" class="form-control" id="tag_num">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="dob" class="form-label f-14 w-500">Date of birth</label>
                                    <input type="date" name="date_of_birth" class="form-control" id="dob">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="doe" class="form-label f-14 w-500">Date of entry</label>
                                    <input type="date" name="date_of_entry" class="form-control" id="doe">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="remarks" class="form-label f-14 w-500">Remarks</label>
                                    <textarea name="remarks" class="form-control" id="remarks"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <label for="level" class="form-label f-14 w-500">Cattle Type</label>
                                <select name="cattle_type_id" class="form-select mb-3" id="level">
                                    <?php if(!empty($types)): ?>
                                    <?php foreach ($types as $type): ?>
                                        <option value="<?php echo $type->id ?>"><?php echo $type->type ?></option>
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