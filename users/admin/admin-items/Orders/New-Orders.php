<?php session_start();?>
<?php require_once '/var/www/html/libraries/config/config.php';?>

<?php
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
        $order_by = 'o.order_id';
    }
    if (!$order_dir) {
        $order_dir = 'Desc';
    }

    $db = getDbInstance();
    if ($search_str) {
        $db->where('o.order_id', '%' . $search_str . '%', 'like');
        $db->orwhere('c.cust_phone_number', '%' . $search_str . '%', 'like');

    }

    if ($order_dir) {
        $db->orderBy($order_by, $order_dir);
    }
    $select = array('s.full_name','c.cust_name', 'c.cust_phone_number', 'o.order_id', 'o.ordered_at', 'o.order_price',	'o.order_taken_by' 	,'o.advance_money' 	,'o.delivery_date');
    $db->pageLimit = $pagelimit;
    $db->join("customer c", "c.cust_id=o.cust_id", "LEFT");
    $db->join("staff_accounts s", "s.id=o.order_taken_by", "LEFT");
    $rows = $db->arraybuilder()->paginate('orders o', $page, $select);
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
                    <li class="breadcrumb-item active" aria-current="page">New Orders</li>
                </ol>
            </nav>
            <a href="/new_order.php" title="Add a new Specification" class="btn-primary  btn-sm"><i class="fa fa-plus"></i> Place a new Order</a>
        </div>  


        <div class="info mx-1 mt-2">
            <div class="container-fluid">
                <div class="row ">
                    <div class="card-body">
                         <!-- SEARCHING -->
                        <div class=" d-flex pt-3  card-footer bg-primary text-white rounded border justify-content-between align-items-baseline ">
                            <h4 class="text-uppercase  lead">New Orders</h4>
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
                                    <th width="" class="">Taken By</th>
                                    <th width="" class="">price</th>
                                    <th width="" class="">Ordered at</th>
                                    <th width="" class="">Advance</th>
                                    <th width="" class="">Delievery</th>
                                    <th width="" class="">Pending</th>
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
                                    <td><?php echo htmlspecialchars($row['cust_name']); ?></td>
                                    <td><?php echo htmlspecialchars($row['cust_phone_number']); ?></td>
                                    <td ><?php echo htmlspecialchars($row['full_name']); ?> </td>
                                    <td ><?php echo htmlspecialchars($row['order_price']); ?> </td>
                                    <td ><?php echo htmlspecialchars($row['ordered_at']); ?> </td>
                                    <td ><?php echo htmlspecialchars($row['advance_money']); ?> </td>
                                    <td ><?php echo htmlspecialchars($row['delivery_date']); ?> </td>
                                    <td ><?php echo htmlspecialchars((float)$row['order_price']-(float)$row['advance_money']); ?> </td>

                                    <td >
                                        <button  data-toggle="modal" data-target="#edit-customer-<?php echo $row['cust_id']; ?>" class="btn btn-success btn-sm mx-2 mt-md-0 mt-1 "><i class="fa fa-pencil"></i> Change  </button>
                                        <button  data-toggle="modal" data-target="#delete-customer-<?php echo $row['cust_id']; ?>" class="btn btn-danger btn-sm mx-2 ml-md-0 mt-md-0  mt-1"><i class="fa fa-times"></i> Delete</button>
                                        <button  class="btn btn-primary btn-sm mx-2 ml-md-0 mt-md-0  mt-1"><i class="fa fa-user"></i>  Profile</button>

                                    </td>
                                </tr>
                                <div class="modal fade" id="delete-customer-<?php echo $row['cust_id']; ?>" role="dialog">
                                    <div class="modal-dialog">
                                        <form action="/users/admin/admin-items/Customers/delete.php" method="POST">
                                            <!-- Modal content -->
                                            <div class="modal-content">
                                                <div class="modal-header ">
                                                    <a>Confirmination </a>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body mb-0 pb-0">
                                                    <input hidden name="cust_id" value="<?php echo $row['cust_id']; ?>">

                                                    <p class="text-center"> Are you sure you want to delete this customer?<br>
                                                   <i class="fa fa-arrow-circle-o-right"></i>
                                                    Deleting <strong><?php echo htmlspecialchars($row['cust_name']); ?></strong>
                                                    </p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-outline-success" data-dismiss="modal">No</button>
                                                    <button type="submit" class="btn btn-success pull-left">Proceed</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="modal fade" id="edit-customer-<?php echo $row['cust_id']; ?>" role="dialog">
                                    <div class="modal-dialog">
                                        <form action="/users/admin/admin-items/Customers/edit.php" method="POST">
                                            <div class="modal-content">
                                                <div class="modal-header ">
                                                    <a>Edit <?php echo htmlspecialchars($row['cust_name']); ?> </a>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body mb-0 pb-0">
                                                <input type="text" hidden name="cust_id" value="<?php echo htmlspecialchars($row['cust_id']); ?>">
                                                    <?php include PARENT.'/users/admin/forms/customer_form.php'; ?>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-outline-success" data-dismiss="modal">Cancel</button>
                                                    <button type="submit" class="btn btn-success pull-left"><i class="fa fa-pencil"></i> Change</button>
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
