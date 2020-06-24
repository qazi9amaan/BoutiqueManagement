<?php session_start(); ?>
<?php require_once '/var/www/html/libraries/config/config.php'; ?>
<?php include PARENT.'/includes/header.php'; ?>

<?php
    $db = getDbInstance();
    $db1 = getDbInstance();

    $artist_id=$_GET['id'];
    $db->where('id', $artist_id);
    $artist=$db->getOne('staff_accounts');
    $numOrders=$db1->where('artisen_assigned', $artist_id)->getValue('completed_orders','count(*)');
    $current_work =$db1->where('artisen_assigned', $artist_id)->getOne('orders');


?>


<body>
<style>
    #customer-details-header{
        padding-top:3rem;
        padding-bottom:3rem;

    }
    .user .fa-user-circle-o{
        font-size:95px;
    }
    #user-name{
        padding-top:9px;
        font-size:25px;
    }
</style>
<?php include PARENT.'/includes/navbar.php'; ?>

    <!-- TABS -->
    <div id="customer-details-header" class="container-fluid mt-4">
    
    <div class="row">
        <div class="col-md-8">
        <?php if($current_work) { ?>
        <div class="card bg-success mb-2">
            <div class="card-body text-dark">
                <p >Artisen currently working on </p>
                <div class="table-responsive mt-1">
                <table class="table text-dark">
                <tbody>
                    <tr class="bg-white text-dark">
                    <th scope="col">#</th>
                    <th scope="col">Placed</th>
                    <th scope="col">Delivery</th>
                    <th scope="col">Price</th>
                    <th scope="col">Advance</th>
                    <th scope="col">Pending</th>
                    </tr>
                    <tr>
                    <th scope="row"><?php echo htmlspecialchars($current_work['order_id']); ?></th>
                    <td ><?php echo date('j F Y', strtotime($current_work['ordered_at'])); ?> </td>
                    <td > <?php echo date('j F Y', strtotime($current_work['delivery_date'])); ?></td>
                    <td ><?php echo htmlspecialchars($current_work['order_price']); ?> </td>
                    <td ><?php echo htmlspecialchars($current_work['advance_money']); ?> </td>
                    <td ><?php echo htmlspecialchars((float)$current_work['order_price']-(float)$current_work['advance_money']); ?> </td>
                    </tr>
                    </tbody>
                </table >
            </div>
        </div>

        </div>
        <?php } ?>

        <?php include PARENT .'/includes/flash_messages.php'; ?>
        <div class="card p-4">
            <ul class="nav nav-tabs sticky-top">
                <li class="nav-item">
                    <a class="nav-link active" href="#tab1" data-toggle="tab">Currently</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#tab2" data-toggle="tab">Orders in <?php echo date("F", strtotime("first day of previous month")) ?> </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#tab3" data-toggle="tab">All Orders</a>
                </li>
            
                
            </ul>
            
            <div class="tab-content px-1 pt-3">
            <div class="tab-pane active" id="tab1">
                    <form class="mt-2">
                        <div class="d-flex align-items-baseline pb-2">
                        <input type="text" hidden name="id" value="<?php echo $_GET['id']; ?>">
                        <input type="search" placeholder ="Search using an order id." value="<?php echo @$_GET['search_str_current']; ?>" name="search_str_current" class="form-control mr-3" id="">
                        <button class="btn btn-success"><i class="fa fa-search"></i>&nbsp; Search</button>
                        </div>
                    </form>
                    <?php include 'current_month_orders.php' ?>
                </div>
                <div class="tab-pane " id="tab2">
                    <form class="mt-2">
                        <div class="d-flex align-items-baseline pb-2">
                        <input type="text" hidden name="id" value="<?php echo $_GET['id']; ?>">
                        <input type="search" placeholder ="Search using an order id." value="<?php echo @$_GET['search_str']; ?>" name="search_str" class="form-control mr-3" id="">
                        <button class="btn btn-success"><i class="fa fa-search"></i>&nbsp; Search</button>
                        </div>
                    </form>
                    <?php include 'orders_previous_month.php' ?>
                </div>

                <div class="tab-pane " id="tab3">
                    <form class="mt-2">
                        <div class="d-flex align-items-baseline pb-2">
                        <input type="text" hidden name="id" value="<?php echo $_GET['id']; ?>">
                        <input type="search" placeholder ="Search in all orders." value="<?php echo @$_GET['search_str_all']; ?>" name="search_str_all" class="form-control mr-3" id="">
                        <button class="btn btn-success"><i class="fa fa-search"></i>&nbsp; Search</button>
                        </div>
                    </form>
                    <?php include 'all_orders.php' ?>
                </div>

                <div class="tab-pane" id="tab4">3. Put some more content in your pane here.</div>
            </div>
            
        </div>
        </div>
        <div class="col-md-4">

            <a href="index.php" class="btn btn-success btn-block"><i class="fa fa-plus-circle"></i>&nbsp;Assign an order to <?php echo $artist['full_name']; ?></a>

            <div class="card user bg-primary text-white my-3">
                <div class="card-body text-center">
                    <div class="row">
                        <div class="col-12 mt-4">
                            <i class="fa fa-user-circle-o"></i>
                        </div>
                        <div class="col-12">
                            <p id="user-name" class="mb-0 text-capitalize"><?php echo $artist['full_name']; ?></p>
                            <p id="user-address" class="mb-0"><i class="fa fa-address-card"></i> <?php echo $artist['address']; ?></p>
                            <p id="user-number" class="mb-1"> <i class="fa fa-phone"></i> <?php echo $artist['phone_number']; ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between py-2">
                        <span><i class="fa fa-handshake-o">&nbsp;</i>Joined splash on</span>
                        <span><?php echo date('j F Y', strtotime($artist['created_at'])); ?></span>
                    </div>
                    <div class="d-flex justify-content-between py-2">
                        <span><i class="fa fa-address-card-o">&nbsp;</i>Adhaar Number </span>
                        <span><?php echo $artist['adhaar_card']; ?></span>
                    </div>
                    <div class="d-flex justify-content-between py-2">
                        <span><i class="fa fa-money">&nbsp;</i> Salary</span>
                        <span><?php echo $artist['staff_salary']; ?></span>
                    </div>

                    <div class="d-flex justify-content-between py-2">
                        <span><i class="fa fa-shopping-bag">&nbsp;</i> Completed orders</span>
                        <span><?php echo $numOrders; ?></span>
                    </div>
                    <div class="d-flex justify-content-between py-2">
                        <span><i class="fa fa-money">&nbsp;</i> Salary earned</span>
                        <span><?php echo (int)$numOrders * (int)$artist['staff_salary']?></span>
                    </div>
                </div>
            </div>
            <div class="card mt-3">
                <div class="card-body">
                    <div class="text-center">
                        GENERATE MONTHLY STATEMENT
                    </div>
                    <form class="mt-2 px-5" method="POST" action="statement.php">
                        <div class="form-row">                        
                        <input type="text" hidden name="salary" value="<?php echo $artist['staff_salary'];; ?>">
                        <input type="text" hidden name="full_name" value="<?php echo $artist['full_name']; ?>">
                        <input type="text" hidden name="id" value="<?php echo @$_GET['id'];?>">
                              <div class="col-md-12 mt-2">
                                <select name="month" class="form-control"  name="" id="">
                                        <option value="1">January</option>
                                        <option value="2">February</option>
                                        <option value="3">March</option>
                                        <option value="4">April</option>
                                        <option value="5">May</option>
                                        <option value="6">June</option>
                                        <option value="7">July</option>
                                        <option value="8">August</option>
                                        <option value="9">September</option>
                                        <option value="10">October</option>
                                        <option value="11">November</option>
                                        <option value="12">December</option>
                                    </select>
                              </div>
                            <div class="col-md-12  mt-2">
                            <input name="year" type="number" placeholder="Year" value="<?php echo date('Y'); ?>" class="form-control rounded-right" required>
                            </div>  
                            <div class="col-md-12 text-center mt-2">
                                <button class="btn btn-success">Generate</button>
                            </div>                          
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>    
    </div>
</body>
<?php include PARENT.'/includes/scripts.php' ?>
