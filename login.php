<?php 
session_start();
require_once 'libraries/config/config.php';

if (isset($_SESSION['staff_member_logged_in']) && $_SESSION['staff_member_logged_in'] === TRUE)
{
	header('Location: libraries/helpers/choose_staff_panel.php');
}

?>

<?php include 'includes/header.php'; ?>
<body >
    
    <header class="bg-primary">
    <section class="container">

                                 
            <div class="row vh-100">
                <div class="col-12 mt-5">
                <div class="row">
                <div class="col-12">
                <?php if (isset($_SESSION['login_failure'])): ?>
                    <div class="alert-primary p-2 mb-4 rounded alert-dismissable show ">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Failure! </strong>
                        <?php
                        echo $_SESSION['login_failure'];
                        unset($_SESSION['login_failure']);
                        ?>
                    </div>
                <?php endif; ?>  
                </div>
                </div>
                    <div class="row text-center">
                        <div class="col-lg-5 offset-lg-3  mb-4">
                            <div class="card bg-success shadow h-100">
                                <div class="card-body container p-5 d-flex flex-column justify-content-center align-items-center ">
                                    <h1 class="display-2 text-dark"><span class="ion ion-ios-tablet-portrait-outline"></span></h1>
                                    <h4 class="card-title text-dark">SPLASH BOUTIQUE.</h4>
                                    <p class="lead text-justify px-4">You must enter your phone number  to login to the server.</p>
                                    <form method="POST" action="/libraries/helpers/authenticate.php">
                                    <div class="input-group mb-1 mt-2">
                                        <input type="text" name="phone_number" class="form-control form-control-lg" placeholder="Phone number">
                                    </div>
                                    <div class="input-group mb-2 mt-1">
                                        <input type="text" name="password" class="form-control form-control-lg" placeholder="Password">
                                    </div>
                                    <button type="submit" class="btn btn-dark mt-auto btn-block">Authenticate</button>
                                    <p class="text-muted mt-3">Dear user, this gateway  proceeds you towards a secure system of the splash boutiques.</p>
                                    </form>

                                </div>
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>
        </section>
    </header>


</body>
<?php include 'includes/scripts.php' ?>
