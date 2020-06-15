<?php session_start();?>
<?php require_once '/var/www/html/libraries/config/config.php';?>
<?php include PARENT .'/includes/header.php';?>
<?php include PARENT .'/users/admin/includes/style-scripts.php';?>

<?php
    $db = getDbInstance();
    $numSpecs = $db->getValue ("specifications", "count(*)");
    $numcust = $db->getValue ("customer", "count(*)");
    $numorders =$db->getValue ("orders", "count(*)");
?>
<body>
<div class="wrapper">
    <?php include 'includes/navbar.php';?>
    <div id="main_content" class="container-fluid">
        <div class="header">Welcome <strong> <?php echo $_SESSION['staff_user_name'];?></strong>!  Have a nice day.</div>  
        <div class="container-fluid">
            <div class="row p-2 ">
                <div class="col-12 text-right">
                   <a href="/new_order.php" class="btn btn-primary">Place a new order</a> 
                </div>
            </div>
        </div>
        
        <div class="info mt-0">

            <div class="container-fluid p-0 m-0">
                <div class="row p-2">
                    <div  class="col-lg-4  m-0 p-0 ml-md-2 mb-4">
                        <div  class="card h-100 bg-green-light  ">
                            <div id="chart-sparkline-customers"
                             class="card-body ">
                            </div>
                            <a href="#" class="stretched-link"></a>
                        </div>
                    </div>
                    <div  class="col-lg-4  m-0 p-0 ml-md-2 mb-4">
                        <div  class="card h-100 bg-green-light  ">
                            <div id="chart-sparkline-customers"
                             class="card-body ">
                            </div>
                            <a href="#" class="stretched-link"></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row ">
                <div class="mb-3 col-12">

                <hr>
                </div>
                <!-- SPECIFICATIONS -->
                <div class="col-md-3 mb-3">
                    <div class="card border-light-red  bg-red-light">
                        <div class="card-header border-0 p-3 ">
                        <div class=" panel-item d-flex justify-content-between">
                            <div class=" text-center">
                                <i class="fa fa-list"></i>
                            </div>
                            <div class="text-right">
                                <h2><?php echo $numSpecs;?></h2>
                            <p>Specifications</p>
                            </div>
                        </div>
                        </div>
                        <div class="card-footer  mt-0  ">
                            <a class="d-flex justify-content-between" 
                            href="/users/admin/admin-items/Specs/Specs.php"> 
                            <span>View All specifications</span>
                            <i class="fa fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>

                 <!-- CUSTOMERS -->
                 <div class="col-md-3 mb-3">
                    <div class="card border-primary  bg-green-light">
                        <div class="card-header border-0 p-3 ">
                        <div class=" panel-item d-flex justify-content-between">
                            <div class=" text-center">
                                <i class="fa fa-user-circle-o"></i>
                            </div>
                            <div class="text-right">
                                <h2><?php echo $numcust;?></h2>
                            <p>Customers</p>
                            </div>
                        </div>
                        </div>
                        <div class="card-footer  mt-0  ">
                            <a class="d-flex justify-content-between" 
                            href="/users/admin/admin-items/Customers/Customers.php"> 
                            <span>View All customers</span>
                            <i class="fa fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>

                   <!-- NEW ORDERS -->
                   <div class="col-md-3 mb-3">
                    <div class="card border-light-yellow bg-yellow-light">
                        <div class="card-header border-0 p-3 ">
                        <div class=" panel-item d-flex justify-content-between">
                            <div class=" text-center">
                                <i class="fa fa-shopping-bag"></i>
                            </div>
                            <div class="text-right">
                                <h2><?php echo $numorders;?></h2>
                            <p>New Orders</p>
                            </div>
                        </div>
                        </div>
                        <div class="card-footer  mt-0  ">
                            <a class="d-flex justify-content-between" 
                            href="/users/admin/admin-items/Orders/New-Orders.php"> 
                            <span>View All new orders</span>
                            <i class="fa fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>

</body>
<?php include PARENT .'/includes/scripts.php';?>
