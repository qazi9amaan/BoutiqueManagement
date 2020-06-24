<?php session_start();?>
<?php require_once '/var/www/html/libraries/config/config.php';?>
<?php include PARENT.'/includes/header.php'; ?>

<?php 

    if ($_SERVER['REQUEST_METHOD'] === 'POST') 
    {
        $data_to_db = array_filter($_POST);
        $order_id = $data_to_db['order_id'];
        $staff_id = $data_to_db['artisen_assigned'];
        $data_to_db['order_status']='assigned';
        $db2 = getDbInstance();
        if($db2->where('artisen_assigned', $staff_id)->getOne('orders')){
            $_SESSION['failure'] ='The artisen is already occupied';
            header('Location: assign-order.php');
            exit();
        }

        $db = getDbInstance();
        $last_id = $db->where('order_id',$order_id)->update('orders', $data_to_db);
        if ($last_id)
        {
            $_SESSION['success'] = 'Artisen assigned  successfully!';
            header('Location: assign-order.php');
        exit();
        }
        else
        {
            $_SESSION['failure'] ='Insert failed: ' . $db->getLastError();
            header('Location: assign-order.php');
            exit();
        }
    }

    $db = getDbInstance();
    $orders=$db->orderBy('ordered_at', 'ASC')->where('order_status','new')->get('orders');
    $occ_artisens=$db->where('order_status','assigned')->join("staff_accounts s", "o.artisen_assigned=s.id", "LEFT")->get('orders o');
    
    $artisens=$db->where('account_type', 'artisen')->get('staff_accounts');


?>

<body class=" bg-primary d-flex flex-column  justify-content-center" >
<style>


.sub-header{
    letter-spacing: 55px;
    padding-top:55px;
    line-height:55px;
    font-size:40px;
    font-weight:200;
}
@media only screen and (max-width: 768px) {
    .sub-header{
        letter-spacing: 25px;
        font-size:30px;

    }
}


#user_name{
     letter-spacing:5px;
 }
</style>
<header class="mb-4">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 text-center">
                <p class="sub-header text-success "> BOUTIQUE </p>
            </div>
        </div>
        <div class="row mt-5 ">
            <div class="col-md-4 px-md-5 ">
                <div class="card text-dark bg-success border-plain shadow pb-3">
                    <div class="card-header  border-0  bg-success text-center">** RECIEVED ORDERS **</div>
                        <div class="card-body text-center">
                        <p class="lead"><span class="text-dark font-weight-bold">Happy!</span> 
                       to find you here, please find the recieved orders </p>
                        <div class="mt-2">
                            <?php foreach ($orders as $order):?>
                                <p class=" pb-2 px-3 d-flex justify-content-between ">
                                    <span>Order <strong>#<?php echo $order['order_id'];?></strong></span>
                                    <span> <?php echo date('j F Y', strtotime($order['ordered_at'])); ?></span>
                                </p>
                            <?php endforeach ?>
                        </div>
                        <a href="assign-order.php" class="btn btn-dark mt-2">Refresh &nbsp; <i class="fa fa-refresh"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 px-md-5 ">
                <div class="card text-dark bg-success border-plain shadow pb-3">
                    <div class="card-header  border-0  bg-success text-center">** OCCUPIED ARTISENS **</div>
                        <div class="card-body text-center">
                        <p class="lead"><span class="text-dark font-weight-bold">Let's Work!</span> 
                       these artisens are not availble to work at present, assign them later. </p>
                        <div class="mt-2">
                        
                        <?php foreach ($occ_artisens as $art):?>
                            <p class=" pb-2 px-3 d-flex justify-content-between ">
                                <span><?php echo $art['full_name']; ?></span>
                                <span>Order <strong>#<?php echo $art['order_id'];?></strong></span>
                            </p>
                            <?php endforeach ?>
                        </div>
                        <a href="assign-order.php" class="btn btn-dark mt-2">Refresh &nbsp; <i class="fa fa-refresh"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 px-md-5 ">
                <div class="card text-dark bg-success border-plain shadow pb-3">
                    <div class="card-header  border-0  bg-success text-center">** ASSIGN ARTISEN **</div>
                        <div class="card-body text-center">
                        <?php include PARENT.'/includes/flash_messages.php'; ?>
                        <p class="lead"><span class="text-dark font-weight-bold">Ahaan!</span> 
                       please choose the artisen to assign him for the specified order. </p>
                        <div class="mt-2">
                           <form method="POST">
                            <select name="order_id" id="" class=" mt-1 bg-dark border-0 text-white form-control">
                            <?php foreach ($orders as $order):?>
                                <option value="<?php echo $order['order_id']; ?>">Order  #<?php echo $order['order_id']; ?></option>
                            <?php endforeach ?>
                            </select>
                            <select name="artisen_assigned" id="" class=" mt-1 bg-dark border-0 text-white form-control">
                            <?php foreach ($artisens as $artist):?>
                                <option value="<?php echo $artist['id']; ?>"><?php echo $artist['full_name']; ?></option>
                            <?php endforeach ?>
                            </select>
                            <button class="btn btn-dark mt-2" type="submit">Assign</button>
                           </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
 


</body>
<?php include PARENT.'/includes/scripts.php' ?>



