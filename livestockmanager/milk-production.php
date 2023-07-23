<?php

include_once "includes/header.php";

if(isset($_GET['id'])) {
    delete("milk_production", "id", $_GET['id']);
}

$countryStations = countryStations();

$milk_production = null;

if (!empty($countryStations)) {
    $milk_production = findAllByQuery("SELECT *, mp.id AS mpId, s.id AS sId, s.name AS sName FROM milk_production mp INNER JOIN cattle c on mp.cattle_id = c.id INNER JOIN stations s ON s.id = c.station_id WHERE c.station_id IN (" . implode(',', $countryStations) . ") ORDER BY mp.created_at DESC");
}

?>


    <!-- -----------Main Contents----------- -->
    <main class="content pb-4">
        <div class="p-20">
            <div class="d-flex justify-content-end align-items-center flex-wrap">
                <div class="d-flex align-items-center btns-row">
                    <a href="add-milk-production.php"><button class="panel-button">+&nbsp;&nbsp;Add Milk Production</button></a>
                </div>
            </div>

        </div>

        <div class="container-fluid">
            <div class="row m-0 -0">
                <div class="col-lg-12">
                    <div class="panel-card">
                        <div class="">
                            <p class="f-20 w-400 my-3">Milk Production</p>
                            <div class="seprator"></div>
                        </div>
                        <div class="products-table-wrapper">
                            <table id="dashboard-table" class="products-table" style="width:100%">
                                <thead>
                                <tr>
                                    <th class="products-table-head">S.No</th>
                                    <th class="products-table-head">Station</th>
                                    <th class="products-table-head">Tag No.</th>
                                    <th class="products-table-head">Production Date</th>
                                    <th class="products-table-head">Morning Production</th>
                                    <th class="products-table-head">Evening Production</th>
                                    <th class="products-table-head">Total Production</th>
                                    <th class="products-table-head">Created at</th>
                                    <th class="products-table-head">Updated at</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php if(!empty($milk_production)): ?>
                                    <?php $count = 1; foreach ($milk_production as $mp): ?>
                                        <tr>
                                            <td class="product-table-text"><?php echo $count++ ?></td>
                                            <td class="product-table-text"><?php echo $mp->sName ?></td>
                                            <td class="product-table-text"><?php echo $mp->tag_num ?></td>
                                            <td class="product-table-text"><?php echo date("d M, Y", strtotime($mp->production_date)) ?></td>
                                            <td class="product-table-text"><?php echo $mp->morning_production ?> Liters</td>
                                            <td class="product-table-text"><?php echo $mp->evening_production ?> Liters</td>
                                            <td class="product-table-text"><?php echo $mp->total_production ?> Liters</td>
                                            <td class="product-table-text"><?php echo date("d M, Y", strtotime($mp->created_at)) ?></td>
                                            <td class="product-table-text"><?php echo date("d M, Y", strtotime($mp->updated_at)) ?></td>
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