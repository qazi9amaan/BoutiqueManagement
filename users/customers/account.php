<?php session_start(); ?>
<?php require_once '/var/www/html/libraries/config/config.php'; ?>
<?php include PARENT.'/includes/header.php'; ?>

<?php
    $db = getDbInstance();
    $cust_id=$_GET['id'];
    $db->where('cust_id', $cust_id);
    $customer=$db->getOne('customer');
    
    $numNewOrders =$db->where('cust_id',$cust_id)->getValue('orders','count(*)');

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
        <?php include PARENT .'/includes/flash_messages.php'; ?>
        <div class="card p-4">
            <ul class="nav nav-tabs sticky-top">
                <li class="nav-item">
                    <a class="nav-link active" href="#tab1" data-toggle="tab">New </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#tab2" data-toggle="tab">Orders </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#tab3" data-toggle="tab">Payments</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="#tab4" data-toggle="tab">Visuals</a>
                </li>
                
            </ul>
            <div class="tab-content px-1 pt-3">
                <div class="tab-pane active" id="tab1">
                    <form class="mt-2">
                        <div class="d-flex align-items-baseline pb-2">
                        <input type="text" hidden name="id" value="<?php echo $_GET['id']; ?>">
                        <input type="search" placeholder ="Search using an order id." value="<?php echo @$_GET['search_str']; ?>" name="search_str" class="form-control mr-3" id="">
                        <button class="btn btn-success"><i class="fa fa-search"></i>&nbsp; Search</button>
                        </div>
                    </form>
                    <?php include 'new_orders.php' ?>
                </div>

                <div class="tab-pane card" id="tab2">
                    The whole idea is to make the Bootstrap customization process easier, and allow you to visualize changes along the way. 
                    For most users it's designed to be point-and-click, while advanced users can delve into the SASS as desired. It's a 4-step process.
                </div>
                <div class="tab-pane" id="tab3">3. Put some more content in your pane here.</div>
            </div>
        </div>
        </div>
        <div class="col-md-4">

            <a class="btn btn-success btn-block" href="/orders/new_order.php?s=registered&id=<?php echo $_GET['id']; ?>"><i class="fa fa-shopping-bag"></i>&nbsp;Create a new order</a>

            <div class="card user bg-primary text-white my-3">
                <div class="card-body text-center">
                    <div class="row">
                        <div class="col-12 mt-4">
                            <i class="fa fa-user-circle-o"></i>
                        </div>
                        <div class="col-12">
                            <p id="user-name" class="mb-0 text-capitalize"><?php echo $customer['cust_name']; ?></p>
                            <p id="user-address" class="mb-0"><i class="fa fa-address-card"></i> <?php echo $customer['cust_address']; ?></p>
                            <p id="user-number" class="mb-1"> <i class="fa fa-phone"></i> <?php echo $customer['cust_phone_number']; ?></p>
                            <a href="#" class="btn btn-outline-light btn-sm"><i class="fa fa-pencil"></i> Edit</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between py-2">
                        <span><i class="fa fa-handshake-o">&nbsp;</i>Joined splash on</span>
                        <span><?php echo date('j F Y', strtotime($customer['created_at'])); ?></span>
                    </div>
                    <div class="d-flex justify-content-between py-2">
                        <span><i class="fa fa-shopping-bag">&nbsp;</i> Delivered orders</span>
                        <span>5</span>
                    </div>
                    <div class="d-flex justify-content-between py-2">
                        <span><i class="fa fa-shopping-cart">&nbsp;</i>New Orders</span>
                        <span><?php echo $numNewOrders ?></span>
                    </div>
                    <div class="d-flex justify-content-between py-2">
                        <span><i class="fa fa-money">&nbsp;</i> Amount spend</span>
                        <span>1900</span>
                    </div>
                </div>
            </div>
        </div>
    </div>    
    </div>
</body>
<?php include PARENT.'/includes/scripts.php' ?>
