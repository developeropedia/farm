<?php

include_once "includes/header.php";

if (isset($_GET['id'])) {
    delete("disposal_records", "id", $_GET['id']);
}

$query = "SELECT *, br.id AS brId, s.id AS sId, s.name AS sName, cn.name AS cnName FROM disposal_records br";
$query .= " INNER JOIN stations s ON s.id = br.station_id";
$query .= " INNER JOIN cattle c ON c.id = br.animal_id INNER JOIN countries cn ON cn.id = s.country_id";
$disposal_records = findAllByQuery($query);

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
                        <p class="f-20 w-400 my-3">Disposal Records</p>
                        <div class="seprator"></div>
                    </div>
                    <div class="products-table-wrapper">
                        <table id="dashboard-table" class="products-table" style="width:100%">
                            <thead>
                                <tr>
                                    <th class="products-table-head">S.No</th>
                                    <th class="products-table-head">Country</th>
                                    <th class="products-table-head">Station</th>
                                    <th class="products-table-head">Tag No.</th>
                                    <th class="products-table-head">Disposal Date</th>
                                    <th class="products-table-head">Disposal Reason</th>
                                    <th class="products-table-head">Comment</th>
                                    <th class="products-table-head">Created at</th>
                                    <th class="products-table-head">Updated at</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($disposal_records)) : ?>
                                    <?php $count = 1;
                                    foreach ($disposal_records as $disposal_record) : ?>
                                        <tr>
                                            <td class="product-table-text"><?php echo $count++ ?></td>
                                            <td class="product-table-text"><?php echo $disposal_record->cnName ?></td>
                                            <td class="product-table-text"><?php echo $disposal_record->sName ?></td>
                                            <td class="product-table-text"><?php echo $disposal_record->tag_num ?></td>
                                            <td class="product-table-text"><?php echo date("d M, Y", strtotime($disposal_record->disposal_date)) ?></td>
                                            <td class="product-table-text"><?php echo $disposal_record->disposal_reason ?></td>
                                            <td class="product-table-text"><?php echo $disposal_record->comments ?></td>
                                            <td class="product-table-text"><?php echo date("d M, Y", strtotime($disposal_record->created_at)) ?></td>
                                            <td class="product-table-text"><?php echo date("d M, Y", strtotime($disposal_record->updated_at)) ?></td>
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