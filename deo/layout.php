<?php

include_once "includes/header.php";

?>


<!-- -----------Main Contents----------- -->
<main class="content pb-4">
    <div class="p-20">
        <div class="d-flex justify-content-between align-items-center flex-wrap">
            <div>
                <p class="mb-0 pb-0 text-dark-light f-16 w-500">Good Morning Bidblok!</p>
                <p class="f-14 text-gray mb-0 pb-0 f-14 ">Here's what's happening with your store today.</p>
            </div>
            <div class="d-flex align-items-center btns-row">
                <div class="input-group me-2">
                    <input type="date" class="form-control border-0  calendar" data-date-format="d M, Y"
                        data-deafult-date="01 Jan 2022 to 31 Jan 2022">
                    <div class="input-group-text bg-primary text-white">
                        <i class="bi bi-calendar3 f-14 text-white"></i>
                    </div>
                </div>
                <a href=""><button class="panel-button">+&nbsp;&nbsp;Add Products</button></a>

            </div>
        </div>

    </div>
    <div class="container-fluid ">
        <div class="row p-0 m-0 ">
            <div class="col-lg-3 col-md-6 col-sm-10 mx-auto">
                <div class="panel-card-start mt-2">
                    <p class="f-22 mb-0 pb-0 w-500">$255.9K</p>
                    <p class="f-14 w-400 m-0 p-0 my-3">TOTAL MEMBERS</p>
                    <div class="d-flex justify-content-between align-items-end">
                        <a href="" class=" f-14 detail-btn">View All</a>
                    </div>

                    <i class="bi bi-people-fill card-icon"></i>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-10 mx-auto">
                <div class="panel-card-start mt-2 panel-card2">
                    <p class="f-22 mb-0 pb-0 w-500">$255.9K</p>
                    <p class="f-14 w-400 m-0 p-0 my-3">TOTAL WINNERS</p>
                    <div class="d-flex justify-content-between align-items-end">
                        <a href="" class=" f-14 detail-btn">View All</a>
                    </div>

                    <i class="bi bi-people-fill card-icon"></i>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-10 mx-auto">
                <div class="panel-card-start mt-2 panel-card3">
                    <p class="f-22 mb-0 pb-0 w-500">$255.9K</p>
                    <p class="f-14 w-400 m-0 p-0 my-3">PRODUCT SHIPED</p>
                    <div class="d-flex justify-content-between align-items-end">
                        <a href="" class=" f-14 detail-btn">View All</a>
                    </div>

                    <i class="bi bi-people-fill card-icon"></i>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-10 mx-auto">
                <div class="panel-card-start mt-2 panel-card4">
                    <p class="f-22 mb-0 pb-0 w-500">$255.9K</p>
                    <p class="f-14 w-400 m-0 p-0 my-3">TOTAL INCOME</p>
                    <div class="d-flex justify-content-between align-items-end">
                        <a href="" class=" f-14 detail-btn">View All</a>
                    </div>

                    <i class="bi bi-people-fill card-icon"></i>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="total-card total-card2">
                    <div class="d-flex justify-content-between align-items-center">
                             <div>
                                <i class="bi bi-app-indicator"></i>
                             </div>
                             <div>
                                <h3>Total Bids</h3>
                                <h1>10</h1>
                             </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="total-card total-card1">
                    <div class="d-flex justify-content-between align-items-center">
                             <div>
                                <i class="bi bi-trophy"></i>
                             </div>
                             <div>
                                <h3>Total Winners</h3>
                                <h1>10</h1>
                             </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="total-card total-card3">
                    <div class="d-flex justify-content-between align-items-center">
                             <div>
                                <i class="bi bi-hourglass-split"></i>
                             </div>
                             <div>
                                <h3>Pending</h3>
                                <h1>10</h1>
                             </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="total-card total-card4">
                    <div class="d-flex justify-content-between align-items-center">
                             <div>
                                <i class="bi bi-truck"></i>
                             </div>
                             <div>
                                <h3>Shipped</h3>
                                <h1>10</h1>
                             </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row m-0 p-0">
            <div class="col-lg-6 mt-4 ">
                <div class="panel-card">
                    <div class="d-flex justify-content-between chats-cards">
                        <p class="f-14 w-400 ">Complete Cvents Trends <i class="bi bi-info-circle"></i></p>
                        <p class="f-14 w-300">15 Aug - 15 Sep</p>
                    </div>
                    <canvas id="myChart" style="width:100%;max-width:600px"></canvas>

                </div>
            </div>
            <div class="col-lg-6 mt-4">
                <div class="panel-card">
                    <div class="d-flex justify-content-between chats-cards">
                        <p class="f-14 w-400 ">Complete Cvents Trends <i class="bi bi-info-circle"></i></p>
                        <p class="f-14 w-300">15 Aug - 15 Sep</p>
                    </div>
                    <canvas id="myChart2" style="width:100%;max-width:600px"></canvas>

                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row m-0 -0">
            <div class="col-lg-12 mt-4">
                <div class="panel-card">
                    <div class="">
                        <p class="f-20 w-400 my-3">Products Table</p>
                       <div class="seprator"></div>
                    </div>
                    <div class="products-table-wrapper">
                        <table id="dashboard-table" class="products-table" style="width:100%">
                            <thead>
                                <tr>
                                    <th class="products-table-head">S.No</th>
                                    <th class="products-table-head">Title</th>
                                    <th class="products-table-head">Status</th>
                                    <th class="products-table-head">Biding Start</th>
                                    <th class="products-table-head">Biding End</th>
                                    <th class="products-table-head">Sold Price</th>
                                    <th class="products-table-head">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="product-table-text">1</td>
                                    <td class="product-table-text">Lorem ipsum dolor sit amet.</td>
                                    <td class="status-green">Sold</td>
                                    <td class="product-table-text">10-5-2022</td>
                                    <td class="product-table-text">20-5-2022</td>
                                    <td class="product-table-text">$ 50000 </td>
                                    <td class="icons">
                                        <div class="d-flex">
                                            <a href="view-product-detail.html " class="p-0"><i
                                                    class="bi bi-eye-fill"></i></a>
                                            <a href="edit-product-detail.html"> <i
                                                    class="bi bi-pencil-square"></i></a>
                                            <button data-bs-toggle="modal" data-bs-target="#delete-product"><i
                                                    class="bi bi-trash3-fill"></i></button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="product-table-text">1</td>
                                    <td class="product-table-text">Lorem ipsum dolor sit amet.</td>
                                    <td class="status-pause">Pause</td>
                                    <td class="product-table-text">10-5-2022</td>
                                    <td class="product-table-text">20-5-2022</td>
                                    <td class="product-table-text">$ 50000 </td>
                                    <td class="icons">
                                        <div class="d-flex">
                                            <a href="view-product-detail.html " class="p-0"><i
                                                    class="bi bi-eye-fill"></i></a>
                                            <a href="edit-product-detail.html"> <i
                                                    class="bi bi-pencil-square"></i></a>
                                            <button data-bs-toggle="modal" data-bs-target="#delete-product"><i
                                                    class="bi bi-trash3-fill"></i></button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row m-0 p-0">
            <div class="col-lg-12 mt-4 ">
                <div class="panel-card">
                    <form action="">
                        <div class="row">
                            <div class="col-lg-12">
                                <p class="f-20 w-400 my-2">Information Form</p>
                               <div class="seprator mb-3"></div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label f-14 w-500">Name</label>
                                    <input type="Name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="exampleInputEmail2" class="form-label f-14 w-500">Email</label>
                                    <input type="email" class="form-control" id="exampleInputEmail2" aria-describedby="emailHelp">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="exampleInputEmail3" class="form-label f-14 w-500">Password</label>
                                    <input type="password" class="form-control" id="exampleInputEmail3" aria-describedby="emailHelp">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <label for="exampleInputEmail4" class="form-label f-14 w-500">Select </label>
                                <select class="form-select mb-3" aria-label="select example" id="exampleInputEmail4">
                                    <option selected>Open this select menu</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                  </select>
                            </div>
                            <div class="col-lg-12">
                               <div class="d-flex flex-column mb-3">
                                <label for="exampleInputEmail5" class="form-label f-14 w-500">Message </label>
                                <textarea name="" width="100%" rows="3"  id="exampleInputEmail5" class="text-area"></textarea>
                               </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="d-flex align-items-center justify-content-between ">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                        <label class="form-check-label" for="exampleCheck1 f-14 w-500">Check me out</label>
                                      </div>
                                      <button type="submit" class="panel-button2">Submit</button>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>

</main>

<?php

include_once "includes/footer.php";

?>