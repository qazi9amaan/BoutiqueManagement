<?php session_start(); ?>
<?php require_once '../libraries/config/config.php'; ?>
<?php include '../includes/header.php'; ?>

<?php
    if(isset($_GET['order'])){
        $db = getDbInstance();
        $customer=$db->where('order_id',$_GET['order'])->getOne('orders');
        $customer+=$db->where('cust_id', $customer['cust_id'])->getOne('customer');
        $customer+=$db->where('product_id', $customer['product_id'])->getOne('products');
        $specs = $db->where('specification_id',explode(",",$customer['specifications']), 'IN')->get('specifications');
        $total_spec_price = $db->where('specification_id',explode(",",$customer['specifications']), 'IN')->getValue('specifications','SUM(specification_price)');
        $measurement=$db->where('id', $customer['measurement_id'])->getOne('measurements');
        $artist_name=$db->where('id', $customer['artisen_assigned'])->getValue('staff_accounts','full_name');
    }    


?>
<style>
.details > p{
    padding: 0rem .45rem;

}
</style>
<body class="bg-primary">
    <div class="container-fluid px-md-5 px-sm-5 pt-4 mt-5">
        <div class="row">
            <div class="col-12 pb-3">

                <div class="  card">
                    <div class="  text-center card-header bg-white text-primary">
                    <strong>** ORDER NO <?php echo $customer['order_id'];?> ** </strong>
                    </div>
                </div>
            </div>
         </div>


        <div class="card-columns">
        <!-- CUSTOMER DETAILS -->
            <div class="  card">
                <div class="card-header ">Customer Details</div>
                <div class="card-body bg-primary text-white bg-primary text-white">
                    <div id="customer-details" class=" details container">
                        <p class="d-flex justify-content-between">Name <span class="font-weight-bold"><?php echo $customer['cust_name'];?></span></p>
                        <p class="d-flex justify-content-between">Phone <span><?php echo $customer['cust_phone_number'];?></span></p>
                        <p class="pr-3">Address :&nbsp; &nbsp; <span><?php echo $customer['cust_address'];?></span></p>
                    </div>
                </div>
            </div>

            <!-- BILLING -->
            <div class="  card">
                <div class="card-header ">Billing Details</div>
                <div class="card-body bg-primary text-white">
                <div id="billing-details" class="details container">
                        <p class="d-flex justify-content-between">Order recieved at <span><?php echo $customer['ordered_at'];?></span></p>
                        <p class="d-flex justify-content-between">Delivery date <span><?php echo $customer['delivery_date'];?></span></p>
                        <p class="d-flex justify-content-between">Product Price  <span><?php echo $customer['order_price'];?></span></p>
                        <p class="d-flex justify-content-between">Advance <span><?php echo $customer['advance_money'];?></span></p>
                        <p class="d-flex justify-content-between">Pending <span><?php echo $customer['order_price']-$customer['advance_money'];?></span></p>

                    </div>
                </div>
            </div>
        <!-- PRODUCT DETAILS -->
            <div class="  card">
            <div class="card-header ">Product Details</div>
                <div class="card-body bg-primary text-white">
                <div id="product-details" class="details container">
                        <p class="d-flex justify-content-between">Product colour <span style="background:<?php echo $customer['product_color'];?>" class="p-1  px-5"></span></p>
                        <p class="d-flex justify-content-between">Product length <span><?php echo $customer['product_length'];?></span></p>
                    </div>
                </div>
            </div>
            <!--  -->
            <div class="card p-3">
                <blockquote class="blockquote mb-0 card-body ">
                <p>   <?php echo $customer['additionals'];?>          </p>
                <footer class="blockquote-footer">
                    <small class="text-muted">
                        Requested by <?php echo $customer['cust_name'];?>
                    </small>
                </footer>
                </blockquote>
            </div>

            <div class="card bg-success text-dark p-3">
                <blockquote class="blockquote mb-0 card-body ">
                <span>The product is being prepared by  <?php echo $artist_name;?>          </span>
                </blockquote>
            </div>

           

            <div class="  card">
                <div class="card-header ">Measurements</div>
                    <div class="card-body bg-primary text-white">
                    <div class="measurements container">
                           <div class="row">
                           <span class="measurement col-6 col-lg-4 col-sm-6 col-xs-6"> No of Pieces <span class=" font-weight-bold"> <?php echo $measurement['no_of_pieces'];?></span></span>
                            <span class="measurement col-6 col-lg-4 col-sm-6 col-xs-6">Embroidery <span class=" font-weight-bold"><?php echo $measurement['embroidery'];?> </span></span>
                            <span class="measurement col-6 col-lg-4 col-sm-6 col-xs-6">U-Length <span class=" font-weight-bold"><?php echo $measurement['upper_length'];?> </span></span>
                            <span class="measurement col-6 col-lg-4 col-sm-6 col-xs-6">U-Chest <span class=" font-weight-bold"><?php echo $measurement['upper_chest'];?></span></span>
                            <span class="measurement col-6 col-lg-4 col-sm-6 col-xs-6">U-Waist <span class=" font-weight-bold"><?php echo $measurement['upper_waist'];?></span></span>
                            <span class="measurement col-6 col-lg-4 col-sm-6 col-xs-6">U-Hips <span class=" font-weight-bold"><?php echo $measurement['upper_hips'];?></span></span>
                            <span class="measurement col-6 col-lg-4 col-sm-6 col-xs-6">U-Flair <span class=" font-weight-bold"><?php echo $measurement['upper_flair'];?></span></span>
                            <span class="measurement col-6 col-lg-4 col-sm-6 col-xs-6">U-Hemline <span class=" font-weight-bold"><?php echo $measurement['upper_hemline'];?></span></span>
                            <span class="measurement col-6 col-lg-4 col-sm-6 col-xs-6">U-Sleeves <span class=" font-weight-bold"><?php echo $measurement['upper_sleeves'];?></span></span>
                            <span class="measurement col-6 col-lg-4 col-sm-6 col-xs-6">U-Neck Line  <span class=" font-weight-bold"> <?php echo $measurement['upper_neck_line'];?></span></span>
                            <span class="measurement col-6 col-lg-4 col-sm-6 col-xs-6">L-Length <span class=" font-weight-bold"><?php echo $measurement['lower_length'];?></span></span>
                            <span class="measurement col-6 col-lg-4 col-sm-6 col-xs-6">L-Poocha <span class=" font-weight-bold"><?php echo $measurement['lower_poocha'];?></span></span>
                            <span class="measurement col-6 col-lg-4 col-sm-6 col-xs-6">L-Thy <span class=" font-weight-bold"><?php echo $measurement['lower_thy'];?></span></span>
                            <span class="measurement col-6 col-lg-4 col-sm-6 col-xs-6">L-Waist <span class=" font-weight-bold"><?php echo $measurement['lower_waist'];?></span></span>
                            <span class="measurement col-6 col-lg-4 col-sm-6 col-xs-6">L-Hips <span class=" font-weight-bold"><?php echo $measurement['lower_hips'];?></span></span>
                           </div>
                    </div>
                </div>
            </div>
          
            <div class="  card">
            <div class="card-header ">Specifications</div>
                <div class="card-body bg-primary text-white">
                <p class="text-justify mt-1">
                        <?php foreach ($specs as $spec):?>
                            <span class="font-weight-bold p-1 px-2 bg-white text-dark rounded border  px-4 mr-2 text-center"><?php echo $spec['specification_name']; ?></span>
                        <?php endforeach ?>
                       </p>
                </div>
            </div>
            <div class="card p-3 text-right">
                    <div id="add-details" class="details container">
                        <p class="d-flex justify-content-between">Artisen Assigned <span><?php echo $artist_name; ?><span></p>
                        <p class="d-flex justify-content-between">Previous Delivery <span><?php echo $customer['previous_delivery'];?></span></p>
                        <p class="d-flex justify-content-between">Reason <span><?php echo $customer['extended_reason'];?></span></p>
                    </div>
            </div>
        </div>
    </div>
</body>
<?php include '../includes/scripts.php' ?>
