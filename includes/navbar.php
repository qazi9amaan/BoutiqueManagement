<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-primary" id="navbar1">
        <div class="container">
            <a class="navbar-brand mr-1 mb-1 mt-0" href="/index.php">SPLASH BOUTIQUE</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsingNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse collapse justify-content-center" id="collapsingNavbar">
                
                <ul class="navbar-nav ml-auto">
                  
                    
                  

                    <?php if(!isset($_SESSION['staff_member_logged_in'])){?>
                        <li class="nav-item">
                        <a class="nav-link" href="#grid">Login to your account</a>
                    </li>
                    <?php }else{?>
                        <li class="nav-item">
                        <a class="nav-link" href="/main-page.php"> New Order</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/users/managers/items/delivery-orders.php"> Deliver Outs</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/users/managers/items/assign-order.php">Assign Order</a>
                        </li>
                        <li class="nav-item">
                        
                            <a class="nav-link" href="<?php
                            if (isset($_SESSION['staff_account_type']) && $_SESSION['staff_account_type'] === 'admin')
                            {
                                echo '/users/admin/';

                            } if (isset($_SESSION['staff_account_type'])   && $_SESSION['staff_account_type'] === 'manager')
                            {
                                echo '/users/managers/';


                            } if (isset($_SESSION['staff_account_type']) && $_SESSION['staff_account_type'] == "artisen")
                            {
                                echo '/users/artisen/';
                            }
                            ?>">My Account</a>
                        </li>
                        <li class="nav-item">
                                <a class="nav-link" href="/logout.php">Logout</a>
                            </li>
                   <?php }?>
                   
                </ul>
            </div>
        </div>
    </nav> 