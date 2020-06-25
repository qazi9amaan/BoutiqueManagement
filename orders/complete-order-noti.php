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
        $total_spec_price = $db->where('specification_id',explode(",",$customer['specifications']), 'IN')->getValue('specifications','SUM(specification_final_price)');
        $measurement=$db->where('id', $customer['measurement_id'])->getOne('measurements');

    }    

?>


<style>
 #page-header{
        letter-spacing: 7px;
        font-size:3rem;
    }

    #page-subheader{
        letter-spacing: 7px;
    }

    a:hover {
        text-decoration: none;
    }
 

@media print
{
.noprint {display:none;}
}

.measurement{
    display:flex;
}
.measurement span{
    padding-left:15px;
    text-decoration:bold
}
</style>
<body>
    <div class="container-fluid ">
    <div class="row ml-auto">
    <div  class="noprint  ml-auto pr-3 py-2  ">
            <a href="/index.php" class="btn btn-success">Home </a>
            <a class="btn btn-success" id="print-bill-btn">Print Bill</a>            
            <a class="btn btn-success" id="print-info-btn">Print Info</a> 
            <a class="btn btn-success" id="print-all-btn">Print All</a>
          
        </div>
    </div>

   <div class="row p-3">

        <div id="print-bill" class="col-md-6   border rounded p-4">
            <div class="text-center">
                <p id="page-header" class="text-dark display-4 mb-0" href="#"> S P L A S H</p>
                <p id="page-subheader" class="text-dark lead  pt-2">&#8226; &#8226; BOUTIQUE &#8226; &#8226;</p>
                
            </div>
            <!-- CUSTOMER -->
            <div class="card mt-4">
                <div class="card-body">
                    <div class="d-flex  justify-content-between align-items-center">
                      <small>  <span>
                            <span class=""> Od No.</span>
                            <span class=" font-weight-bold">#<?php echo $customer['order_id'];?></span>
                        </span></small>
                       <small>
                       <span>
                            <span class=""> Dated.</span>
                            <span class=" font-weight-bold"><?php echo $customer['ordered_at'];?></span>
                        </span>
                       </small>
                    </div>
                    <div class="d-flex  justify-content-between align-items-center">
                       <small>
                       <span>
                            <span class=""> M/s</span>&nbsp;
                            <span class=" font-weight-bold"><?php echo $customer['cust_name'];?></span>
                        </span>
                       </small>
                        <small>
                            <span class=""> Delivery.</span>
                            <span class=" font-weight-bold"><?php echo $customer['delivery_date'];?></span>
                       </small>
                        
                    </div>
                </div>
            </div>
            <!-- DETAILS -->
            <div class="card mt-2">
                <div class="card-body py-2 ">
                    <!-- Product --> 
                    <small class="font-weight-bold">Product Details</small>
                    <small>
                        <div class="d-flex my-2   justify-content-between  align-items-center">
                            <span>
                                <span class=""> Color</span>
                            <span style="background:<?php echo $customer['product_color'];?>" class="p-0 ml-2 rounded px-5 border"></span>
                            </span>
                            <span>
                                <span class=""> Length.</span>
                                <span class=" font-weight-light"><?php echo $customer['product_length'];?></span>
                            </span>
                        </div>
                    </small>

                    <!-- SPECS -->
                    <small class="font-weight-bold">Specifications</small>
                    <small>
                    <?php 
                        $counter =1;
                        foreach ($specs as $spec):
                    ?>
                        <div class="d-flex my-2  justify-content-between align-items-center">
                            <span><?php echo $counter.".&nbsp; &nbsp;". $spec['specification_name']; ?></span>
                            <span>
                                <span><?php echo $spec['specification_final_price']; ?></span>
                                /=
                            </span>
                        </div>
                    <?php 
                    $counter +=1;
                        endforeach 
                    ?>
                     </small>
                        <!-- Additionals -->
                        <small class="font-weight-bold">Additionals</small>
                        <small>
                        <p class="text-justify">
                        <?php echo $customer['additionals'];?>                       
                         </p>
                        </small>

                    <!-- Billing -->
                    <small class="font-weight-bold">Billing</small>
                    <small>
                        <div class="d-flex my-2   justify-content-between  align-items-center">
                                <span class="">Specifications</span>
                                <span class=""><?php echo  $total_spec_price;?>/=</span>
                        </div>
                        <div class="d-flex my-2   justify-content-between  align-items-center">
                                <span class="">Final price</span>
                                <span class="font-weight-bold">  <?php echo $customer['order_price'];?>/=</span>
                        </div>
                        <div class="d-flex my-2   justify-content-between  border-bottom pb-3 align-items-center">
                                <span class="">Advance</span>
                                <span class="">  <?php echo $customer['advance_money'];?>/=</span>
                        </div>
                        <div class="d-flex my-2   justify-content-between pb-2 align-items-center">
                                <span class="">Pending</span>
                                <span class="font-weight-bold">  <?php echo $customer['order_price']-$customer['advance_money'];?>/=</span>
                        </div>
                        <small>
                            <p>
                             Dear customer, we are more then happpy to serve you here, please visit the boutique on
                         <strong><?php echo $customer['delivery_date'];?></strong> to collect your order.
                         </p></small>
                    </small>
                </div>
            </div>
            <div class="card border-0  pt-2">
                <div class="card-body    border">
                    <small>
                        We are here at, 
                        <div class="d-flex align-items-baseline">
                            <i class="fa fa-home"></i>
                            <span>&nbsp; Splash Boutique, Seerat Complex, 90 Feet Road Behind Police Station, Soura Sgr.</span>
                        </div>
                        <div class="d-flex ">
                        <div class="d-flex align-items-baseline">
                            <i class="fa fa-phone"></i>
                            <span>&nbsp; 9419002492</span>
                        </div>
                        <div class="d-flex align-items-baseline ml-4">
                            <i class="fa fa-envelope"></i>
                            <span>&nbsp; qazi9amaan@gmail.com</span>
                        </div>
                        </div>

                    </small>
                </div>
            </div>
        </div>


<!-- OFFICIAL DETAILS -->
        <div id="print-offical-details"  class="col-md-6">
        <div class="card">
            <div class="card-header text-center">
                ** FOR OFFICIAL USE ONLY <strong>ORD-<?php echo $customer['order_id'];?></strong> **
            </div>
            <div class="card-body">
                <small>
                    <div class="d-flex justify-content-between">
                        <strong><span>ORDER ID: <b><?php echo $customer['order_id'];?></b> </span></strong>
                        <span>CUSTOMER ID: <b><?php echo $customer['cust_id'];?></b> </span> 

                    </div>
                    <div class="d-flex justify-content-between mt-1">
                        <span>Recieved On: <b> <?php echo $customer['ordered_at'];?></b> </span> 
                        <span>Delivery: <b><?php echo $customer['delivery_date'];?></b> </span>
                    </div>

                    <div class="d-flex justify-content-between mt-2 pb-1">
                        <span class="d-flex">Color:                             
                            <span style="background:<?php echo $customer['product_color'];?>" class="p-0 ml-2 px-5 rounded px-2 border"></span>
                        </span> 
                        <span>Product length: <b><?php echo $customer['product_length'];?></b> </span>
                    </div>
                    <hr>

                    <div class="measurements container">
                            <strong> <p>Measurements</p></strong>

                           <div class="row">
                           <span class="measurement col-6 col-lg-3 col-sm-6 col-xs-6"> No of Pieces <span class=" font-weight-bold"> <?php echo $measurement['no_of_pieces'];?></span></span>
                            <span class="measurement col-6 col-lg-3 col-sm-6 col-xs-6">Embroidery <span class=" font-weight-bold"><?php echo $measurement['embroidery'];?> </span></span>
                            <span class="measurement col-6 col-lg-3 col-sm-6 col-xs-6">U-Length <span class=" font-weight-bold"><?php echo $measurement['upper_length'];?> </span></span>
                            <span class="measurement col-6 col-lg-3 col-sm-6 col-xs-6">U-Chest <span class=" font-weight-bold"><?php echo $measurement['upper_chest'];?></span></span>
                            <span class="measurement col-6 col-lg-3 col-sm-6 col-xs-6">U-Waist <span class=" font-weight-bold"><?php echo $measurement['upper_waist'];?></span></span>
                            <span class="measurement col-6 col-lg-3 col-sm-6 col-xs-6">U-Hips <span class=" font-weight-bold"><?php echo $measurement['upper_hips'];?></span></span>
                            <span class="measurement col-6 col-lg-3 col-sm-6 col-xs-6">U-Flair <span class=" font-weight-bold"><?php echo $measurement['upper_flair'];?></span></span>
                            <span class="measurement col-6 col-lg-3 col-sm-6 col-xs-6">U-Hemline <span class=" font-weight-bold"><?php echo $measurement['upper_hemline'];?></span></span>
                            <span class="measurement col-6 col-lg-3 col-sm-6 col-xs-6">U-Sleeves <span class=" font-weight-bold"><?php echo $measurement['upper_sleeves'];?></span></span>
                            <span class="measurement col-6 col-lg-3 col-sm-6 col-xs-6">U-Neck Line  <span class=" font-weight-bold"> <?php echo $measurement['upper_neck_line'];?></span></span>
                            <span class="measurement col-6 col-lg-3 col-sm-6 col-xs-6">L-Length <span class=" font-weight-bold"><?php echo $measurement['lower_length'];?></span></span>
                            <span class="measurement col-6 col-lg-3 col-sm-6 col-xs-6">L-Poocha <span class=" font-weight-bold"><?php echo $measurement['lower_poocha'];?></span></span>
                            <span class="measurement col-6 col-lg-3 col-sm-6 col-xs-6">L-Thy <span class=" font-weight-bold"><?php echo $measurement['lower_thy'];?></span></span>
                            <span class="measurement col-6 col-lg-3 col-sm-6 col-xs-6">L-Waist <span class=" font-weight-bold"><?php echo $measurement['lower_waist'];?></span></span>
                            <span class="measurement col-6 col-lg-3 col-sm-6 col-xs-6">L-Hips <span class=" font-weight-bold"><?php echo $measurement['lower_hips'];?></span></span>
                           </div>
                    </div>
                
                    <hr>
                    <div class="specs">
                        <strong>Specifications</strong>
                       <p class="text-justify mt-1">
                        <?php foreach ($specs as $spec):?>
                            <span class="font-weight-bold  pr-4"><?php echo $spec['specification_name']; ?></span>
                        <?php endforeach ?>
                       </p>

                    </div>
                    <hr>
                    <div class="extra">
                    <strong>Additonals</strong>
                        <p class="text-justify mt-0">
                        <?php echo $customer['additionals'];?>                       
                    </div>

                    <hr>
                    <div class="officials">
                        <strong>Office use</strong>
                        <div class="d-flex justify-content-between" >
                           <div>
                            <span>Product placed at.</span>&nbsp; &nbsp;
                                <span  class="px-5 border-bottom"></span>
                           </div>
                           <div>
                            <span>Signature</span>&nbsp; &nbsp;
                                <span  class="px-5 border-bottom text-muted"></span>
                           </div>
                        </div>
                        <div class="d-flex justify-content-between pt-3" >
                           <div>
                            <span>Work Assigned to.</span>&nbsp; &nbsp;
                                <span  class="px-5 border-bottom w-100">          </span>
                           </div>
                          
                           
                        </div>
                    </div>





 





                </small>
            </div>

        </div>
        
        </div>

       


    </div>
   </div>
</body>

<?php include '../includes/scripts.php' ?>

<script>

$('#print-all-btn').click(function(){
        $('#print-bill').css("display","");
        $('#print-offical-details').css("display","");

        $('#print-bill').attr("class","col-6  border rounded p-4");
        $('#print-offical-details').attr("class","col-6 ");

    window.print();

});

$('#print-bill-btn').click(function(){
    $('#print-bill').attr("class","col-6  border rounded p-4");
    $('#print-offical-details').css("display","none");
    $('#print-bill').css("display","");

    window.print();

});

$('#print-info-btn').click(function(){
        $('#print-offical-details').attr("class","col-6  border rounded p-4");
        $('#print-offical-details').attr("class","col-6 ");
        $('#print-bill').css("display","none");
        $('#print-offical-details').css("display","");

    window.print();

});
</script>

