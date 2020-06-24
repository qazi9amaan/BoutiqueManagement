<?php session_start();?>
<?php require_once '/var/www/html/libraries/config/config.php';?>
<?php include PARENT .'/users/admin/includes/auth-validate.php';?>

<?php
    $search_str	= filter_input(INPUT_GET, 'search_str');
    $order_by = 'id';
    $order_dir = 'Desc';
    $db2 = getDbInstance();
    if ($search_str) {
        $db2->where('full_name', '%' . $search_str . '%', 'like');
        $db2->orwhere('phone_number', '%' . $search_str . '%', 'like');
    }
    $db2->orderBy($order_by, $order_dir);
    $artisens = $db2->where('account_type', 'artisen')->arraybuilder()->get('staff_accounts');
?>

<?php 
    $db = getDbInstance();
function getMontlyOutcomes($id,$db) {
    return $db->where('MONTH(finishing_date)', date("m", strtotime("first day of previous month")))->where('artisen_assigned',$id)->getValue('completed_orders','count(*)');
  }
function getPreviousOutcomes($id,$db) {
    return $db->where('finishing_date', date("Y-m-d", time() - 60 * 60 * 24))->where('artisen_assigned',$id)->getValue('completed_orders','count(*)');
  }
function getPresentOutcomes($id,$db) {
    return $db->where('finishing_date', date("Y-m-d"))->where('artisen_assigned',$id)->getValue('completed_orders','count(*)');
  }

function getCurrentStatus($id,$db) {
$stat= $db->where('artisen_assigned',$id)->getValue('orders','count(*)');
if($stat){
    return '<span class="mx-2 badge badge-success">Occupied</span>';
}else{
    return '<span class="mx-2 badge badge-primary">Free</span>';

}
}
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
                    <li class="breadcrumb-item active" aria-current="page">Statistics</li>
                    <li class="breadcrumb-item active" aria-current="page">Artisens</li>

                </ol>
            </nav>
        </div>  


        <div class="info mx-1 mt-2">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                    
                    </div>
                </div>
                <div class="row ">
                    <div class="card-body">
                         <!-- SEARCHING -->
                        <div class=" d-flex pt-3  card-footer bg-primary text-white rounded border justify-content-between align-items-baseline ">
                            <h4 class="text-uppercase  lead">Artisens</h4>
                        </div>
                        <!-- SEARCHING -->
                        <div class="card-header mx-auto d-flex rounded justify-content-center text-center border mt-3">
                                <form class="form form-inline" action="">
                                        <label class="mx-1" for="input_search">Search</label>
                                        <input type="text" placeholder="Phone number or name" class="form-control " id="input_search " name="search_str" value="<?php echo htmlspecialchars($search_str, ENT_QUOTES, 'UTF-8'); ?>">
                                         <input type="submit" value="Go" class="btn btn-primary ml-1 ">
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
                                    <th>#</th>
                                    <th>Artisen Name</th>
                                    <th>Monthly Outcomes</th>
                                    <th>Previous Outcomes</th>
                                    <th>Present Outcomes</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($artisens as $artisen): ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($artisen['id']); ?></td>
                                    <td><?php echo htmlspecialchars($artisen['full_name']); echo getCurrentStatus($artisen['id'],$db);?></td>
                                    <td><?php echo getMontlyOutcomes($artisen['id'],$db) ; ?></td>
                                    <td><?php echo getPreviousOutcomes($artisen['id'],$db) ; ?></td>
                                    <td><?php echo getPresentOutcomes($artisen['id'],$db) ; ?></td>
                                    <td><a href="/users/artisen/account.php?id=<?php echo htmlspecialchars($artisen['id']); ?>" class="btn btn-sm btn-success"><i class="fa fa-user"></i>&nbsp;Visit profile</a></td>

                                </tr>
                                
                              

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
