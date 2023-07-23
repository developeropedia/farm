<?php

include_once "includes/header.php";

if(isset($_GET['id'])) {
    delete("diseases", "id", $_GET['id']);
}

$userStation = getUserStation();

$query = "SELECT * FROM diseases d";
$query .= " WHERE d.station_id = " . $userStation->station_id;
$diseases = findAllByQuery($query);

?>


    <!-- -----------Main Contents----------- -->
    <main class="content pb-4">
        <div class="p-20">
            <div class="d-flex justify-content-end align-items-center flex-wrap">
                <div class="d-flex align-items-center btns-row">
                    <a href="add-disease.php"><button class="panel-button">+&nbsp;&nbsp;Add Record</button></a>
                </div>
            </div>

        </div>

        <div class="container-fluid">
            <div class="row m-0 -0">
                <div class="col-lg-12">
                    <div class="panel-card">
                        <div class="">
                            <p class="f-20 w-400 my-3">Diseases</p>
                            <div class="seprator"></div>
                        </div>
                        <div class="products-table-wrapper">
                            <table id="dashboard-table" class="products-table" style="width:100%">
                                <thead>
                                <tr>
                                    <th class="products-table-head">S.No</th>
                                    <th class="products-table-head">Disease Name</th>
                                    <th class="products-table-head">Description</th>
                                    <th class="products-table-head">Symptoms</th>
                                    <th class="products-table-head">Preventive Measures</th>
                                    <th class="products-table-head">Created at</th>
                                    <th class="products-table-head">Updated at</th>
                                    <th class="products-table-head">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php if(!empty($diseases)): ?>
                                    <?php $count = 1; foreach ($diseases as $disease): ?>
                                        <tr>
                                            <td class="product-table-text"><?php echo $count++ ?></td>
                                            <td class="product-table-text"><?php echo $disease->name ?></td>
                                            <td class="product-table-text"><?php echo $disease->description ?></td>
                                            <td class="product-table-text"><?php echo $disease->symptoms ?></td>
                                            <td class="product-table-text"><?php echo $disease->preventive_measures ?></td>
                                            <td class="product-table-text"><?php echo date("d M, Y", strtotime($disease->created_at)) ?></td>
                                            <td class="product-table-text"><?php echo date("d M, Y", strtotime($disease->updated_at)) ?></td>
                                            <td class="icons">
                                                <div class="d-flex">
                                                    <a href="edit-disease.php?id=<?php echo $disease->id ?>"> <i
                                                                class="bi bi-pencil-square"></i></a>
                                                    <a href="?id=<?php echo $disease->id ?>"> <i
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