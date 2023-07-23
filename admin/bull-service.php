<?php

include_once "includes/header.php";

if (isset($_GET['id'])) {
    delete("bull_service_record", "id", $_GET['id']);
}

$query = "SELECT *, s.id AS sId, s.name AS sName, cn.name AS cnName FROM bull_service_record br";
$query .= " INNER JOIN stations s ON s.id = br.station_id INNER JOIN countries cn ON cn.id = s.country_id";
$bull_service_records = findAllByQuery($query);

?>


<!-- -----------Main Contents----------- -->
<main class="content pb-4">
    <div class="p-20">

    </div>

    <div class="container-fluid">
        <div class="row m-0 -0">
            <div class="col-lg-12">
                <div class="panel-card">
                    <div class="">
                        <p class="f-20 w-400 my-3">Bull Service Record</p>
                        <div class="seprator"></div>
                    </div>
                    <div class="products-table-wrapper">
                        <table id="dashboard-table" class="products-table" style="width:100%">
                            <thead>
                                <tr>
                                    <th class="products-table-head">S.No</th>
                                    <th class="products-table-head">Country</th>
                                    <th class="products-table-head">Station</th>
                                    <th class="products-table-head">Bull Name</th>
                                    <th class="products-table-head">Service Date</th>
                                    <th class="products-table-head">Service Type</th>
                                    <th class="products-table-head">Veterinarian Name</th>
                                    <th class="products-table-head">Remarks</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($bull_service_records)) : ?>
                                    <?php $count = 1;
                                    foreach ($bull_service_records as $br) : ?>
                                        <tr>
                                            <td class="product-table-text"><?php echo $count++ ?></td>
                                            <td class="product-table-text"><?php echo $br->cnName ?></td>
                                            <td class="product-table-text"><?php echo $br->sName ?></td>
                                            <td class="product-table-text"><?php echo $br->bull_name ?></td>
                                            <td class="product-table-text"><?php echo date("d M, Y", strtotime($br->service_date)) ?></td>
                                            <td class="product-table-text"><?php echo $br->service_type ?></td>
                                            <td class="product-table-text"><?php echo $br->veterinarian ?></td>
                                            <td class="product-table-text"><?php echo $br->remarks ?></td>
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