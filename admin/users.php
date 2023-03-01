<?php

include_once "includes/header.php";

if(isset($_GET['id'])) {
    delete("users", "id", $_GET['id']);
}

$current_user = findById("users", $_SESSION['user']);

$users = findAllByQuery("SELECT * FROM users WHERE id != {$_SESSION['user']}");

?>


<!-- -----------Main Contents----------- -->
<main class="content pb-4">
    <div class="p-20">
        <div class="d-flex justify-content-end align-items-center flex-wrap">
            <div class="d-flex align-items-center btns-row">
                <a href="add-user.php"><button class="panel-button">+&nbsp;&nbsp;Add User</button></a>
            </div>
        </div>

    </div>

    <div class="container-fluid">
        <div class="row m-0 -0">
            <div class="col-lg-12">
                <div class="panel-card">
                    <div class="">
                        <p class="f-20 w-400 my-3">Users</p>
                       <div class="seprator"></div>
                    </div>
                    <div class="products-table-wrapper">
                        <table id="dashboard-table" class="products-table" style="width:100%">
                            <thead>
                                <tr>
                                    <th class="products-table-head">S.No</th>
                                    <th class="products-table-head">Username</th>
                                    <th class="products-table-head">Level</th>
                                    <th class="products-table-head">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($users)): ?>
                                <?php $count = 1; foreach ($users as $user): ?>
                                    <tr>
                                        <td class="product-table-text"><?php echo $count++ ?></td>
                                        <td class="product-table-text"><?php echo $user->username ?></td>
                                        <td class="product-table-text"><?php echo findByQuery("SELECT * FROM user_levels WHERE id = {$user->level}")->name ?></td>
                                        <td class="icons">
                                            <div class="d-flex">
                                                <a href="edit-user.php?id=<?php echo $user->id ?>"> <i
                                                            class="bi bi-pencil-square"></i></a>
                                                <a href="?id=<?php echo $user->id ?>"> <i
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