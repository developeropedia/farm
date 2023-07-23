<?php

include_once "includes/header.php";

if (isset($_GET['id'])) {
    delete("user_station", "id", $_GET['id']);
}

$query = "SELECT *, u.id AS userId, s.id AS stationId, us.id AS usId FROM user_station us INNER JOIN users u ON us.user_id = u.id INNER JOIN stations s ON us.station_id = s.id";
$user_stations = findAllByQuery($query);

?>


<!-- -----------Main Contents----------- -->
<main class="content pb-4">
    <div class="p-20">
        <div class="d-flex justify-content-end align-items-center flex-wrap">
            <div class="d-flex align-items-center btns-row">
                <a href="assign-station.php"><button class="panel-button">+&nbsp;&nbsp;Assign New</button></a>
            </div>
        </div>

    </div>

    <div class="container-fluid">
        <div class="row m-0 -0">
            <div class="col-lg-12">
                <div class="panel-card">
                    <div class="">
                        <p class="f-20 w-400 my-3">Station Assignments</p>
                        <div class="seprator"></div>
                    </div>
                    <div class="products-table-wrapper">
                        <table id="dashboard-table" class="products-table" style="width:100%">
                            <thead>
                                <tr>
                                    <th class="products-table-head">S.No</th>
                                    <th class="products-table-head">User Name</th>
                                    <th class="products-table-head">Station Name</th>
                                    <th class="products-table-head">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($user_stations)) : ?>
                                    <?php $count = 1;
                                    foreach ($user_stations as $us) : ?>
                                        <tr>
                                            <td class="product-table-text"><?php echo $count++ ?></td>
                                            <td class="product-table-text"><?php echo $us->username ?></td>
                                            <td class="product-table-text"><?php echo $us->name ?></td>
                                            <td class="icons">
                                                <div class="d-flex">
                                                    <a href="edit-station-assignment.php?id=<?php echo $us->usId ?>"> <i class="bi bi-pencil-square"></i></a>
                                                    <a href="?id=<?php echo $us->usId ?>"> <i class="bi bi-trash"></i></a>
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