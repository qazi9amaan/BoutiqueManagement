<?php 
    session_start();
    require_once 'libraries/config/config.php';
?>
<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
	$username = filter_input(INPUT_POST, 'phone_number');
	$db = getDbInstance();
	$db->where('cust_phone_number', $username);
	$row = $db->getOne('customer');
	if ($db->count >= 1)
    {
			header('Location:  /users/customers/index.php?s=registered&number='.$username.'&id='.$row['cust_id'].'&usr='.$row['cust_name']);
	}
    else
    {
        header('Location:  /users/customers/index.php?s=new&number='.$username);
		exit;
	}
}


?>
<?php include 'includes/header.php'; ?>
<body>
<?php include 'includes/navbar.php' ;?>    
<header class="bg-primary">
        <div class="container h-100">
            <div class="row h-100">
                <div class="col-12">
                    <div class="text-center m-0 vh-100 d-flex flex-column justify-content-center text-light">
                        <h1 style="letter-spacing:5px" class="display-4">SPLASH FASHION</h1>
                        <p class="lead">"People will stare, make it worth their while."</p>
                        <form action="" method="POST">
                        <div class="row">
                            <div class="col-lg-4 col-sm-6 mx-auto">
                                <div class="input-group mb-3">
                                  <input type="number" name="phone_number" class="form-control form-control-lg" placeholder="Customer phone number">
                                </div>
                            </div>
                        </div>
                        <div class="mt-2 mx-auto">
                            <button type="submit" class="btn btn-lg btn-success">Continue</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </header>
</body>
<?php include 'includes/scripts.php' ?>
