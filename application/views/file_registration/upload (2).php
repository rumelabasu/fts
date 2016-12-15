<div class="row">
      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-heading">Attach Sheet</div>
          <div class="panel-body">
            <div class="col-md-6">

					<?php if(isset($error)) echo '<span style="color:red">'.$error.'</span>';?>
					<?php if(isset($success))
					{
					echo $success."<br>";
					foreach($success_file as $key=>$value)
					{
						 echo $value."<br>";
					}
					}
					?>
					<?php echo form_open_multipart('Attach_to_file/do_upload/'.$data_value[0]["file_id"]);?>

 				<div class="form-group has-success">
                    <label for="ref_srl">File REF_SRL Number</label>
                    <input type="text" class="form-control" id="ref_srl" name="ref_srl" value="<?php echo $data_value[0]['file_ref_sl_no']; ?>" readonly>
                  </div>

                 <div class="form-group has-success">
                    <label for="fname">File Name</label>
                    <input type="text" class="form-control" id="fname" value="<?php echo $data_value[0]['file_name']; ?>" readonly>
                  </div>


                  
           <div class="input_fields_wrap">
                       <button class="add_field_button btn btn-primary">Add More Corespondance Page</button><br><br><br>
                       <div class="form-group">
                    <label for="userfile">Corespondance Page</label>
                    <input type="file" class="form-control" id="userfile" name="userfile[]">
                  </div>
              </div>

					<input type="submit" class="btn btn-primary" value="Upload" />
         <a href="<?php echo base_url(); ?>attach_to_file/file_list" class="btn btn-primary pull-right" >Back</a>
					</form>

 			</div>
          </div>
        </div>
      </div>
    </div><!--/.row-->
    
    