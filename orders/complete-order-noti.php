<?php session_start(); ?>
<?php require_once '../libraries/config/config.php'; ?>
<?php include '../includes/header.php'; ?>
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
            <a href="/index" class="btn btn-success">Home </a>
            <a class="btn btn-success" id="print-bill-btn">Print</a>            
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
                            <span class=""> No.</span>
                            <span class=" font-weight-bold">10</span>
                        </span></small>
                       <small>
                       <span>
                            <span class=""> Dated.</span>
                            <span class=" font-weight-bold"><?php echo date('d-m-y')?></span>
                        </span>
                       </small>
                    </div>
                    <div class="d-flex  justify-content-between align-items-center">
                       <small>
                       <span>
                            <span class=""> M/s</span>&nbsp;
                            <span class=" font-weight-bold">Qazi Amaan yousuf</span>
                        </span>
                       </small>
                        <small>
                            <span class=""> Delivery.</span>
                            <span class=" font-weight-bold">22-06-20</span>
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
                            <span style="background:#999" class="p-0 ml-2 rounded px-5 border"></span>
                            </span>
                            <span>
                                <span class=""> Length.</span>
                                <span class=" font-weight-light">10m</span>
                            </span>
                        </div>
                    </small>

                    <!-- SPECS -->
                    <small class="font-weight-bold">Specifications</small>
                    <small>
                        <div class="d-flex my-2  justify-content-between align-items-center">
                            <span>1. Pant</span>
                            <span>
                                <span>500</span>
                                /=
                            </span>
                        </div>
                    </small>

                    <small>
                        <div class="d-flex my-2  justify-content-between align-items-center">
                            <span>2. Pant</span>
                            <span>
                                <span>500</span>
                                /=
                            </span>
                        </div>
                    </small>
                    <small>
                        <div class="d-flex my-2  justify-content-between align-items-center">
                            <span>3. Pant</span>
                            <span>
                                <span>500</span>
                                /=
                            </span>
                        </div>
                    </small>
                   
                    <!-- Additionals -->
                    <small class="font-weight-bold">Additionals</small>
                    <small>
                        <p class="text-justify">
                            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quasi omnis modi, pariatur doloribus libero, in dolorem minima aliquid quia similique, natus nisi!
                        </p>
                    </small>

                    <!-- Billing -->
                    <small class="font-weight-bold">Billing</small>
                    <small>
                        <div class="d-flex my-2   justify-content-between  align-items-center">
                                <span class="">Specifications</span>
                                <span class="">1500/=</span>
                        </div>
                        <div class="d-flex my-2   justify-content-between  align-items-center">
                                <span class="">Final price</span>
                                <span class="font-weight-bold">1400/=</span>
                        </div>
                        <div class="d-flex my-2   justify-content-between  border-bottom pb-3 align-items-center">
                                <span class="">Advance</span>
                                <span class="">200/=</span>
                        </div>
                        <div class="d-flex my-2   justify-content-between pb-2 align-items-center">
                                <span class="">Pending</span>
                                <span class="font-weight-bold">1200/=</span>
                        </div>
                        <small>
                            <p>
                             Dear customer, we are more then happpy to serve you here, please visit the boutique on
                         <strong>22-06-20</strong> to collect your order.
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
                ** FOR OFFICIAL USE ONLY <strong>ORD-111</strong> **
            </div>
            <div class="card-body">
                <small>
                    <div class="d-flex justify-content-between">
                        <strong><span>ORDER ID: <b>111</b> </span></strong>
                        <span>CUSTOMER ID: <b>1</b> </span> 

                    </div>
                    <div class="d-flex justify-content-between mt-1">
                        <span>Recieved On: <b> 15-06-20</b> </span> 
                        <span>Delivery: <b>22-06-20</b> </span>
                    </div>

                    <div class="d-flex justify-content-between mt-2 pb-1">
                        <span class="d-flex">Color:                             
                            <span style="background:#999" class="p-0 ml-2 px-5 rounded px-2 border"></span>
                        </span> 
                        <span>Product length: <b>50m</b> </span>
                    </div>
                    <hr>

                    <div class="measurements">
                            <strong> <p>Measurements</p></strong>

                            <div class="d-flex justify-content-between">
                            <span class="measurement"> No of Pieces <span> 2</span></span>
                            <span class="measurement">Embroidery <span> 11  </span></span>
                            <span class="measurement">Length <span> </span></span>
                            </div>
                            <div class="d-flex justify-content-between">
                            <span class="measurement">Chest <span></span></span>
                            <span class="measurement">Waist <span></span></span>
                            <span class="measurement">Hips <span></span></span>
                            </div>
                            <div class="d-flex justify-content-between">
                            <span class="measurement">Flair <span></span></span>
                            <span class="measurement">Hemline <span></span></span>
                            <span class="measurement">Sleeves <span></span></span>
                            </div>
                            <div class="d-flex justify-content-between">
                            <span class="measurement">Neck Line  <span> </span></span>
                            <span class="measurement">Length <span></span></span>
                            <span class="measurement">Poocha <span></span></span>
                          </div>
                           <div class="d-flex justify-content-between"> 
                            <span class="measurement">Thy <span></span></span>
                            <span class="measurement">Waist <span></span></span>
                            <span class="measurement">Hips <span></span></span>
                         </div>
                    </div>
                
                    <hr>
                    <div class="specs">
                        <strong>Specifications</strong>
                       <p class="text-justify mt-1">
                            <span class="font-weight-bold  pr-4">Pants</span>
                            <span class="font-weight-bold  pr-4">Pants</span>
                            <span class="font-weight-bold  pr-4">Pants</span>
                       </p>

                    </div>
                    <hr>
                    <div class="extra">
                    <strong>Additonals</strong>
                        <p class="text-justify mt-0">
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quasi omnis modi, pariatur doloribus libero, in dolorem minima aliquid quia similique, natus nisi!                         </p>
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
                                <span  class="px-5 border-bottom text-muted">Recieved</span>
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

$('#print-bill-btn').click(function(){
    $('#print-bill').attr("class","col-6  border rounded p-4");
        $('#print-offical-details').attr("class","col-6 ");

    window.print();

});


</script>

