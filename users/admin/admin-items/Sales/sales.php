
<?php session_start();?>
<?php require_once '/var/www/html/libraries/config/config.php';?>
<?php include PARENT .'/users/admin/includes/auth-validate.php';?>


<?php
    
    $order_by	= filter_input(INPUT_GET, 'order_by');
    $order_dir	= filter_input(INPUT_GET, 'order_dir');
    $search_str	= filter_input(INPUT_GET, 'search_str');
    $sales_month	= filter_input(INPUT_GET, 'find_sales_for_month');

    $pagelimit = 15;
    $page = filter_input(INPUT_GET, 'page');
    if (!$page) {
        $page = 1;
    }
    if (!$order_by) {
        $order_by = 'order_id';
    }
    if (!$order_dir) {
        $order_dir = 'Desc';
    }
    if (!$sales_month) {
            $sales_month = date('m');
    }
    $db = getDbInstance();
    if ($search_str) {
        $db->where('order_id', '%' . $search_str . '%', 'like');

    }

    if ($order_dir) {
        $db->orderBy($order_by, $order_dir);
    }
    $select = array('order_id', 'cust_name','o.cust_id', 'full_name','ordered_at', 'artisen_assigned','order_price', 'delivery_date');
    $db->pageLimit = $pagelimit;
    $db->where('MONTH(finishing_date)',$sales_month);
    $db->where('YEAR(finishing_date)', date('Y'));
    $db->join("staff_accounts u", "o.artisen_assigned=u.id", "LEFT");
    $db->join("customer c", "o.cust_id=c.cust_id", "LEFT");
    $rows = $db->arraybuilder()->paginate('completed_orders o', $page, $select);
    $total= $db->where('MONTH(finishing_date)',$sales_month)->where('YEAR(finishing_date)', date('Y'))->getValue('completed_orders','SUM(order_price)');
    $total_pages = $db->totalPages;
    
?>

<?php include PARENT .'/includes/header.php';?>
<?php include PARENT .'/users/admin/includes/style-scripts.php';?>

<body>
<div class="wrapper">
    <?php include PARENT. '/users/admin/includes/navbar.php';?>
    <div id="main_content" class="container-fluid pr-0">
        <div class="header sticky-top d-flex align-items-baseline justify-content-between ">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb p-0 m-0 bg-white">
                    <li class="breadcrumb-item"><a href="/users/admin">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Sales</li>
                </ol>
            </nav>
            <a href="#" data-toggle="modal" data-target="#generatestatement" class="btn  btn-success"> Generate Statement</a>

        </div>  
        
        <div class="modal fade" id="generatestatement" tabindex="-1" role="dialog" aria-labelledby="generate-statement" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <p class="modal-title" id="exampleModalLabel">Generating Statement</p>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="generate-statement.php" method="POST">
                <div class="modal-body">
                    <p class="lead">Please choose the dates for generating the statement.</p>
                    <div class="form-group">
                        <label for="start-date">Start </label>
                        <input type="date" name="start_date" class="form-control" id="start-date">
                    </div>
                    <div class="form-group">
                        <label for="end-date">End </label>
                        <input type="date" name="end_date" class="form-control" id="end-date">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Generate</button>
                </div>
            </form>
            </div>
        </div>
        </div>


        <div class="info mx-1 mt-2">
            <div class="container-fluid">
                <div class="row ">
                    <div class="card-body">
                        <!-- SEARCHING -->
                        <div class="card-header mx-auto d-flex rounded justify-content-center text-center border mt-1">
                                <form class="form form-inline" action="">
                                        <label class="mx-1" for="input_search">Search</label>
                                        <input placeholder="Order ID" type="text" class="form-control" id="input_search" name="search_str" value="<?php echo htmlspecialchars($search_str, ENT_QUOTES, 'UTF-8'); ?>">

                                        <label class="mx-1 " for="input_order">Order By</label>
                                        <select name="order_dir" class="form-control" id="input_order">
                                        <option value="Asc" <?php
                                        if ($order_dir == 'Asc') {
                                            echo 'selected';
                                        }
                                        ?> >Asc</option>
                                                        <option value="Desc" <?php
                                        if ($order_dir == 'Desc') {
                                            echo 'selected';
                                        }
                                        ?>>Desc</option>
                                        </select>

                                         <input type="submit" value="Go" class="btn btn-primary mt-1">
                                </form>
                        </div>

                    </div>

                    <div class="card-body">
                        <!-- SEARCHING -->
                        <div class="card-header mx-auto d-flex rounded justify-content-center text-center border mt-1">
                                <form class="form form-inline" action="">

                                        <label class="mx-1 " for="input_order">Sales for the month of</label>
                                        <select name="find_sales_for_month" class="form-control px-3 mt-1">
                                            <option <?php if($sales_month =='1'){echo 'selected';} ?> value="1">Jan</option>
                                            <option <?php if($sales_month =='2'){echo 'selected';} ?> value="2">Feb</option>
                                            <option <?php if($sales_month =='3'){echo 'selected';} ?> value="3">Mar</option>
                                            <option <?php if($sales_month =='4'){echo 'selected';} ?> value="4">Apr</option>
                                            <option <?php if($sales_month =='5'){echo 'selected';} ?> value="5">May</option>
                                            <option <?php if($sales_month =='6'){echo 'selected';} ?> value="6">Jun</option>
                                            <option <?php if($sales_month =='7'){echo 'selected';} ?> value="7">Jul</option>
                                            <option <?php if($sales_month =='8'){echo 'selected';} ?> value="8">Aug</option>
                                            <option <?php if($sales_month =='9'){echo 'selected';} ?> value="9">Sep</option>
                                            <option <?php if($sales_month =='10'){echo 'selected';} ?> value="10">Oct</option>
                                            <option <?php if($sales_month =='11'){echo 'selected';} ?> value="11">Nov</option>
                                            <option <?php if($sales_month =='12'){echo 'selected';} ?> value="12">Dec</option>
                                        </select>
                                        <input type="number"  value="<?php echo date('Y'); ?>" class="form-control  mt-1 mx-1" disabled>
                                         <input type="submit"  value="Find" class="btn btn-primary mt-1">
                                </form>
                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <?php include PARENT.'/includes/flash_messages.php'; ?>
                    </div>
                    <div class="col-md-12">
                    <div class="table-responsive  px-2 ">
                        <table class="table bg-white table-bordered  table-sm  ">
                            <thead class="thead-light">
                            <tr >
                                    <th >#</th>
                                    <th >Order ID</th>
                                    <th >Customer</th>
                                    <th >Ordered On</th>
                                    <th >Delivery</th>
                                    <th >Artisen</th>
                                    <th >Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $counter =1;?>
                            <?php foreach ($rows as $row): ?>
                                <tr>
                                <td>
                                    <?php echo $counter; ?></td>
                                    <td><?php echo htmlspecialchars($row['order_id']); ?></td>
                                    <td><?php echo htmlspecialchars($row['cust_name']); ?></td>
                                    <td><?php echo htmlspecialchars($row['ordered_at']); ?></td>
                                    <td ><?php echo htmlspecialchars($row['delivery_date']); ?> </td>
                                     <td ><?php echo htmlspecialchars($row['full_name']); ?> </td>
                                    <td ><?php echo htmlspecialchars($row['order_price']); ?> </td>
                                </tr>
                                <?php $counter = $counter+1;?>

                                <?php endforeach; ?>
                            </tbody>
                            <thead class="thead-light">
                            <tr >
                                    <th >Revenue</th>
                                    <th ></th>
                                    <th ></th>
                                    <th ></th>
                                    <th ></th>
                                    <th ></th>
                                    <th ><?php echo $total; ?>/=</th>
                                </tr>
                            </thead>

                        </table>
                    </div>
                    </div>
                </div>
                
            </div>
        

        </div>
    </div>
</div>

</body>

<?php include PARENT .'/includes/scripts.php';?>
