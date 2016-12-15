
    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel-heading"><svg class="glyph stroked email"></svg> File Registrations</div>
          <div class="panel-body">
            <?php echo validation_errors('<div style="color:red;">','</div>');?>
                  <div class="form-group has-success">
                   <span style="color:green"><?php echo $this->session->flashdata('success_message'); ?></span>
                    </div>
                  <?php echo form_open('file_registration/file_insert',"class='form-horizontal'");?>  
                   
                  <div class="form-group">
                    <label for="name" class="col-md-3 control-label">File Name:<span style="color:red; font-size:20px">*</span>:</label>
                    <div class="col-md-4 has-success">
                   <?php $data = array(
                                        'name'          => 'name',
                                        'id'            => 'name',
                                        'value'         => set_value('name'),
                                        'class'        =>'form-control',
                                        'required'    =>'required',
                                        );

                          echo form_input($data); 
                ?>
                   </div>
                  </div>

                  <div class="form-group">
                    <label for="issue_dt" class="col-md-3 control-label">File Creation Date<span style="color:red; font-size:20px">*</span>:</label>
                     <div class="col-md-4 has-success">
                    <input type="date" class="has-success" id="issue_dt" name="issue_dt" value="<?php echo set_value('issue_dt'); ?>" required>
                     </div>
                  </div>

                  <div class="form-group">
                    <label for="authority" class="col-md-3 control-label">File Created By<span style="color:red; font-size:20px">*</span>:</label>
                    <div class="col-md-4 has-success">
                    <select class="form-control" id="authority" name="authority">
                    <option value="">-----Select one-----</option>
                    <option value="WC">Women Commission</option>
                    <option value="PED">P.W.D</option>
                    <option value="PD">Police Directorate</option>
                    </select>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="category" class="col-md-3 control-label">Category<span style="color:red; font-size:20px">*</span>:</label>
                    <div class="col-md-4 has-success">
                    <select class="form-control" id="category" name="category">
                    <option value="">-----Select one-----</option>
                    <option value="MOD">Modernization</option>
                    <option value="ACC">Account</option>
                    <option value="REC">Recruitment</option>
                    </select>
                  </div>
                  </div>

                  <div class="form-group ">
                    <label for="sub_cat" class="col-md-3 control-label">Sub Category<span style="color:red; font-size:20px">*</span>:</label>
                    <div class="col-md-4 has-success">
                      <input type="text" class="form-control" id="sub_cat" name="sub_cat" value="<?php echo set_value('sub_cat'); ?>" required>
                   </div>
                  </div>

                  <!--<div class="form-group has-success">
                    <label for="ref_srl">File REF_SRL Number<span style="color:red; font-size:20px">*</span>:</label>
                    <input type="text" class="form-control" id="ref_srl" name="ref_srl" value="<?php echo set_value('ref_srl'); ?>" required>
                  </div>-->
                  <div class="form-group ">
                    <label for="department" class="col-md-3 control-label">Subject<span style="color:red; font-size:20px">*</span>:</label>
                    <div class="col-md-4 has-success">
                    <select class="form-control" id="sub" name="sub" onchange="subject()" required>
                      <option value="">---Select one---</option>
                      <?php foreach($subject as $value){ ?>
                    <option value="<?php echo $value['subject_id']; ?>" ><?php echo $value['subject_name']; ?></option>
                   <?php }?>
                   <option value="others">Others</option>
                    </select>
                  </div>
                  </div>

                    <div class="form-group " style="display:none" id="sub_div">
                    <label for="ref_srl" class="col-md-3 control-label">Add Subject<span style="color:red; font-size:20px">*</span>:</label>
                    <div class="col-md-4 has-success">
                    <input type="text" class="form-control" id="add_sub" name="add_sub" value="<?php echo set_value('add_sub'); ?>" required>
                    </div>
                  </div>

                   <div class="form-group ">
                    <label for="des" class="col-md-3 control-label">Description<span style="color:red; font-size:20px">*</span>:</label>
                    <div class="col-md-4 has-success">
                    <textarea class="form-control" id="des" name="des" required><?php echo set_value('des'); ?></textarea>
                    </div>
                  </div>

                  <div class="form-group ">
                    <label for="status" class="col-md-3 control-label">File Type<span style="color:red; font-size:20px">*</span>:</label>
                    <div class="col-md-4 has-success">
                    <select class="form-control" id="status" name="status">
                    <option value="Normal">Normal</option>
                    <option value="Confidencial">Confidencial</option>
                    <option value="Secret">Secret</option>
                    <option value="Top Secret">Top Secret</option>
                    </select>
                  </div>
                  </div>
                  
                  <div class="form-group ">
                    <label for="priority" class="col-md-3 control-label">File Priority<span style="color:red; font-size:20px">*</span>:</label>
                    <div class="col-md-4 has-success">
                    <select class="form-control" id="priority" name="priority" required>
                    <option value="Normal">Normal</option>
                    <option value="Urgent">Urgent</option>
                    <option value="Very Urgent">Very Urgent</option>
                    </select>
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
                
      </div><!--/.col-->
    </div><!--/.row-->