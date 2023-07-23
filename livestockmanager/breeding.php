<?php

include_once "includes/header.php";

if(isset($_GET['id'])) {
    delete("breeding_records", "id", $_GET['id']);
}

$countryStations = countryStations();

$breedings = null;

if(!empty($countryStations)) {
    $query = "SELECT *, br.id AS brId, s.id AS sId, s.name AS sName FROM breeding_records br";
    $query .= " INNER JOIN cattle c ON c.id = br.animal_id";
    $query .= " INNER JOIN stations s ON s.id = br.station_id";
    $query .= " WHERE br.station_id IN (" . implode(',', $countryStations) . ")";
    $breedings = findAllByQuery($query);
}

?>


    <!-- -----------Main Contents----------- -->
    <main class="content pb-4">
        <div class="p-20">
            <div class="d-flex justify-content-end align-items-center flex-wrap">
                <div class="d-flex align-items-center btns-row">
                    <a href="add-breeding.php"><button class="panel-button">+&nbsp;&nbsp;Add Record</button></a>
                </div>
            </div>

        </div>

        <div class="container-fluid">
            <div class="row m-0 -0">
                <div class="col-lg-12">
                    <div class="panel-card">
                        <div class="">
                            <p class="f-20 w-400 my-3">Breeding Record</p>
                            <div class="seprator"></div>
                        </div>
                        <div class="products-table-wrapper">
                            <table id="dashboard-table" class="products-table" style="width:100%">
                                <thead>
                                <tr>
                                    <th class="products-table-head">S.No</th>
                                    <th class="products-table-head">Station</th>
                                    <th class="products-table-head">Tag No.</th>
                                    <th class="products-table-head">Breeding Date</th>
                                    <th class="products-table-head">Litter Size</th>
                                    <th class="products-table-head">Comment</th>
                                    <th class="products-table-head">Created at</th>
                                    <th class="products-table-head">Updated at</th>
                                    <th class="products-table-head">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php if(!empty($breedings)): ?>
                                    <?php $count = 1; foreach ($breedings as $breeding): ?>
                                        <tr>
                                            <td class="product-table-text"><?php echo $count++ ?></td>
                                            <td class="product-table-text"><?php echo $breeding->sName ?></td>
                                            <td class="product-table-text"><?php echo $breeding->tag_num ?></td>
                                            <td class="product-table-text"><?php echo date("d M, Y", strtotime($breeding->breeding_date)) ?></td>
                                            <td class="product-table-text"><?php echo $breeding->litter_size ?></td>
                                            <td class="product-table-text"><?php echo $breeding->comments ?></td>
                                            <td class="product-table-text"><?php echo date("d M, Y", strtotime($breeding->created_at)) ?></td>
                                            <td class="product-table-text"><?php echo date("d M, Y", strtotime($breeding->updated_at)) ?></td>
                                            <td class="icons">
                                                <div class="d-flex">
                                                    <a href="edit-breeding.php?id=<?php echo $breeding->brId ?>"> <i
                                                                class="bi bi-pencil-square"></i></a>
                                                    <a href="?id=<?php echo $breeding->brId ?>"> <i
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