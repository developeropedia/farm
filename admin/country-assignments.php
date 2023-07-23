<?php

include_once "includes/header.php";

if (isset($_GET['id'])) {
    delete("user_country", "id", $_GET['id']);
}

$query = "SELECT *, u.id AS userId, c.id AS countryId, uc.id AS ucId FROM user_country uc INNER JOIN users u ON uc.user_id = u.id INNER JOIN countries c ON uc.country_id = c.id";
$user_countries = findAllByQuery($query);

?>


<!-- -----------Main Contents----------- -->
<main class="content pb-4">
    <div class="p-20">
        <div class="d-flex justify-content-end align-items-center flex-wrap">
            <div class="d-flex align-items-center btns-row">
                <a href="assign-country.php"><button class="panel-button">+&nbsp;&nbsp;Assign New</button></a>
            </div>
        </div>

    </div>

    <div class="container-fluid">
        <div class="row m-0 -0">
            <div class="col-lg-12">
                <div class="panel-card">
                    <div class="">
                        <p class="f-20 w-400 my-3">Country Assignments</p>
                        <div class="seprator"></div>
                    </div>
                    <div class="products-table-wrapper">
                        <table id="dashboard-table" class="products-table" style="width:100%">
                            <thead>
                                <tr>
                                    <th class="products-table-head">S.No</th>
                                    <th class="products-table-head">User Name</th>
                                    <th class="products-table-head">Country Name</th>
                                    <th class="products-table-head">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($user_countries)) : ?>
                                    <?php $count = 1;
                                    foreach ($user_countries as $uc) : ?>
                                        <tr>
                                            <td class="product-table-text"><?php echo $count++ ?></td>
                                            <td class="product-table-text"><?php echo $uc->username ?></td>
                                            <td class="product-table-text"><?php echo $uc->name ?></td>
                                            <td class="icons">
                                                <div class="d-flex">
                                                    <a href="edit-country-assignment.php?id=<?php echo $uc->ucId ?>"> <i class="bi bi-pencil-square"></i></a>
                                                    <a href="?id=<?php echo $uc->ucId ?>"> <i class="bi bi-trash"></i></a>
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