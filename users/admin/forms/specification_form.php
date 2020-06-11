<fieldset>
    <div class="form-group">
        <label for="category_base">Specification Name *</label>
          <input type="text" name="category_base" value="<?php echo htmlspecialchars($edit ? $customer['category_base'] : '', ENT_QUOTES, 'UTF-8'); ?>" placeholder="Specification Name " class="form-control" required="required" id = "category_base">
    </div> 

    <div class="form-group">
        <label for="category_name">Specification Price *</label>
          <input type="text" name="category_name" value="<?php echo htmlspecialchars($edit ? $customer['category_name'] : '', ENT_QUOTES, 'UTF-8'); ?>" placeholder="Specification Price " class="form-control" required="required" id = "category_name">
    </div> 
    <div class="form-group">
        <label for="category_name">Uploaded By *</label>
          <input type="text" name="category_name" value="<?php echo htmlspecialchars($edit ? $customer['category_name'] :  $_SESSION['staff_user_name'], ENT_QUOTES, 'UTF-8'); ?>" disabled class="form-control" required="required" id = "category_name">
    </div> 
    <div class="form-group">
        <label for="category_name">Uploaded on *</label>
          <input type="date" name="category_name" disabled value="<?php echo htmlspecialchars($edit ? $customer['category_name'] : date('Y-m-d'), ENT_QUOTES, 'UTF-8'); ?>" placeholder="Specification Price " class="form-control" required="required" id = "category_name">
    </div> 
    
     <p><strong>Disclaimer:</strong> Please make sure to enter the correct information only.</p>
    <div class="form-group text-center">
        <label></label>
        <button type="submit" class="btn btn-success" >Create </button>
    </div>
</fieldset>
