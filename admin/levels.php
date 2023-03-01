<?php

include_once "includes/header.php";

if(isset($_GET['id'])) {
    delete("user_levels", "id", $_GET['id']);
}

$levels = findAllByQuery("SELECT * FROM user_levels");

?>


<!-- -----------Main Contents----------- -->
<main class="content pb-4">
    <div class="p-20">
        <div class="d-flex justify-content-end align-items-center flex-wrap">
            <div class="d-flex align-items-center btns-row">
                <a href="add-level.php"><button class="panel-button">+&nbsp;&nbsp;Add Level</button></a>
            </div>
        </div>

    </div>

    <div class="container-fluid">
        <div class="row m-0 -0">
            <div class="col-lg-12">
                <div class="panel-card">
                    <div class="">
                        <p class="f-20 w-400 my-3">Levels</p>
                       <div class="seprator"></div>
                    </div>
                    <div class="products-table-wrapper">
                        <table id="dashboard-table" class="products-table" style="width:100%">
                            <thead>
                                <tr>
                                    <th class="products-table-head">S.No</th>
                                    <th class="products-table-head">Level</th>
                                    <th class="products-table-head">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($levels)): ?>
                                <?php $count = 1; foreach ($levels as $level): ?>
                                    <tr>
                                        <td class="product-table-text"><?php echo $count++ ?></td>
                                        <td class="product-table-text"><?php echo $level->name ?></td>
                                        <td class="icons">
                                            <div class="d-flex jus">
                                                <a href="edit-level.php?id=<?php echo $level->id ?>"> <i
                                                            class="bi bi-pencil-square"></i></a>
                                                <a href="?id=<?php echo $level->id ?>"> <i
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