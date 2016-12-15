    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel-heading"><svg class="glyph stroked email"></svg> Letter Registration</div>
          <div class="panel-body">
            <?php echo validation_errors('<div style="color:red;">','</div>');?>
                  <div class="form-group has-success">
                   <span style="color:green"><?php echo $this->session->flashdata('success_message'); ?></span>
                    </div>
                  <?php echo form_open('letter_registration/letter_insert',"class='form-horizontal'");?>  
                   
                  <div class="form-group">
                    <label for="memono" class="col-md-3 control-label">Memo no.<span style="color:red; font-size:20px">*</span>:</label>
                    <div class="col-md-4 has-success">
                   <?php $data = array(
                                        'name'          => 'memono',
                                        'id'            => 'memono',
                                        'value'         => set_value('memono'),
                                        'class'        =>'form-control upper-control',
                                        'required'    =>'required',
                                        'spellcheck'  =>"true"
                                        );

                          echo form_input($data); 
			     
                   ?>
                   </div>
                  </div>

                  <div class="form-group">
                    <label for="issue_dt" class="col-md-3 control-label">Issue Date<span style="color:red; font-size:20px">*</span>:</label>
                     <div class="col-md-4 has-success">
			
			<input class="datepicker"  id="issue_dt" name="issue_dt" value="<?php echo set_value('issue_dt'); ?>" required>

		      
                     </div>
                  </div>
		    
 <!--  coading for FILE CREATED Field -->  

                  <div class="form-group">
		    <label for="authority" class="col-md-3 control-label">Sending Authority<span style="color:red; font-size:20px">*</span>:</label>
		      
		      <div class="col-md-4 has-success">
		      
                    <select class="form-control upper-control"  id="authority" name="authority" onchange="add_authority()">
                    <option value="">-----Select one-----</option>
                  <?php foreach($authority as $value)
		    { ?>
                    <option value="<?php echo fchar($value['authority_name']); ?>" ><?php echo $value['authority_name']; ?></option>
                   <?php 
		     
		    }?>
		     <option value="add_authority_name">Others</option>
		     
                    </select>
                    </div>
		      </div>
		      
		      
 <!--  coading for ADD FILE CREATED Field -->
 		      
<div class="form-group " style="display:none" id="sub_div1">
                    <label for="add_authority_name" onblur="upper-control" class="col-md-3 control-label">Add Authority<span style="color:red; font-size:20px">*</span>:</label>
                    <div class="col-md-4 has-success">
<input type="text" spellcheck="true" class="form-control" onblur="upper_str(this)" id="add_authority_name" name="add_authority_name" value="<?php echo set_value('add_authority_name'); ?>" >
                    </div>
		      </div>                   


 <!--  coading for Catagory Field --> 

                    <div class="form-group">
                    <label for="category" class="col-md-3 control-label">Category<span style="color:red; font-size:20px">*</span>:</label>
                    <div class="col-md-4 has-success">
                    <select class="form-control upper-control"  id="category" name="category" onchange="category_Others()
		                ">
                    <option value="">-----Select one-----</option>
		                <?php foreach($category as $value){ ?>
                    <option value="<?php echo substr($value['category'],0,3); ?>" ><?php echo $value['category']; ?></option>
                    <?php }?>
		                <option value="category_Others">Others</option>
                    </select>
                  </div>
                  </div>
		    
 <!--  coading for ADD Catagory Field --> 		      
 
                    <div class="form-group " style="display:none" id="sub_div2">
                    <label for="ref_srl" class="col-md-3 control-label">Add Catagory<span style="color:red; font-size:20px">*</span>:</label>
                    <div class="col-md-4 has-success">
   <input type="text" spellcheck="true" class="form-control" onblur="upper_str(this)" id="add_cat" name="add_cat" value="<?php echo set_value('add_cat'); ?>" required>
                    </div>
		      </div>
            

		    
 <!--  coading for Sub Catagory Field -->
		    
                  <div class="form-group ">
                    <label for="sub_cat" class="col-md-3 control-label ">Sub Category<span style="color:red; font-size:20px">*</span>:</label>
                  <div class="col-md-4 has-success">
                      <input type="text" spellcheck="true" class="form-control" onblur="upper_str(this)" id="sub_cat" name="sub_cat" value="<?php echo set_value('sub_cat'); ?>" required>
                   </div>
                  </div>

                  <!--<div class="form-group has-success">
                    <label for="ref_srl">File REF_SRL Number<span style="color:red; font-size:20px">*</span>:</label>
                    <input type="text" class="form-control" id="ref_srl" name="ref_srl" value="<?php echo set_value('ref_srl'); ?>" required>
                  </div>-->
		    
		    
		    
 <!--  coading for Subject Field -->    
 
                  <div class="form-group ">
                    <label for="department" class="col-md-3 control-label">Subject<span style="color:red; font-size:20px">*</span>:</label>
                    <div class="col-md-4 has-success">
                    <select class="form-control upper-control" id="sub" name="sub" onchange="subject()" required>
                      <option value="">---Select one---</option>
                      
			 
			 <?php foreach($subject as $value){ ?>
                    <option value="<?php echo $value['subject_id']; ?>" ><?php echo $value['subject_name']; ?></option>
                   <?php }?>
		     
		     
		     
                   <option value="others">Others</option>
                    </select>
                  </div>
                  </div>

<!--  coading for ADD Subject Field --> 

                    <div class="form-group " style="display:none" id="sub_div">
                    <label for="ref_srl" class="col-md-3 control-label">Add Subject<span style="color:red; font-size:20px">*</span>:</label>
                    <div class="col-md-4 has-success">
   <input type="text" spellcheck="true" class="form-control" id="add_sub" onblur="upper_str(this)" name="add_sub" value="<?php echo set_value('add_sub'); ?>" required>
                    </div>
		      </div>

<!--  coading for Description -->                    
		     
		     <div class="form-group ">
                    <label for="des" class="col-md-3 control-label">Description<span style="color:red; font-size:20px">*</span>:</label>
                    <div class="col-md-4 has-success">
  <textarea spellcheck="true" class="form-control" id="des" name="des" required onblur="upper_str(this)"><?php echo set_value('des'); ?></textarea>
                    </div>
                  </div>
		    
		    
<!--  coading for File Type --> 		    
					
				
				
				<div class="form-group ">
                    <label for="status" class="col-md-3 control-label"><span style="color:red; font-size:20px"></span></label>
                    <div class="col-md-4 has-success">
					
					<div class="input_letter_fields_wrap">
                    <button class="add_letter_field_button btn btn-primary">Add another page to Letter</button><br><br>
					<div class="form-group">
                    <label for="userfile" class="inc">&nbsp;&nbsp;&nbsp;Upload page 1</label>
                    <input type="file" class="form-control" id="userletter" name="userletter[]">
                  </div>
              </div>

					<input type="submit" class="btn btn-primary" value="Upload" />
        					
					
                    </div>
                    </div>
				
				 
				  
				  <div class="form-group">
                    
                    <div class="col-md-4 has-success">
                   <?php $data = array(
                                        'name'          => 'pathname',
                                        'id'            => 'pathname',
                                        'value'         => set_value('pathname'),
                                        'class'        =>'form-control upper-control',
                                        'type'			=>'hidden',
                                        'spellcheck'  =>"true"
										
                                        );

                          echo form_input($data); 
			     
                   ?>
                   </div>
                  </div>


                  
                   <div class="form-group">
                     <div class="col-md-5 widget-right">
                       <input type="reset" class="btn btn-primary pull-right" value='Reset' style="margin-right: 5px;">
                       <input type="submit" class="btn btn-primary pull-right"  style="margin-right: 5px;" value='Submit'>
                                    
                
                  <!--<button type="reset" class="btn btn-primary">Reset</button>   -->
                   </div>
                </div>
                  </form>
                  
          </div>
        </div>
        
        </div>
   
  </div> 
                
      </div><!--/.col-->
    </div><!--/.row-->