<?php session_start();?>
<?php require_once '/var/www/html/libraries/config/config.php';?>
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
                    <li class="breadcrumb-item active" aria-current="page">Specifications</li>
                </ol>
            </nav>
            <a href="add_specs.php" title="Add a new Specification" class="btn-primary  btn-sm"><i class="fa fa-plus"></i> Add New</a>
        </div>  


        <div class="info mx-1 mt-2">
            <div class="container-fluid">
                <div class="row ">
                    <div class="card-body">
                         <!-- SEARCHING -->
                        <div class=" d-flex pt-3  card-footer bg-primary text-white rounded border justify-content-between align-items-baseline ">
                            <h4 class="text-uppercase  lead">Specifications</h4>
                        </div>
                        <!-- SEARCHING -->
                        <div class="card-header mx-auto d-flex rounded justify-content-center text-center border mt-3">
                                <form class="form form-inline" action="">
                                        <label class="mx-1" for="input_search">Search</label>
                                        <input type="text" class="mx-1 mt-md-1 form-control" 
                                        id="input_search" name="search_str" >

                                        <label class="mx-1 " for="input_order">Order By</label>
                                        <select name="order_by  " class="form-control mt-md-1 mx-1">
                                        </select>

                                        <select name="order_dir" class="form-control mx-1 mt-1" id="input_order">
                                        </select>

                                         <input type="submit" value="Go" class="btn btn-primary mt-1">
                                </form>
                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                    <div class="table-responsive  px-2 ">
                        <table class="table bg-white table-bordered  table-sm  ">
                            <thead class="thead-light">
                            <tr >
                                    <th width="5%" class="w-5">Id</th>
                                    <th width="50%" class="w-60">Name</th>
                                    <th width="25%" class="w-25">Price</th>
                                    <th width="20%" class="w-10">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                               
                                <tr>
                                    <td>1</td>
                                    <td class=>Jeans    </td>
                                    <td>2323</td>
                                    <td >
                                        <a href="#" class="btn btn-success btn-sm mx-2 mt-md-0 mt-1 "><i class="fa fa-eye"></i> View  </a>
                                        <a href="#" class="btn btn-danger btn-sm mx-2 ml-md-0 mt-md-0  mt-1"><i class="fa fa-times"></i> Delete</a>

                                    </td>

                                </tr>
                            
                               
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
