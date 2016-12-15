<div class="row">
		                
          <div class="col-lg-12">
          <div class="panel panel-default">
          
          <div class="panel-heading"><svg class="glyph stroked email"></svg>Track By Search Key</div>
          <div class="panel-body">
            <div class="col-md-12">
          
          <?php echo form_open('file_inbox/track_file_bytext',"class='form-horizontal'");?>  
 					<fieldset>
							
  <div class="form-group">
  <label for="des" class="col-md-3 control-label">Search<span style="color:red; font-size:20px">*</span>:</label>
    <div class="col-md-3 has-success">
    <input type="text" class="form-control" id="text" name="text" value="<?php echo $this->session->userdata('text');?>" required>
    
  </div>
   <button type="submit" class="btn btn-primary">Go</button> 
  </div>
  
  
  </fieldset>
  
  
  
  <div class="table-responsive">          
                        <table class="table">
                          <thead>
                            <tr>
                             <th>FILE REF. SL. NUMBER</th>
                              <th>DESCRIPTION</th>
                              <th>CORESPONDANCE PAGE NAME</th>
                              <th>           </th>
                            </tr>
                          </thead>
                          
                           <tbody>
                            <?php {foreach($results as $value){?>
                            <tr>
                              <td><a href="<?php echo base_url().'file_inbox/file_view/?fid='.id_encrypt($value["file_id"]);?>" style="color:#5fc4c8"><?php echo $value["file_ref_sl_no"];?></a></td>
                              <td><?php echo $value["description"];?></td>
                              <td><a href="<?php echo base_url().'repository/'.$value["folder_name"].'/'.$value["letter_name"];?>" style="color:#5fc4c8" target="_blank"><?php echo $value["letter_name"];?></td>
                                <td><a href="<?php echo base_url().'file_inbox/file_history/'.$value['file_id'];?>" style="color:white" class="btn btn-primary">Show History</a></td>
                
                            </tr>
                            
                           <?php } }?>
                          </tbody>
                          </table>
                          </div>
                          <?php echo $links;?>
  </div>
  </div>
  </div>
  </div>
  </div>
  
 