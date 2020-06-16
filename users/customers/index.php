<?php session_start();?>
<?php require_once '/var/www/html/libraries/config/config.php';?>
<?php include PARENT.'/includes/header.php'; ?>


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

.fa {
    font-size:85px;
    padding-bottom:15px;
}
#user_name{
     letter-spacing:5px;
 }
</style>
<header class="mb-4">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <p class="sub-header text-success "> BOUTIQUE </p>
            </div>
        </div>
        <div class="row mt-5 ">
            <div class="col-md-8 offset-md-2 px-md-5">
            <?php if(isset($_GET['s']) && $_GET['s']=='registered' ){?>
                <div class="card text-dark bg-success border-plain shadow pb-3">
                    <div class="card-header  border-0  bg-success text-center">** CUSTOMER EXISTS **</div>
                        <div class="card-body text-center">
                        <p class="lead"><span class="text-dark font-weight-bold">Happy!</span> 
                        to find the customer is registered on splash, please perform the actions to proceed </p>
                        <p class="mt-2">
                        <i class="fa fa-user-circle-o"></i><br>
                        <span id="user_name" class="text-uppercase"><?php echo @$_GET['usr'];?></span>
                        </p>
                        <a href="/users/customers/account.php?id=<?php echo $_GET['id']; ?>" class="btn btn-dark mt-2">Customer's portfolio</a>
                        <a href="/orders/new_order.php?s=registered&id=<?php echo $_GET['id']; ?>" class="btn btn-dark mt-2">Place New Order</a>
                    </div>
                </div>
            <?php  }else if(isset($_GET['s'])&& isset($_GET['number']) && $_GET['s']=='new'  ){?>
                <div class="card text-dark bg-success border-plain shadow pb-3">
                    <div class="card-header  border-0  bg-success text-center">** YAAY! WE HAVE A NEW CUSTOMER **</div>
                        <div class="card-body text-center">
                        <p class="lead"><span class="text-dark font-weight-bold">we are happy to see you here!</span> 
                        The number you requested for, is new to splash, please proceed ahead</p>
                        <p class="mt-2">
                        <i class="fa fa-user-plus"></i><br>
                        <span id="user_name"><?php echo $_GET['number'];?></span>
                        </p>
                        <a href="/orders/new_order.php?phone=<?php echo $_GET['number']; ?>" class="btn btn-dark mt-2">Register Customer & Place New Order</a>
                    </div>
                </div>
            <?php  }else  {?>
                <div class="card text-dark bg-success border-plain shadow pb-3">
                    <div class="card-header  border-0  bg-success text-center">** ALAS! THERE'S SOME PROBLEM **</div>
                        <div class="card-body text-center">
                        <p class="lead"><span class="text-dark font-weight-bold">This part of application cant be accessed directly!</span> 
                        Please visit back and try again,</p>
                        <p class="mt-2">
                        <i class="fa fa-exclamation-triangle"></i><br>
                        <span id="user_name">Try again</span>
                        </p>
                    </div>
                </div>
                <?php }?>
                <div class="text-center  mt-2">
                <a href="/index.php" class="btn btn-success shadow mt-2">Home</a>
                </div>
            </div>
        </div>
    </div>
</header>
 


</body>
<?php include PARENT.'/includes/scripts.php' ?>



