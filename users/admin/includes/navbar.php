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

            <li><a class=" streched-link" href="#"><i class="fas fa-address-card"></i>About</a></li>
            <li><a class=" streched-link" href="#"><i class="fas fa-project-diagram"></i>portfolio</a></li>
            <li><a class=" streched-link" href="#"><i class="fas fa-blog"></i>Blogs</a></li>
            <li><a class=" streched-link" href="#"><i class="fas fa-address-book"></i>Contact</a></li>
            <li><a class=" streched-link" href="#"><i class="fas fa-map-pin"></i>Map</a></li>
        </ul> 
        
    </div>