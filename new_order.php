<?php include 'includes/header.php'; ?>
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
                    <a id="page-header" href="#" class="display-1  text-white text-hov-white">SPLASH </a>
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
                                <form class="multisteps-form__form">
                                    
                                <!--CUSTOMER DETAILS-->
                                <div class="multisteps-form__panel shadow p-5 rounded bg-white js-active" data-animation="scaleIn">
                                    <h3 class="multisteps-form__title">CUSTOMER DETAILS</h3>
                                    <div class="multisteps-form__content">
                                    <div class="form-row mt-4">
                                            <div class="col-12 col-sm-6">
                                                <input class="multisteps-form__input form-control " type="text" placeholder="Full Name"/>
                                            </div>
                                            <div class="col-12 col-sm-6 mt-2 mt-sm-0">
                                                <input class="multisteps-form__input form-control " type="number" placeholder="Phone Number"/>
                                            </div>
                                           </div>
                                            <div class="form-row mt-2">
                                                <div class="col-12 col-sm-12  mt-sm-0">
                                                    <select class="form-control">
                                                        <option default>Choose gender</option>
                                                        <option>Male</option>
                                                        <option>Female</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-row mt-2">
                                            
                                            <div class="col-12 col-sm-12 mt-sm-0">
                                                <textarea class="multisteps-form__input form-control " type="text" placeholder="Address" 
                                                    rows="5"></textarea>
                                            </div>
                                            </div>
                                            
                                            <div class="button-row d-flex mt-4">
                                            <button class="btn btn-success  ml-auto  js-btn-next" type="button" title="Next">Next</button>
                                            </div>
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
                                            <div class="form-row mt-2">
                                                <div class="col-12 col-sm-12 mt-sm-0">
                                                <input class="multisteps-form__input form-control " 
                                                type="text" placeholder="Product Color"/>
                                                </div>
                                            </div>
                                        
                                            <div class="form-row mt-2">
                                                <div class="col-12 col-sm-12 mt-sm-0">
                                                    <input class="multisteps-form__input form-control " 
                                                    type="text" placeholder="Product length"/>
                                                </div>
                                            </div> 

                                            <div class="form-row mt-2">
                                                <div class="col-12 col-sm-12 mt-sm-0">
                                                    <textarea class="multisteps-form__input form-control " 
                                                    type="text" placeholder="Additional Remarks" 
                                                    rows="5"></textarea>
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

                                        <div class="col-12 specifications-item col-sm-3 mt-sm-0 ">
                                            <span>
                                                <input id="Pants" type="checkbox"/>
                                                <label class="border rounded text-capitalize" for="Pants"> Pants
                                                <i for="foo" class="fa fa-check" aria-hidden="true"></i>                                                </label>
                                            </span>
                                        </div>

                                        <div class="col-12 specifications-item col-sm-3 mt-sm-0 ">
                                            <span>
                                                <input id="Shirts" type="checkbox"/>
                                                <label class="border rounded text-capitalize" for="Shirts">Shirts
                                                <i for="foo" class="fa fa-check" aria-hidden="true"></i>                                                </label>
                                            </span>
                                        </div>

                                        <div class="col-12 specifications-item col-sm-3 mt-sm-0 ">
                                            <span>
                                                <input id="Lengha" type="checkbox"/>
                                                <label class="border rounded text-capitalize" for="Lengha">Lengha
                                                <i for="foo" class="fa fa-check" aria-hidden="true"></i>                                                </label>
                                            </span>
                                        </div>
                                        <div class="col-12 specifications-item col-sm-3 mt-sm-0 ">
                                            <span>
                                                <input id="Lengha1" type="checkbox"/>
                                                <label class="border rounded text-capitalize" for="Lengha1">Lengha
                                                <i for="foo" class="fa fa-check" aria-hidden="true"></i>                                                </label>
                                            </span>
                                        </div>
                                        <div class="col-12 specifications-item col-sm-3 mt-sm-0 ">
                                            <span>
                                                <input id="2" type="checkbox"/>
                                                <label class="border rounded text-capitalize" for="2">Lengha
                                                <i for="foo" class="fa fa-check" aria-hidden="true"></i>                                                </label>
                                            </span>
                                        </div>
                                        <div class="col-12 specifications-item col-sm-3 mt-sm-0 ">
                                            <span>
                                                <input id="3" type="checkbox"/>
                                                <label class="border rounded text-capitalize" for="3">Lengha
                                                <i for="foo" class="fa fa-check" aria-hidden="true"></i>                                                </label>
                                            </span>
                                        </div>
                                        <div class="col-12 specifications-item col-sm-3 mt-sm-0 ">
                                            <span>
                                                <input id="4" type="checkbox"/>
                                                <label class="border rounded text-capitalize" for="4">Lengha
                                                <i for="foo" class="fa fa-check" aria-hidden="true"></i>                                                </label>
                                            </span>
                                        </div>
                                        <div class="col-12 specifications-item col-sm-3 mt-sm-0 ">
                                            <span>
                                                <input id="5" type="checkbox"/>
                                                <label class="border rounded text-capitalize" for="5">Lengha
                                                <i for="foo" class="fa fa-check" aria-hidden="true"></i>                                                </label>
                                            </span>
                                        </div>
                                        <div class="col-12 specifications-item col-sm-3 mt-sm-0 ">
                                            <span>
                                                <input id="5" type="checkbox"/>
                                                <label class="border rounded text-capitalize" for="5">Lengha
                                                <i for="foo" class="fa fa-check" aria-hidden="true"></i>                                                </label>
                                            </span>
                                        </div>
                                        <div class="col-12 specifications-item col-sm-3 mt-sm-0 ">
                                            <span>
                                                <input id="6" type="checkbox"/>
                                                <label class="border rounded text-capitalize" for="6">Lengha
                                                <i for="foo" class="fa fa-check" aria-hidden="true"></i>                                                </label>
                                            </span>
                                        </div>
                                        <div class="col-12 specifications-item col-sm-3 mt-sm-0 ">
                                            <span>
                                                <input id="67" type="checkbox"/>
                                                <label class="border rounded text-capitalize" for="67">Lengha
                                                <i for="foo" class="fa fa-check" aria-hidden="true"></i>                                                </label>
                                            </span>
                                        </div>


                                    </div>
                                        <div class="form-row mt-2">
                                            <div class="col-12 col-sm-12 mt-sm-0">
                                                <textarea class="multisteps-form__input form-control " type="text" 
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
                                                <label for="pieces" class="mb-0" >No of Pieces</label>
                                                <input type="number" class="form-control mt-0" id="pieces" placeholder="No of Pieces">
                                            </div>
                                            <div class="form-group col-md-9 p-0 pl-2">
                                                <label for="Embroidery" class="mb-0" >Embroidery</label>
                                                <input type="text" class="form-control mt-0" id="pieces" placeholder="Embroidery">
                                            </div>
                                        </div>
                                    <!-- MEASUREMENTS SHIRT -->
                                    <small  class="form-text text-muted"> Measurements (Shirt)</small>
                                        <div class="form-row mt-2 ">
                                            <div class="form-group col-md-3 pl-2 p-0">
                                                <label for="pieces" class="mb-0" >Length</label>
                                                <input type="number" class="form-control mt-0" id="pieces" placeholder="No of Pieces">
                                            </div>
                                            <div class="form-group col-md-3 pl-2 p-0">
                                                <label for="pieces" class="mb-0" >Chest</label>
                                                <input type="number" class="form-control mt-0" id="pieces" placeholder="No of Pieces">
                                            </div>
                                            <div class="form-group col-md-3 pl-2 p-0">
                                                <label for="pieces" class="mb-0" >Waist</label>
                                                <input type="number" class="form-control mt-0" id="pieces" placeholder="No of Pieces">
                                            </div>
                                            <div class="form-group col-md-3 pl-2 p-0">
                                                <label for="pieces" class="mb-0" >Hips</label>
                                                <input type="number" class="form-control mt-0" id="pieces" placeholder="No of Pieces">
                                            </div>
                                            <div class="form-group col-md-3 pl-2 p-0">
                                                <label for="pieces" class="mb-0" >Flair</label>
                                                <input type="number" class="form-control mt-0" id="pieces" placeholder="No of Pieces">
                                            </div>
                                            <div class="form-group col-md-3 pl-2 p-0">
                                                <label for="pieces" class="mb-0" >Hemline</label>
                                                <input type="number" class="form-control mt-0" id="pieces" placeholder="No of Pieces">
                                            </div>
                                            <div class="form-group col-md-3 pl-2 p-0">
                                                <label for="pieces" class="mb-0" >Sleeves</label>
                                                <input type="number" class="form-control mt-0" id="pieces" placeholder="No of Pieces">
                                            </div>
                                            <div class="form-group col-md-3 pl-2 p-0">
                                                <label for="pieces" class="mb-0" >Neck Line</label>
                                                <input type="number" class="form-control mt-0" id="pieces" placeholder="No of Pieces">
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
                                                <label for="pieces" class="mb-0" >Length</label>
                                                <input type="number" class="form-control mt-0" id="pieces" placeholder="No of Pieces">
                                            </div>
                                            <div class="form-group col-md-3 pl-2 p-0">
                                                <label for="pieces" class="mb-0" >Poocha</label>
                                                <input type="number" class="form-control mt-0" id="pieces" placeholder="No of Pieces">
                                            </div>
                                            <div class="form-group col-md-3 pl-2 p-0">
                                                <label for="pieces" class="mb-0" >Thy</label>
                                                <input type="number" class="form-control mt-0" id="pieces" placeholder="No of Pieces">
                                            </div>
                                            <div class="form-group col-md-3 pl-2 p-0">
                                                <label for="pieces" class="mb-0" >Waist</label>
                                                <input type="number" class="form-control mt-0" id="pieces" placeholder="No of Pieces">
                                            </div>
                                            <div class="form-group col-md-3 pl-2 p-0">
                                                <label for="pieces" class="mb-0" >Hips</label>
                                                <input type="number" class="form-control mt-0" id="pieces" placeholder="No of Pieces">
                                            </div>
                                        </div>
                                        <small  class="form-text text-muted"> Additonal</small>

                                        <div class="form-row mt-2">
                                            <div class="col-12 col-sm-12 mt-sm-0">
                                                <textarea class="multisteps-form__input form-control " type="text" placeholder="Additional" 
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
                                    <p>We are happy to see you here. </p>
                                    <div class="multisteps-form__content">
                                        <div class="row mt-2">
                                            <div class="col-md-5 d-flex">
                                                <div style="font-size:20px;" class=" bg-success  
                                                text-center mx-auto rounded-circle p-5 text-dark border-0" >₹500</div>
                                            </div>
                                            <div class="col-md-7">
                                                <div class="form-row mt-2">
                                                    <div class="col-12 col-sm-12">
                                                        <input class="multisteps-form__input form-control " disabled value='<?php echo date('Y-m-d');?>' type="date" placeholder="Full Name"/>
                                                    </div>
                                                 </div>
                                                 <div class="form-row mt-1">
                                                    <div class="col-12 col-sm-12">
                                                        <input class="multisteps-form__input form-control " type="text" placeholder="Discount"/>
                                                    </div>
                                                 </div>
                                            </div>

                                        </div>
                                        <div class="button-row d-flex mt-4">
                                            <button class="btn btn-outline-primary   mt-0 js-btn-prev" type="button" title="Prev">Prev</button>
                                            <button class="btn btn-success  ml-auto  js-btn-next" type="button" title="Next">Place Order</button>
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
<?php include 'includes/scripts.php' ?>
