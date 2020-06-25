

<style>
.sidebar img{
    margin-top: -17px;
    margin-bottom: 15px;

}
</style>
<div class="sidebar">
      <div class="text-center">
      <img src="/assests/img/tailor.svg" alt="">
      </div>
        <ul>
            <li ><a href="/users/admin/" class=" streched-link"><i class="fa fa-home"></i> &nbsp;Dashboard</a></li>
            <li
             <?php echo (CURRENT_PAGE == 'Specs.php' || CURRENT_PAGE == 'add_specs.php') ? 'class="active"' : ''; ?> >
                <a class=" streched-link" href="/users/admin/admin-items/Specs/Specs.php">
                    <i class="fa fa-list"></i> &nbsp;Specifications
                </a>
            </li>

            <li
            <?php echo (CURRENT_PAGE == 'Customers.php' || CURRENT_PAGE == 'add_cust.php') ? 'class="active"' : ''; ?>
            ><a class=" streched-link" href="/users/admin/admin-items/Customers/Customers.php">
            <i class="fa fa-user-circle-o"></i>&nbsp; Customers</a></li>

            <li
            <?php echo (CURRENT_PAGE == 'New-Orders.php' ) ? 'class="active"' : ''; ?>
            ><a class=" streched-link" href="/users/admin/admin-items/Orders/New-Orders.php">
            <i class="fa fa-shopping-cart"></i>&nbsp; New Orders</a></li>

            <li
            <?php echo (CURRENT_PAGE == 'Processing-Orders.php') ? 'class="active"' : ''; ?>
            ><a class=" streched-link" href="/users/admin/admin-items/Orders/Processing-Orders.php">
            <i class="fa fa-hourglass-start"></i>&nbsp; Processing Order</a></li>
            
            <li
            <?php echo (CURRENT_PAGE == 'Completed-Orders.php') ? 'class="active"' : ''; ?>
            ><a class=" streched-link" href="/users/admin/admin-items/Orders/Completed-Orders.php">
            <i class="fa fa-hourglass-end"></i>&nbsp; Completed Order</a></li>
            

            <li
            <?php echo (CURRENT_PAGE == 'staff-members.php' || CURRENT_PAGE == 'add_staff.php' ) ? 'class="active"' : ''; ?>
            ><a class=" streched-link" href="/users/admin/admin-items/Staff/staff-members.php">
            <i class="fa fa-building-o"></i>&nbsp; Staff Members</a></li>

            <li
            <?php echo (CURRENT_PAGE == 'artisens.php') ? 'class="active"' : ''; ?>
            ><a class=" streched-link" href="/users/admin/admin-items/Stats/artisens.php">
            <i class="fa fa-pagelines"></i>&nbsp; Artisens</a></li>

            <li
            <?php echo (CURRENT_PAGE == 'sales.php' ) ? 'class="active"' : ''; ?>
            ><a class=" streched-link" href="/users/admin/admin-items/Sales/sales.php">
            <i class="fa fa-line-chart"></i>&nbsp; Sales</a></li>

            <li
            <?php echo (CURRENT_PAGE == 'settings.php' ) ? 'class="active"' : ''; ?>
            ><a class=" streched-link" href="/users/admin/admin-items/settings.php">
            <i class="fa fa-gear"></i> &nbsp;Settings</a></li>



            <li
            <?php echo (CURRENT_PAGE == 'logout.php' ) ? 'class="active"' : ''; ?>
            ><a class=" streched-link" href="/users/admin/logout.php">
            <i class="fa fa-arrow-circle-o-left"></i>&nbsp; Logout</a></li>

           


           
        </ul> 
        
    </div>