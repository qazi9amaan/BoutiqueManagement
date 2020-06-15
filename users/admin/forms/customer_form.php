<fieldset>
    <div class="form-group">
        <label for="cust_name"> Name *</label>
          <input type="text" name="cust_name" 
          value="<?php echo htmlspecialchars($edit ? $cust['cust_name'] : '', ENT_QUOTES, 'UTF-8'); ?>" placeholder="Customer Name " class="form-control" 
          required="required" id = "cust_name">
    </div> 

    <div class="form-group">
        <label for="cust_phone_number">Phone Number *</label>
          <input type="number" name="cust_phone_number" value="<?php echo htmlspecialchars($edit ? $cust['cust_phone_number'] : '', ENT_QUOTES, 'UTF-8'); ?>" placeholder="Customer Phone Number " class="form-control" required="required" id = "cust_phone_number">
    </div>
    <div class="form-group">
        <label for="cust_sex">Sex *</label>
        <select name="cust_sex" class="form-control" id="cust_sex">
        <option value="m" <?php
        if ($edit && $cust['cust_sex'] == 'm') {
            echo 'selected';
        }
        ?> >Male</option>
                        <option value="f" <?php
        if ($edit && $cust['cust_sex'] == 'f') {
            echo 'selected';
        }
        ?>>Female</option>
        </select>
    </div> 
    <div class="form-group">
        <label for="cust_address">Address *</label>
        <textarea name="cust_address" id="cust_address" class="form-control" rows="5">
             <?php echo htmlspecialchars($edit ? $cust['cust_address'] : '', ENT_QUOTES, 'UTF-8'); ?>
        </textarea>
    </div> 

      <?php if(!$edit){?>

    <div class="form-group">
        <label for="created_at">Uploaded on *</label>
          <input type="date" name="created_at" disabled value="<?php echo htmlspecialchars($edit ? $cust['created_at'] : date('Y-m-d'), ENT_QUOTES, 'UTF-8'); ?>" placeholder="Specification Price " class="form-control" required="required" id = "created_at">
    </div> 
    
     <p><strong>Disclaimer:</strong> Please make sure to enter the correct information only.</p>
    <div class="form-group text-center">
        <label></label>
        <a href="Customers.php" class="btn btn-outline-success" >Back </a>
        <button type="submit" class="btn btn-success" >Create </button>
    </div>
  <?php }?>

</fieldset>
