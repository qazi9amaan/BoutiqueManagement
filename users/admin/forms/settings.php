<fieldset>
  
    <div class="form-group">
        <label for="cust_sex">Staff Member *</label>
        <select name="id" class="form-control" id="cust_sex">
            <?php 
                foreach ($rows as $row):
                    echo '<option value="'.$row['id'].'">'.$row['full_name'].' ('.$row['phone_number'].')'.'</option>';
                endforeach;
            ?>
        </select>
    </div> 
    <div class="form-group">
        <label for="created_at">Password *</label>
          <input type="text" name="password"   placeholder="Password " class="form-control" required="required" id = "created_at">
    </div> 
    
     <p><strong>Disclaimer:</strong> Please make sure to enter the correct information only.</p>
    <div class="form-group text-center">
        <label></label>
        <button type="submit" class="btn btn-success" >Change </button>
    </div>

</fieldset>
