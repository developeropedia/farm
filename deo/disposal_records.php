<?php

include_once "includes/header.php";

if(isset($_GET['id'])) {
    delete("disposal_records", "id", $_GET['id']);
}

$userStation = getUserStation();

$query = "SELECT *, br.id AS brId FROM disposal_records br";
$query .= " INNER JOIN cattle c ON c.id = br.animal_id";
$query .= " WHERE br.station_id = " . $userStation->station_id;
$disposal_records = findAllByQuery($query);

?>


    <!-- -----------Main Contents----------- -->
    <main class="content pb-4">
        <div class="p-20">
            <div class="d-flex justify-content-end align-items-center flex-wrap">
                <div class="d-flex align-items-center btns-row">
                    <a href="add-disposal-record.php"><button class="panel-button">+&nbsp;&nbsp;Add Record</button></a>
                </div>
            </div>

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
                                    <th class="products-table-head">Tag No.</th>
                                    <th class="products-table-head">Disposal Date</th>
                                    <th class="products-table-head">Disposal Reason</th>
                                    <th class="products-table-head">Comment</th>
                                    <th class="products-table-head">Created at</th>
                                    <th class="products-table-head">Updated at</th>
                                    <th class="products-table-head">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php if(!empty($disposal_records)): ?>
                                    <?php $count = 1; foreach ($disposal_records as $disposal_record): ?>
                                        <tr>
                                            <td class="product-table-text"><?php echo $count++ ?></td>
                                            <td class="product-table-text"><?php echo $disposal_record->tag_num ?></td>
                                            <td class="product-table-text"><?php echo date("d M, Y", strtotime($disposal_record->disposal_date)) ?></td>
                                            <td class="product-table-text"><?php echo $disposal_record->disposal_reason ?></td>
                                            <td class="product-table-text"><?php echo $disposal_record->comments ?></td>
                                            <td class="product-table-text"><?php echo date("d M, Y", strtotime($disposal_record->created_at)) ?></td>
                                            <td class="product-table-text"><?php echo date("d M, Y", strtotime($disposal_record->updated_at)) ?></td>
                                            <td class="icons">
                                                <div class="d-flex">
                                                    <a href="edit-disposal-record.php?id=<?php echo $disposal_record->brId ?>"> <i
                                                                class="bi bi-pencil-square"></i></a>
                                                    <a href="?id=<?php echo $disposal_record->brId ?>"> <i
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