<?php session_start();?>
<?php require_once '/var/www/html/libraries/config/config.php';?>

<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') 
    {
        $data_to_db = array_filter($_POST);
        $order_id = $data_to_db['order_id'];
        $db = getDbInstance();
        $last_id = $db->where('order_id',$order_id)->update('completed_orders', $data_to_db);
        if ($last_id)
        {
            $_SESSION['success'] = 'Order completed  successfully!';
            header('Location: delivery-orders.php');
        exit();
        }
        else
        {
            $_SESSION['failure'] =' failed: ' . $db->getLastError();
            header('Location: delivery-orders.php');
            exit();
        }
    }

    require_once PARENT . '/users/admin/lib/Order/Order.php';
    $order = new orders();
    
    $order_by	= filter_input(INPUT_GET, 'order_by');
    $order_dir	= filter_input(INPUT_GET, 'order_dir');
    $search_str	= filter_input(INPUT_GET, 'search_str');
    
    $pagelimit = 15;
    $page = filter_input(INPUT_GET, 'page');
    if (!$page) {
        $page = 1;
    }
    if (!$order_by) {
        $order_by = 'o.delivery_date';
    }
    if (!$order_dir) {
        $order_dir = 'ASC';
    }

    $db = getDbInstance();
    if ($search_str) {
        $db->where('o.order_id', '%' . $search_str . '%', 'like');
        $db->orwhere('c.cust_phone_number', '%' . $search_str . '%', 'like');

    }

    if ($order_dir) {
        $db->orderBy($order_by, $order_dir);
    }
    $select = array('s.full_name','c.cust_name', 'c.cust_id', 'finishing_date', 'payment','c.cust_phone_number', 'o.order_id', 'o.ordered_at', 'o.order_price',	'o.order_taken_by' 	,'o.advance_money' 	,'o.delivery_date');
    $db->pageLimit = $pagelimit;
    $db->where("payment",0);

    $db->join("customer c", "c.cust_id=o.cust_id", "LEFT");
    $db->join("staff_accounts s", "s.id=o.artisen_assigned", "LEFT");
    $rows = $db->arraybuilder()->paginate('completed_orders o', $page, $select);
    $total_pages = $db->totalPages;


    $db2 = getDbInstance();
    $db2->orderBy('account_type');
    $artisens = $db2->arraybuilder()->get('staff_accounts');
?>

<?php include PARENT .'/includes/header.php';?>
<?php include PARENT .'/users/admin/includes/style-scripts.php';?>

<body>
<?php include PARENT .'/includes/navbar.php';?>
<div class="wrapper mt-4 pt-4">
    <div id="" class="container-fluid pr-0">
        


        <div class="info mx-1 mt-2">
            <div class="container-fluid">
                <div class="row ">
                    <div class="card-body">
                         <!-- SEARCHING -->
                        <div class=" d-flex pt-3  card-footer bg-primary text-white rounded border justify-content-between align-items-baseline ">
                            <h4 class="text-uppercase  lead">Ready to be delivered!</h4>
                        </div>
                        <!-- SEARCHING -->
                        <div class="card-header mx-auto d-flex rounded justify-content-center text-center border mt-3">
                                <form class="form form-inline" action="">
                                        <label class="mx-1" for="input_search">Search</label>
                                        <input placeholder="Order id or number" type="text" class="form-control" id="input_search" name="search_str" value="<?php echo htmlspecialchars($search_str, ENT_QUOTES, 'UTF-8'); ?>">

                                        <label class="mx-1 " for="input_order">Order By</label>
                                        <select name="order_by" class="form-control">
                                            <?php
                                        foreach ($order->setOrderingValues() as $opt_value => $opt_name):
                                            ($order_by === $opt_value) ? $selected = 'selected' : $selected = '';
                                            echo ' <option value="' . $opt_value . '" ' . $selected . '>' . $opt_name . '</option>';
                                        endforeach;
                                        ?>
                                        </select>
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
                                    <th width="" class=""> Id</th>
                                    <th width="" class="">Name</th>
                                    <th width="" class="">Number</th>
                                    <th width="" class="">Aristen Assigned</th>
                                    <th width="" class="">Ordered at</th>
                                    <th width="" class="">Completed On</th>
                                    <th width="" class="">Delievery</th>
                                    <th width="" class="">Advance</th>
                                    <th width="" class="">Payment</th>
                                    <th width="" class="">price</th>
                                    <th width="" class="">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($rows as $row): ?>
                            <?php
                                $edit = true;
                                $cust = $row;
                            ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($row['order_id']); ?></td>
                                    <td><a href="/users/customers/account.php?id=<?php echo htmlspecialchars($row['cust_id']); ?>"><?php echo htmlspecialchars($row['cust_name']); ?></a></td>
                                    <td><?php echo htmlspecialchars($row['cust_phone_number']); ?></td>
                                    <td ><?php echo htmlspecialchars($row['full_name']); ?> </td>
                                    <td ><?php echo htmlspecialchars($row['ordered_at']); ?> </td>
                                    <td ><?php echo htmlspecialchars($row['finishing_date']); ?> </td>
                                    <td ><?php echo htmlspecialchars($row['delivery_date']); if($row['delivery_date']<date('Y-m-d')){echo'<span class="mx-2 p-2 badge badge-danger">Expired</span>';}?> </td>
                                    <td ><?php echo htmlspecialchars($row['advance_money']); ?> </td>
                                    <td ><?php echo $row['payment']? $row['payment']:'<span class="mx-2 p-2 badge badge-danger">Pending</span>'  ?> </td>
                                    <td ><?php echo htmlspecialchars($row['order_price']); ?> </td>

                                    <td >
                                    <button  data-toggle="modal" data-target="#complete-delivery-<?php echo $row['order_id']; ?>" class="btn btn-success btn-sm mx-2 mt-md-0 mt-1 "><i class="fa fa-circle-o"></i> Complete  </button>

                                    </td>
                                </tr>

                                <div class="modal fade" id="complete-delivery-<?php echo $row['order_id']; ?>" role="dialog">
                                    <div class="modal-dialog">
                                        <form  method="POST">
                                            <!-- Modal content -->
                                            <div class="modal-content">
                                                <div class="modal-header ">
                                                    <a>Confirmination </a>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body mb-0 pb-0">
                                                    <input hidden name="order_id" value="<?php echo $row['order_id']; ?>">
                                                    
                                                    <p class="text-center"> Are you sure you want to complete this delivery?<br>
                                                   <i class="fa fa-arrow-circle-o-right"></i>
                                                    Completing <strong><?php echo htmlspecialchars($row['order_id']); ?></strong>
                                                    </p>
                                                    <div class=" form-group">
                                                        <label for="amount">Receiving Amount</label>
                                                        <input id="amount" type="text" class="form-control" name="payment"  value="<?php echo htmlspecialchars($row['order_price'])-htmlspecialchars($row['advance_money']);?>" id="">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-outline-success" data-dismiss="modal">No</button>
                                                    <button type="submit" class="btn btn-success pull-left">Proceed</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                            </tbody>
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

