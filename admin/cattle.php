<?php

include_once "includes/header.php";

if (isset($_GET['id'])) {
    delete("cattle", "id", $_GET['id']);
}

$cattle = findAllByQuery("SELECT cattle.*, s.id AS sId, s.name AS sName, cn.name AS cnName FROM cattle INNER JOIN stations s ON s.id = station_id INNER JOIN countries cn ON cn.id = s.country_id ORDER BY created_at DESC");

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
                        <p class="f-20 w-400 my-3">Cattle</p>
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
                                    <th class="products-table-head">Type</th>
                                    <th class="products-table-head">Breed</th>
                                    <th class="products-table-head">DOB</th>
                                    <th class="products-table-head">Date of entry</th>
                                    <th class="products-table-head">Remarks</th>
                                    <th class="products-table-head">Created at</th>
                                    <th class="products-table-head">Updated at</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($cattle)) : ?>
                                    <?php $count = 1;
                                    foreach ($cattle as $c) : ?>
                                        <tr>
                                            <td class="product-table-text"><?php echo $count++ ?></td>
                                            <td class="product-table-text"><?php echo $c->cnName ?></td>
                                            <td class="product-table-text"><?php echo $c->sName ?></td>
                                            <td class="product-table-text"><?php echo $c->tag_num ?></td>
                                            <td class="product-table-text"><?php echo findById("cattle_types", $c->cattle_type_id)->type ?></td>
                                            <td class="product-table-text"><?php echo $c->breed ?></td>
                                            <td class="product-table-text"><?php echo date("d M, Y", strtotime($c->date_of_birth)) ?></td>
                                            <td class="product-table-text"><?php echo date("d M, Y", strtotime($c->date_of_entry)) ?></td>
                                            <td class="product-table-text"><?php echo $c->remarks ?></td>
                                            <td class="product-table-text"><?php echo date("d M, Y", strtotime($c->created_at)) ?></td>
                                            <td class="product-table-text"><?php echo date("d M, Y", strtotime($c->updated_at)) ?></td>
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