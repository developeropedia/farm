<?php

include_once "includes/header.php";

if(isset($_GET['id'])) {
    delete("countries", "id", $_GET['id']);
}

$countries = findAllByQuery("SELECT * FROM countries");

?>


<!-- -----------Main Contents----------- -->
<main class="content pb-4">
    <div class="p-20">
        <div class="d-flex justify-content-end align-items-center flex-wrap">
            <div class="d-flex align-items-center btns-row">
                <a href="add-country.php"><button class="panel-button">+&nbsp;&nbsp;Add Country</button></a>
            </div>
        </div>

    </div>

    <div class="container-fluid">
        <div class="row m-0 -0">
            <div class="col-lg-12">
                <div class="panel-card">
                    <div class="">
                        <p class="f-20 w-400 my-3">Countries</p>
                       <div class="seprator"></div>
                    </div>
                    <div class="products-table-wrapper">
                        <table id="dashboard-table" class="products-table" style="width:100%">
                            <thead>
                                <tr>
                                    <th class="products-table-head">S.No</th>
                                    <th class="products-table-head">Country Name</th>
                                    <th class="products-table-head">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($countries)): ?>
                                <?php $count = 1; foreach ($countries as $country): ?>
                                    <tr>
                                        <td class="product-table-text"><?php echo $count++ ?></td>
                                        <td class="product-table-text"><?php echo $country->name ?></td>
                                        <td class="icons">
                                            <div class="d-flex">
                                                <a href="edit-country.php?id=<?php echo $country->id ?>"> <i
                                                            class="bi bi-pencil-square"></i></a>
                                                <a href="?id=<?php echo $country->id ?>"> <i
                                                            class="bi bi-trash"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>

<?php

include_once "includes/footer.php";

?>