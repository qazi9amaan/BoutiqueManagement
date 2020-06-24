<?php session_start();?>
<?php require_once '/var/www/html/libraries/config/config.php';?>
<?php include PARENT.'/includes/header.php'; ?>

<?php 
     $db = getDbInstance();

    $staff_id =  @$_GET['id'] ?  $_GET['id']: $_SESSION['staff_user_id'] ;
    $current_work =$db->where('artisen_assigned', $staff_id)->getOne('orders');
  
    if ($_SERVER['REQUEST_METHOD'] === 'POST') 
    {
        $data_to_db = array_filter($_POST);
        $order_id = $data_to_db['order_id'];
        $staff_id = $data_to_db['artisen_assigned'];
        $data_to_db['order_status']='assigned';
        $db2 = getDbInstance();
        if($current_work){
            $_SESSION['failure'] ='The artisen is already occupied';
            header('Location: index.php');
            exit();
        }

        $db = getDbInstance();
        $last_id = $db->where('order_id',$order_id)->update('orders', $data_to_db);
        if ($last_id)
        {
            $_SESSION['success'] = 'Artisen assigned  successfully!';
            header('Location: index.php');
        exit();
        }
        else
        {
            $_SESSION['failure'] ='Insert failed: ' . $db->getLastError();
            header('Location: index.php');
            exit();
        }
    }



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
              <div class="col-md-8 offset-md-2 px-md-5">
                <div class="card text-dark bg-success border-plain shadow pb-3">
                    <div class="card-header  border-0  bg-success text-center">** ASSIGN ME A WORK **</div>
                        <div class="card-body text-center">
                        <p class="lead"><span class="text-dark font-weight-bold">Happy!</span> 
                       to find you here, please provide your phone number and order-id to proceed ahead </p>
                        <div class="mt-2">
                            <form class="text-left" method="POST">
                                <div class="form-group">
                                    <label for="phone_num">Artist Name</label>
                                    <input type="text" disabled value="<?php echo @$_GET['name']? $_GET['name'] :$_SESSION['staff_user_name'];?>" class="form-control" id="phone_num">
                                </div>
                                <input hidden name="artisen_assigned" value="<?php echo $staff_id ;?>" type="text">
                                <div class="form-group">
                                    <label for="order">Order number</label>
                                    <input type="number" name="order_id" class="form-control" id="order">
                                </div>

                              
                                <a class="btn btn-dark mt-2" href="account.php?id=<?php echo $staff_id?>">Visit Profile</a>
                                <?php if(!$current_work){?>
                                    <button class="btn btn-dark mt-2" type="submit">Assign</button>
                                <?php }?>
                            </form>
                            <div class="text-left mt-2">
                            <?php if($current_work){?>
                                    <div class="alert d-flex  justify-content-between alert-light alert-dismissable">
                                           <div> <strong>Wait! </strong> you have an order.</div>
                                            <form method ="POST" action="/orders/complete_order_helper.php?r=/users/artisen/">
                                                <input type="number" hidden value="<?php echo $current_work['order_id'] ?>" name="order_id">
                                            <button type="submit" class="btn btn-dark btn-sm" >Completed Submit order!</button></form>
                                    </div>
                                                                   <?php }?>
                            </div>
                        
                        </div>
                       
                    </div>
                </div>
            </div>
            
        </div>
        <div class="text-center mt-3">
                <a href="/logout.php" class="btn btn-success">Logout</a>
        </div>
    </div>
</header>
 


</body>
<?php include PARENT.'/includes/scripts.php' ?>



