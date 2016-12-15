<div class="row">
      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-heading"><svg class="glyph stroked email"></svg>Letter Dispatch</div>
          <div class="panel-body">
            <div class="col-md-12">
              
                  <?php echo validation_errors('<div style="color:red;">','</div>');?>
                  <div class="form-group">
                   <span style="color:green"><?php echo $this->session->flashdata('success_message'); ?></span>
                    </div>
                  <?php echo form_open('letter_inbox/dispatch/'.$results[0]["letter_id"],"class='form-horizontal'");?>  
                 

                  
                  <div class="form-group">
                    <label for="department" class="col-md-3 control-label">Subject<span style="color:red; font-size:20px">*</span>:</label>
                     <div class="col-md-4 has-success">
                     <input type="text" class="form-control" id="ref_srl"  value="<?php echo $results[0]["subject"]; ?>" readonly>
                    </div>
                  </div>

                    <div class="form-group">
                    <label for="memo_no" class="col-md-3 control-label">Memo No<span style="color:red; font-size:20px">*</span>:</label>
                     <div class="col-md-4 has-success">
                     <input type="text" class="form-control" id="memo_no"  value="<?php echo $results[0]["memo_no"]; ?>" readonly>
                    </div>
                  </div>

                    <div class="form-group">
                    <label for="reg_dt" class="col-md-3 control-label">Registration Date:<span style="color:red; font-size:20px">*</span>:</label>
                     <div class="col-md-4 has-success">
                     <input type="text" class="form-control" id="reg_dt"  value="<?php echo $results[0]["reg_dt"]; ?>" readonly>
                    </div>
                  </div>
                
                  <div class="form-group">
                    <label for="department" class="col-md-3 control-label">Received from<span style="color:red; font-size:20px">*</span>:</label>
                     <div class="col-md-4 has-success">
                     <input type="text" class="form-control" id="ref_srl"  value="<?php echo $desig_name; ?>" readonly>
                    </div>
                  </div>

                 <div class="form-group">
                    <label for="department" class="col-md-3 control-label">Addressed to (Designation)<span style="color:red; font-size:20px">*</span>:</label>
                    <div class="col-md-4 has-success">
                    <select class="form-control designation" id="designation" name="designation">
                      <option value="">---Select one---</option>
                      <?php foreach($designation as $value){ ?>
                    <option value="<?php echo $value['desig_id']; ?>" ><?php echo $value['desig_name']; ?></option>
                   <?php }?>
                   
                    </select>
                  </div>
                  </div>
                
                <div class="form-group">
                    <label for="user_id" class="col-md-3 control-label">Addressed to (name)<span style="color:red; font-size:20px">*</span>:</label>
                    <div class="col-md-4 has-success">
                    <select class="form-control" id="user_id" name="user_id">
                      <option value="">---Select one---</option>
                    </select>
                  </div>
                  </div>


      <div class="form-group">
                    <label for="actionable_id" class="col-md-3 control-label">Actionable<span style="color:red; font-size:20px">*</span>:</label>
                    <div class="col-md-4 has-success">
                    <select class="form-control" id="actionable_id" name="actionable_id" onchange="action_type()">
                      <option value="Not Actionable">Not Actionable</option>
                      <option value="Actionable">Actionable</option>
                    </select>
                  </div>
                  </div>
                   <div class="form-group" id="act_type" style="display:none">
                    <label for="" class="col-md-3 control-label"></label>
                    <div class="col-md-4 has-success">
                    <input type="radio" name="actionable_name"  value="Discuss the Matter" onchange="action_text()">Discuss the Matter
                    <input type="radio" name="actionable_name"  value="Send Report" onchange="action_text()">Send Report
                    <input type="radio" name="actionable_name" id="others" value="others" onchange="action_text()">Others
                  </div>
                  </div>
                  
              <div class="form-group" id="act_text" style="display:none">
                    <label for="act_name" class="col-md-3 control-label">Action:<span style="color:red; font-size:20px">*</span>:</label>
                     <div class="col-md-4 has-success">
                     <input type="text" class="form-control" id="act_name" name="act_name"  value="">
                    </div>
                  </div>
 
         <div class="form-group" style="display:none" id="act_dt">
                    <label for="deadline_dt" class="col-md-3 control-label">Deadline<span style="color:red; font-size:20px">*</span>:</label>
                     <div class="col-md-4 has-success">
                    <input class="datepicker form-control" data-date-format="mm/dd/yyyy" id="deadline_dt" name="deadline_dt" >
                     </div>
          </div>
 

                  <input type="hidden" value="<?php echo $results[0]["letter_id"]; ?>" name="letter_id">
                     
                   <input type="hidden" value="<?php echo base_url(); ?>" id="base_url">
                   <div class="col-md-5 widget-right">
                  <input type="reset" class="btn btn-primary pull-right" value='Reset' style="margin-right: 5px;">
                  <input type="submit" class="btn btn-primary pull-right"  style="margin-right: 5px;" value='Submit'>

                  </div>     
                  </form>
                                
               
              </div>
            </div>
            </form>
          </div>
          </div>
        </div>
      </div>
    </div><!--/.row-->
    <script type="text/javascript">

 $(document).ready(function(){
    $(".designation").change(function(){
      var base_url=$("#base_url").val();
      var token_name=$("#token_name").val();
      var hash=$("#hash").val();
      var designation=$("#designation").val();
      var url=base_url+"file_inbox/fetch_emp_name/";
       $.ajax({url:url, 
           type:'post',
           data:{ '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',designation:designation},
           success: function(result){
         $("#user_id").html(result);
    }});
     
  });
});

    </script>
   