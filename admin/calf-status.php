<?php

include_once "includes/header.php";

if (isset($_GET['id'])) {
    delete("calf_status_record", "id", $_GET['id']);
}

$query = "SELECT *, s.id AS sId, s.name AS sName, cn.name AS cnName FROM calf_status_record br";
$query .= " INNER JOIN stations s ON s.id = br.station_id INNER JOIN countries cn ON cn.id = s.country_id";
$calf_status_records = findAllByQuery($query);

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
                        <p class="f-20 w-400 my-3">Calf Status Record</p>
                        <div class="seprator"></div>
                    </div>
                    <div class="products-table-wrapper">
                        <table id="dashboard-table" class="products-table" style="width:100%">
                            <thead>
                                <tr>
                                    <th class="products-table-head">S.No</th>
                                    <th class="products-table-head">Country</th>
                                    <th class="products-table-head">Station</th>
                                    <th class="products-table-head">Calf Name</th>
                                    <th class="products-table-head">Birth Date</th>
                                    <th class="products-table-head">Gender</th>
                                    <th class="products-table-head">Weight</th>
                                    <th class="products-table-head">Health Condition</th>
                                    <th class="products-table-head">Remarks</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($calf_status_records)) : ?>
                                    <?php $count = 1;
                                    foreach ($calf_status_records as $br) : ?>
                                        <tr>
                                            <td class="product-table-text"><?php echo $count++ ?></td>
                                            <td class="product-table-text"><?php echo $br->cnName ?></td>
                                            <td class="product-table-text"><?php echo $br->sName ?></td>
                                            <td class="product-table-text"><?php echo $br->calf_name ?></td>
                                            <td class="product-table-text"><?php echo date("d M, Y", strtotime($br->birth_date)) ?></td>
                                            <td class="product-table-text"><?php echo $br->gender ?></td>
                                            <td class="product-table-text"><?php echo $br->weight ?> KG</td>
                                            <td class="product-table-text"><?php echo $br->health_condition ?></td>
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