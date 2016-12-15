 <div class="row">
		                
          <div class="col-lg-12">
          <div class="panel panel-default">
          
          <div class="panel-heading"><svg class="glyph stroked email"></svg>User Profile</div>
          <div class="panel-body">
            <div class="col-md-12">
              
                
          <?php echo validation_errors('<div style="color:red;">','</div>');?>
          <div class="form-group has-success">
                   <span style="color:green"><?php echo $this->session->flashdata('success_message'); ?></span>
                    </div>
          <?php echo form_open('user/profile_update',"class='form-horizontal'");?>  
          
             
						<fieldset>
							
  
  <div class="form-group">
    <label for="gpf" class="col-md-3 control-label">GPF Number:</label>
    <div class="col-md-4 has-success">
    <input type="text" class="form-control" id="gpf" name="gpf" readonly value="<?php if (isset($data_value[0]['gpf_id']))echo $data_value[0]['gpf_id']; ?>" required>
  </div>
  </div>
  
  <div class="form-group">
    <label for="designation" class="col-md-3 control-label">Designation:</label>
    <div class="col-md-4 has-success">
        <input type="text" class="form-control" spellcheck="true" value="<?php $des="";foreach ($designation as $val){$des.=$val['desig_name'].',';} echo $des;?>" required>
  </div>
  </div>
  
  <div class="form-group">
    <label for="department" class="col-md-3 control-label">Section Name:</label>
    <div class="col-md-4 has-success">
    <input type="text" class="form-control" readonly value="<?php $sec="";foreach ($sec_name as $val){$sec.=$val['sec_name'].',';} echo $sec;?>"  required>
  </div>
  </div>
  
  <div class="form-group">
    <label for="email" class="col-md-3 control-label">Email Id:</label>
    <div class="col-md-4 has-success">
    <input type="email" class="form-control" id="email" name="email" value="<?php if (isset($data_value[0]['email']))echo $data_value[0]['email']; ?>" required>
  </div>
  </div>
  <div class="form-group">
    <label for="phone" class="col-md-3 control-label">Contact No:</label>
    <div class="col-md-4 has-success">
    <input type="text" class="form-control" id="phone" name="phone" value="<?php if (isset($data_value[0]['phone']))echo $data_value[0]['phone']; ?>" required>
  </div>
  </div>
  
  <div class="form-group">
    <label for="uname" class="col-md-3 control-label">Username:</label>
    <div class="col-md-4 has-success">
    <input type="text" class="form-control" id="uname" name="uname" value="<?php if (isset($data_value[0]['user_name']))echo $data_value[0]['user_name']; ?>">
  </div>
  </div>
  
 <!-- <div class="form-group">
    <label for="pwd">Password<span style="color:red; font-size:20px">*</span>:</label>
    <input type="password" class="form-control" id="pwd" name="pwd" value="<?php //echo $data_value[0]['password'];?>" required>
  </div>-->
  
 <div class="form-group">
  <label class="col-md-3 control-label"></label>
<div class="col-md-4">
  <button type="submit" class="btn btn-primary">Update</button>
  </div></div>
  

			</fieldset>
					</form>
				</div>
			</div>
		</div>
		
  </div>