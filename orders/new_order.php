<?php session_start(); ?>
<?php require_once '../libraries/config/config.php'; ?>
<?php include '../includes/header.php'; ?>

<?php
    if(isset($_GET['s']) && isset($_GET['id']) && $_GET['s'] =="registered"){
        $db = getDbInstance();
        $db->where('cust_id',$_GET['id']);
        $customer=$db->getOne('customer');
        $measurement_db=$db->where('id',$customer['measurement_id'])->getOne('measurements');
    }    
?>

<?php
    $db = getDbInstance();
    $specs = $db->get('specifications');
    $max_delivery_date = $db->getValue('orders','MAX(delivery_date)');
    $delivery_count = $db->where("delivery_date",$max_delivery_date)->getValue('orders','count(*)');
    $delivery_date = $delivery_count < MAX_ORDERS_PER_DAY+1 ? $max_delivery_date : date('Y-m-d', strtotime($max_delivery_date. ' + 1 days'));
    
?>

<body class="bg-primary  d-flex flex-column  justify-content-center" >
<style>
    #page-header{
        letter-spacing: 5px;;
    }
    a:hover {
        text-decoration: none;
    }
    #page-header:hover{
        color:rgba(255, 255, 255, 0.5) !important;
    }
    #specifications input,
    #specifications i {
        display: none;
    }

    #specifications :checked+label {
        background: #FEC100;
        display: block;
        color: #333 !important;
        border: 1px solid #FEC100;
    }

    #specifications :checked+i {
        display: block;
    }

    #specifications :checked+label:hover {
        background: #eed75a !important;
    }

    #specifications .specifications-item label {
        text-align: center;
        padding: 5px;
        width: 100%;
        cursor: pointer;
        font-size: 18px;
        color: #528165;
        border-radius: 0.25rem !important;
        border: 1px solid #dee2e6 !important;
    }

    #specifications :checked+label :hover {
        background-color: red;
        border-color: #f3f5f9;
        color: #333;
    }

    #specifications .specifications-item :hover {
        background-color: #eed75a;
        border-color: #eed75a;
        color: #333;
    }

    #specifications p {
        color: #5d5d5d;
    }

    #measurements label {
        color: #5d5d5d;
    }
    #product-details i{
        color:#528165;
        font-size:85px;
    }
</style>
<header class="mb-4">
        <div class="container">
            <div class="row">
                <div class="col-12 p-5 mb-4 text-center">
                    <a id="page-header" href="/index.php" class="display-1  text-white text-hov-white">SPLASH </a>
                </div>
            </div>
            <div class="row ">
                <div class="col-12">
                    <div class=" m-0  text-light">
                        <div class="multistep-form">
                            <!--progress bar-->
                            <div class="row">
                                <div class="col-12 col-lg-8 ml-auto mr-auto mb-4">
                                <div class="multisteps-form__progress">
                                    <button class="multisteps-form__progress-btn js-active" type="button" title="User Info">Customer Details</button>
                                    <button class="multisteps-form__progress-btn" type="button" title="Address">Product Details</button>
                                    <button class="multisteps-form__progress-btn" type="button" title="Order Info">Specification</button>
                                    <button class="multisteps-form__progress-btn" type="button" title="Comments">Measurements</button>
                                    <button style="display:none;" class="multisteps-form__progress-btn" type="button" title="Comments">Measurements</button>
                                    <button class="multisteps-form__progress-btn" type="button" title="Complete Order">Complete order</button>

                                </div>
                                </div>
                            </div>
                       
                            <div style="margin-top: -30px;" class="row">
                            <div class="col-12 col-lg-10 m-auto">
                                <form method ="POST" enctype="multipart/form-data" 
                                <?php  if(@$customer['cust_id'])
                                 {echo  'action ="add_order_details.php"';
                                 }else{
                                    echo 'action ="save_order_details.php"';}
                                    ?>  class="multisteps-form__form">
                                    
                                <!--CUSTOMER DETAILS-->
                                <div class="multisteps-form__panel shadow p-5 rounded bg-white js-active" data-animation="scaleIn">
                                    <h3 class="multisteps-form__title">CUSTOMER DETAILS</h3>
                                    <div class="multisteps-form__content">
                                    <div class="form-row mt-4">

                                        <?php  if(@$customer['cust_id']){
                                            echo '<input value="'.@$customer["cust_id"].'" 
                                            class="multisteps-form__input form-control " name="cust_id" hidden type="text" placeholder="Full Name"/>';
                                            echo '<input value="'.@$customer["measurement_id"].'" 
                                            class="multisteps-form__input form-control " name="measurement_id" hidden type="text" placeholder="Full Name"/>';
                                        }
                                        ?>
                                            <div class="col-12 col-sm-6">
                                                <input value="<?php echo @$customer['cust_name'] ?>" class="multisteps-form__input form-control " name="cust_name" type="text" placeholder="Full Name"/>
                                            </div>
                                            <div class="col-12 col-sm-6 mt-2 mt-sm-0">
                                                <input   <?php  if(@$customer['cust_id']){ echo'disabled'; }?> value="<?php echo @$_GET['phone'];  echo @$customer['cust_phone_number'] ?>" class="multisteps-form__input form-control " name="cust_phone_number" type="number" placeholder="Phone Number"/>
                                            </div>
                                           </div>
                                            <div class="form-row mt-2">
                                                <div class="col-12 col-sm-12  mt-sm-0">
                                                    <select name="cust_sex" class="form-control">
                                                        <option <?php  if(@$customer['cust_sex']== "f") {echo "selected";}?>  default value="f">Female</option>
                                                        <option <?php  if(@$customer['cust_sex']== "m") {echo "selected";}?>  value="m">Male</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-row mt-2">
                                            
                                            <div class="col-12 col-sm-12 mt-sm-0">
                                                <textarea name="cust_address" class="multisteps-form__input form-control " type="text" placeholder="Address" 
                                                    rows="5"><?php echo @$customer['cust_address'] ?></textarea>
                                            </div>
                                            </div>
                                            
                                            <div class="button-row d-flex mt-4">
                                            <button class="btn btn-success  ml-auto  js-btn-next" type="button" title="Next">Next</button>
                                            </div>

                                            ?>
                                    </div>
                                </div>

                                <!-- PRODUCT_DETAILS -->
                                <div id="product-details" class="multisteps-form__panel shadow p-5 rounded bg-white" data-animation="scaleIn">
                                    <h3 class="multisteps-form__title mt-3">PRODUCT DETAILS</h3>
                                    <div class="multisteps-form__content">
                                    <div class="form-row mt-2">
                                        <div class="col-12 p-3 col-sm-4  mt-sm-0">
                                            <div class="div card py-5  border-primary rounded d-flex justify-content-center text-center h-100">
                                                <i class="fa  fa-shopping-bag"></i>
                                            </div>
                                        </div>

                                        <div class="col-12 col-sm-8 mt-sm-0 p-2">
                                            <div class="form-row">
                                                <div class="col-12 col-sm-12 mt-sm-0 mt-0 pt-0">
                                                <label class="text-primary" for="product-color">Product color</label>
                                                <input class="multisteps-form__input form-control p-0" 
                                                type="color" style="cursor:pointer"   name="product_color" id="product-color" placeholder="Product Color"/>
                                                </div>
                                            </div>
                                        
                                            <div class="form-row mt-2">
                                                <div class="col-12 col-sm-12 mt-sm-0">
                                                    <input class="multisteps-form__input form-control " 
                                                    type="text"  name="product_length"  placeholder="Product length"/>
                                                </div>
                                            </div> 

                                            <div class="form-row mt-2">
                                                <div class="col-12 col-sm-12 mt-sm-0">
                                                    <textarea class="multisteps-form__input form-control " 
                                                    type="text" name="product_additional"  placeholder="Additional Remarks" 
                                                    rows="3"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="button-row d-flex mt-4">
                                        <button class="btn btn-outline-primary ml-3  mt-0 js-btn-prev" type="button" title="Prev">Prev</button>
                                        <button class="btn btn-success  ml-auto  js-btn-next" type="button" title="Next">Next</button>
                                        </div>
                                    </div>
                                </div>

                                <!-- ORDER_SPECIFICATIONS -->
                                <div id="specifications" class="multisteps-form__panel shadow p-5 rounded bg-white" data-animation="scaleIn">
                                    <h3 class="multisteps-form__title mt-3">SPECIFICATIONS</h3>
                                    <p>Please choose the specifications. </p>
                                    <div class="multisteps-form__content">
                                    <div class="form-row mt-4">

                                    <?php 
                                     $counter=1;
                                    foreach ($specs as $spec): ?>


                                        <div class="col-12 specifications-item col-sm-3 mt-sm-0 ">
                                            <span>
                                                <input value="<?php echo $spec['specification_id'];?>" name="specs[]" data-price="<?php echo $spec['specification_price'];?>" class="spec-item-js" id="<?php echo $spec['specification_id'];?>" type="checkbox"/>
                                                <label class="border rounded text-capitalize" for="<?php echo $spec['specification_id'];?>"> <?php echo $spec['specification_name'];?>
                                            </span>
                                        </div>
                                        <?php  $counter =  $counter +1;?>
                                    <?php endforeach; ?>
                                    </div>
                                        <div class="form-row mt-2">
                                            <div class="col-12 col-sm-12 mt-sm-0">
                                                <textarea name="specs_additonal" class="multisteps-form__input form-control " type="text" 
                                                placeholder="Additonal Specs?" 
                                                    rows="3"></textarea>
                                            </div>
                                        </div>
                                        <div class="button-row d-flex mt-4">
                                            <button class="btn btn-outline-primary   mt-0 js-btn-prev" type="button" title="Prev">Prev</button>
                                            <button class="btn btn-success  ml-auto  js-btn-next" type="button" title="Next">Next</button>
                                        </div>
                                    </div>
                                </div>

                                 <!-- MEASUREMENTS -->
                                 <div id="measurements"  class="multisteps-form__panel shadow p-5 rounded bg-white" data-animation="scaleIn">
                                    <h3 class="multisteps-form__title mt-3">MEASUREMENTS</h3>
                                    <div class="multisteps-form__content">
                                        <div class="form-row mt-4 ">
                                            <div class="form-group col-md-3 p-0">
                                                <label for="no_of_pieces"  class="mb-0" >No of Pieces</label>
                                                <input name="no_of_pieces" type="number" value="<?php echo @$measurement_db['no_of_pieces'] ?>"  class="form-control measurement mt-0" id="no_of_pieces" placeholder="No of Pieces">
                                            </div>
                                            <div class="form-group col-md-9 p-0 pl-2">
                                                <label for="embroidery" class="mb-0" >Embroidery</label>
                                                <input name="embroidery" type="text" class="measurement form-control mt-0" value="<?php echo @$measurement_db['embroidery'] ?>" id="embroidery" placeholder="Embroidery">
                                            </div>
                                        </div>
                                    <!-- MEASUREMENTS SHIRT -->
                                    <small  class="form-text text-muted"> Measurements (Shirt)</small>
                                        <div class="form-row mt-2 ">
                                            <div class="form-group col-md-3 pl-2 p-0">
                                                <label for="upper_length" class="mb-0" >Length</label>
                                                <input name="upper_length" type="number" value="<?php echo @$measurement_db['upper_length'] ?>"  class="form-control measurement mt-0" id="upper_length" placeholder="No of Pieces">
                                            </div>
                                            <div class="form-group col-md-3 pl-2 p-0">
                                                <label for="upper_chest" class="mb-0" >Chest</label>
                                                <input name="upper_chest" type="number" value="<?php echo @$measurement_db['upper_chest'] ?>"  class="form-control measurement mt-0" id="upper_chest" placeholder="No of Pieces">
                                            </div>
                                            <div class="form-group col-md-3 pl-2 p-0">
                                                <label for="upper_waist" class="mb-0" >Waist</label>
                                                <input name="upper_waist" type="number" value="<?php echo @$measurement_db['upper_waist'] ?>"  class="form-control measurement mt-0" id="upper_waist" placeholder="No of Pieces">
                                            </div>
                                            <div class="form-group col-md-3 pl-2 p-0">
                                                <label for="upper_hips" class="mb-0" >Hips</label>
                                                <input name="upper_hips" type="number" value="<?php echo @$measurement_db['upper_hips'] ?>"  class="form-control measurement mt-0" id="upper_hips" placeholder="No of Pieces">
                                            </div>
                                            <div class="form-group col-md-3 pl-2 p-0">
                                                <label for="upper_flair" class="mb-0" >Flair</label>
                                                <input name="upper_flair" type="number" value="<?php echo @$measurement_db['upper_flair'] ?>"  class="form-control measurement mt-0" id="upper_flair" placeholder="No of Pieces">
                                            </div>
                                            <div class="form-group col-md-3 pl-2 p-0">
                                                <label for="upper_hemline" class="mb-0" >Hemline</label>
                                                <input name="upper_hemline" type="number" value="<?php echo @$measurement_db['upper_hemline'] ?>"  class="form-control measurement mt-0" id="upper_hemline" placeholder="No of Pieces">
                                            </div>
                                            <div class="form-group col-md-3 pl-2 p-0">
                                                <label for="upper_sleeves" class="mb-0" >Sleeves</label>
                                                <input name="upper_sleeves" type="number" value="<?php echo @$measurement_db['upper_sleeves'] ?>"  class="form-control measurement mt-0" id="upper_sleeves" placeholder="No of Pieces">
                                            </div>
                                            <div class="form-group col-md-3 pl-2 p-0">
                                                <label forfor="upper_neck_line"s="mb-0" >Neck Line</label>
                                                <input name="upper_neck_line" type="number" value="<?php echo @$measurement_db['upper_neck_line'] ?>"  class="form-control measurement mt-0" id="upper_neck_line" placeholder="No of Pieces">
                                            </div>
                                        </div>

                                        
                                        <div class="button-row d-flex mt-4">

                                        <button class="btn btn-outline-primary   mt-0 js-btn-prev" type="button" title="Prev">Prev</button>

                                            <button class="btn btn-success  ml-auto  js-btn-next" type="button" title="Next">Next</button>
                                        </div>

                                    </div>
                                </div>

                                <div id="measurements"  class="multisteps-form__panel shadow p-5 rounded bg-white" data-animation="scaleIn">
                                    <h3 class="multisteps-form__title mt-3">MEASUREMENTS</h3>
                                    <div class="multisteps-form__content">
                                      
                                        <small  class="form-text text-muted"> Measurements (Shalwar / Pants)</small>
                                        <div class="form-row mt-2 ">
                                            <div class="form-group col-md-3 pl-2 p-0">
                                                <label for="lower_length" class="mb-0" >Length</label>
                                                <input name="lower_length"  type="number" value="<?php echo @$measurement_db['lower_length'] ?>"  class="form-control measurement mt-0" id="lower_length" placeholder="No of Pieces">
                                            </div>
                                            <div class="form-group col-md-3 pl-2 p-0">
                                                <label for="lower_poocha" class="mb-0" >Poocha</label>
                                                <input name="lower_poocha" type="number" value="<?php echo @$measurement_db['lower_poocha'] ?>"  class="form-control measurement mt-0" id="lower_poocha" placeholder="No of Pieces">
                                            </div>
                                            <div class="form-group col-md-3 pl-2 p-0">
                                                <label for="lower_thy" class="mb-0" >Thy</label>
                                                <input name="lower_thy" type="number" value="<?php echo @$measurement_db['lower_thy'] ?>"  class="form-control measurement mt-0" id="lower_thy" placeholder="No of Pieces">
                                            </div>
                                            <div class="form-group col-md-3 pl-2 p-0">
                                                <label for="lower_waist" class="mb-0" >Waist</label>
                                                <input name="lower_waist" type="number" value="<?php echo @$measurement_db['lower_waist'] ?>"  class="form-control measurement mt-0" id="lower_waist" placeholder="No of Pieces">
                                            </div>
                                            <div class="form-group col-md-3 pl-2 p-0">
                                                <label for="lower_hips" class="mb-0" >Hips</label>
                                                <input name="lower_hips" type="number" value="<?php echo @$measurement_db['lower_hips'] ?>"  class="form-control measurement mt-0" id="lower_hips" placeholder="No of Pieces">
                                            </div>
                                        </div>
                                        <?php  if(@$customer['cust_id']){
                                        echo '<div class="form-row my-2">
                                            <div class="col-12 col-sm-12 mt-sm-0">
                                                <div class="custom-control custom-checkbox d-inline">
                                                    <input type="checkbox" class="custom-control-input" name="measurements_changed" id="customCheck" >
                                                    <label class="custom-control-label" for="customCheck">Did you changed any value for measurements?</label>
                                                </div>
                                            </div>
                                            </div>';
                                        }?>
                                        <small  class="form-text text-muted"> Additonal</small>

                                        <div class="form-row mt-2">
                                            <div class="col-12 col-sm-12 mt-sm-0">
                                                <textarea class="multisteps-form__input form-control  " name="measurement_additonal" type="text" placeholder="Additional" 
                                                    rows="3"></textarea>
                                            </div>
                                            </div>
                                            
                               
                                       
                                        <div class="button-row d-flex mt-4">

                                        <button class="btn btn-outline-primary   mt-0 js-btn-prev" type="button" title="Prev">Prev</button>

                                            <button class="btn btn-success  ml-auto  js-btn-next" type="button" title="Next">Next</button>
                                        </div>

                                    </div>
                                </div>
                        
                                 <!-- COMPLETE ORDER -->
                                 <div  class="multisteps-form__panel shadow p-5 rounded bg-white" data-animation="scaleIn">
                                    <h3 class="multisteps-form__title mt-3">PLACE ORDER</h3>
                                    <p class="text-primary">We are happy to see you here. </p>
                                    <div class="multisteps-form__content">
                                        <div class="row mt-2">
                                            <div class="col-md-5 border bg-success  border-success rounded d-flex">
                                                <div style="font-size:30px;  font-weight:200" class=" bg-success  
                                                text-center mx-auto   my-auto text-dark border-0" ><span class="final-price">0</span>/=</div>
                                            </div>
                                            
                                            <div class="col-md-7">

                                                <div class="form-row ">
                                                    <div class="col-12 form-group  col-sm-12">
                                                        <label class= "text-primary" for="order_date">Order Date</label>
                                                        <input id="order_date" class="multisteps-form__input form-control " disabled value='<?php echo date('Y-m-d');?>' type="date" placeholder="Full Name"/>
                                                    </div>
                                                 </div>

                                                 <div class="form-row ">
                                                    <div class="col-12 form-group  col-sm-12">
                                                        <label class= "text-primary" for="delivery_date">Delivery Date</label>
                                                        <input id="delivery_date" name="delivery_date" class="multisteps-form__input form-control " value="<?php echo $delivery_date;?>" type="date" placeholder="Full Name"/>
                                                    </div>
                                                 </div>

                                                 <div class="form-row  form-group mt-1">
                                                    <div class="col-12 col-sm-12">
                                                         <label class="text-primary" for="order_price">Order final price</label>
                                                        <input name="order_price" id="order_price"  class="multisteps-form__input form-control" type="number" placeholder="Final Price"/>
                                                    </div>
                                                 </div>
                                                 <div class="form-row  form-group mt-1">
                                                    <div class="col-12 col-sm-12">
                                                         <label class="text-primary" for="advance_money">Advance</label>
                                                        <input name="advance_money" id="advance_money" class="multisteps-form__input form-control" type="number" placeholder="Advance Recieved"/>
                                                    </div>
                                                 </div>
                                            </div>

                                        </div>
                                        <div class="button-row d-flex mt-4">
                                            <button class="btn btn-outline-primary   mt-0 js-btn-prev" type="button" title="Prev">Prev</button>
                                            <button class="btn btn-success  ml-auto" type="submit" title="Complete order">Place Order</button>
                                        </div>
                                    </div>
                                </div>

                                </form>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
         </div>
        </div>
    </header>
 


</body>
<?php include '../includes/scripts.php' ?>

<script>
var final_price =0;
$('.spec-item-js').change(function(){
    final_price =0
    $('.spec-item-js:checkbox:checked').each(function(){
        final_price = final_price+parseInt($(this).data('price'));
    })
    $('#order_price').val(final_price);
    $('.final-price').html(final_price);
});
$('#order_price').change(function(){
    if(this.value <final_price){
        if(confirm("Are you sure to go with this price?")){
            $('.final-price').html(this.value);
        }else{
            $('#order_price').val(final_price);
             $('.final-price').html(final_price);
        }
    }else{
        $('#order_price').val(this.value);
             $('.final-price').html(this.value);
    }
   
})
<?php  if(@$customer['cust_id']){
?>
$('.measurement').change(function(){
    $('#customCheck').prop('checked',true);
})
<?php }?>
</script>


