<fieldset>
    <div class="form-group">
        <label for="cust_name">Staff Name *</label>
          <input type="text" name="full_name" 
          value="<?php echo htmlspecialchars($edit ? $staff['full_name'] : '', ENT_QUOTES, 'UTF-8'); ?>" placeholder="Staff Name " class="form-control" 
          required="required" id = "cust_name">
    </div> 

    <div class="form-group">
        <label for="cust_phone_number">Staff Phone Number *</label>
          <input type="number" name="phone_number" value="<?php echo htmlspecialchars($edit ? $staff['phone_number'] : '', ENT_QUOTES, 'UTF-8'); ?>" placeholder="Staff Phone Number " class="form-control" required="required" id = "cust_phone_number">
    </div>
    <div class="form-group">
        <label for="adhaar">Staff Adhaar Number *</label>
          <input type="number" name="adhaar_card" value="<?php echo htmlspecialchars($edit ? $staff['adhaar_card'] : '', ENT_QUOTES, 'UTF-8'); ?>" placeholder="Staff Adhaar Number " class="form-control" required="required" id = "adhaar">
    </div>
    <div class="form-group">
        <label for="cust_address">Address *</label>
        <textarea name="address" id="cust_address" class="form-control" rows="2"><?php echo htmlspecialchars($edit ? $staff['address'] : '', ENT_QUOTES, 'UTF-8'); ?></textarea>
    </div> 

    <div class="form-group">
        <label for="position">Choose staff position *</label>
        <select name="account_type" class="form-control" id="position">
        <option  <?php echo $edit ? ($staff['account_type'] == 'admin' ?'selected' : ''): ''; ?> value="admin" >Admin</option>
        <option <?php echo $edit ? ($staff['account_type'] == 'manager' ?'selected' : ''): ''; ?> value="manager" >Manager</option>
        <option <?php echo $edit ? ($staff['account_type'] == 'artisen' ?'selected' : ''): ''; ?>  value="artisen" >Artisen</option>
   
        </select>
    </div>

    <div class="form-group">
        <label id="salary-label" for="salary">Salary *</label>
          <input type="number" name="staff_salary" value="<?php echo htmlspecialchars($edit ? $staff['staff_salary'] : '', ENT_QUOTES, 'UTF-8'); ?>" placeholder="Enter amount" class="form-control" required="required" id = "salary">
    </div>
   

      <?php if(!$edit){?>

    <div class="form-group">
        <label for="created_at">Joined on *</label>
          <input type="date" name="created_at" disabled value="<?php echo htmlspecialchars($edit ? $staff['created_at'] : date('Y-m-d'), ENT_QUOTES, 'UTF-8'); ?>" placeholder="Specification Price " class="form-control" required="required" id = "created_at">
    </div> 
    
     <p><strong>Disclaimer:</strong> Please make sure to enter the correct information only.</p>
    <div class="form-group text-center">
        <label></label>
        <a href="staff-members.php" class="btn btn-outline-success" >Back </a>
        <button type="submit" class="btn btn-success" >Create Account </button>
    </div>
  <?php }?>

</fieldset>
<script>
$('#position').change(function(){
    if(this.value=='artisen'){
        $('#salary-label').html('Artisen Rate?')
    }else{
        $('#salary-label').html('Salary')

    }

})

</script>
