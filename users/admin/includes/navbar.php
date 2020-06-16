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
            <?php echo (CURRENT_PAGE == 'staff-members.php' || CURRENT_PAGE == 'add_staff.php' ) ? 'class="active"' : ''; ?>
            ><a class=" streched-link" href="/users/admin/admin-items/Staff/staff-members.php">
            <i class="fa fa-building-o"></i>&nbsp; Staff Members</a></li>


            <li><a class=" streched-link" href="#"><i class="fas fa-project-diagram"></i>portfolio</a></li>
            <li><a class=" streched-link" href="#"><i class="fas fa-blog"></i>Blogs</a></li>
            <li><a class=" streched-link" href="#"><i class="fas fa-address-book"></i>Contact</a></li>
            <li><a class=" streched-link" href="#"><i class="fas fa-map-pin"></i>Map</a></li>
        </ul> 
        
    </div>