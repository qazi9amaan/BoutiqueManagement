<fieldset>
    <div class="form-group">
        <label for="specification_name">Specification Name *</label>
          <input type="text" name="specification_name" 
          value="<?php echo htmlspecialchars($edit ? $specs['specification_name'] : '', ENT_QUOTES, 'UTF-8'); ?>" placeholder="Specification Name " class="form-control" 
          required="required" id = "specification_name">
    </div> 

    
    <div class="form-group">
        <label for="specification_price">Specification Artisan Price *</label>
          <input type="text" name="specification_artisan_price" value="<?php echo htmlspecialchars($edit ? $specs['specification_artisan_price'] : '', ENT_QUOTES, 'UTF-8'); ?>" placeholder="Specification Price " class="form-control" required="required" id = "specification_price">
    </div> 
    <div class="form-group">
        <label for="specification_final_price">Specification Final Price *</label>
          <input type="text" name="specification_final_price" value="<?php echo htmlspecialchars($edit ? $specs['specification_final_price'] : '', ENT_QUOTES, 'UTF-8'); ?>" placeholder="Specification Price " class="form-control" required="required" id = "specification_final_price">
    </div> 
  <?php if(!$edit){?>
    <div class="form-group">
        <label for="created_by">Uploaded By *</label>
          <input type="text" name="created_by" value="<?php echo htmlspecialchars($edit ? $specs['created_by'] :  $_SESSION['staff_user_name'], ENT_QUOTES, 'UTF-8'); ?>" disabled class="form-control" required="required" id = "created_by">
    </div> 
    <div class="form-group">
        <label for="created_at">Uploaded on *</label>
          <input type="date" name="created_at" disabled value="<?php echo htmlspecialchars($edit ? $specs['created_at'] : date('Y-m-d'), ENT_QUOTES, 'UTF-8'); ?>" placeholder="Specification Price " class="form-control" required="required" id = "created_at">
    </div> 
    
     <p><strong>Disclaimer:</strong> Please make sure to enter the correct information only.</p>
    <div class="form-group text-center">
        <label></label>
        <a href="Specs.php" class="btn btn-outline-success" >Back </a>
        <button type="submit" class="btn btn-success" >Create </button>
    </div>

  <?php }?>
</fieldset>
