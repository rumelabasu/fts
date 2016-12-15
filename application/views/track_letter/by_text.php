<div class="row">
		                
          <div class="col-lg-12">
          <div class="panel panel-default">
          
          <div class="panel-heading"><svg class="glyph stroked email"></svg>Track By Search Key</div>
          <div class="panel-body">
            <div class="col-md-12">
          
          <?php echo form_open('Track_letter/track_letter_bytext',"class='form-horizontal'");?>  
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
                             <th>SLNO</th>
                             <th>REGISTRATION DATE</th>
                             <th>CATEGORY</th>
                             <th>MEMO NUMBER</th>
                             <th>ISSUING DATE</th>
                             <th>ISSUING AUTHORITY</th>
                              <th>LETTER WITH</th>
                              <th>SECTION</th>
                              <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                            </tr>
                          </thead>
                          
                           <tbody>
                            <?php {foreach($results[0] as $value){?>
                           <tr>
                              <td><?php echo $value["sl_no"];?></td>
                              <td><?php echo $value["reg_dt"];?></td>
                              <td><?php echo $value["paper_type"];?></td>
                              <td><a href="<?php echo base_url().'repository/'.$value['location_path'].'/'.$value['letter_name'];?>" target="_blank"><?php echo $value["memo_no"];?></a></td>
                                <td><?php echo $value["issue_dt"];?></td>
                                <td><?php echo $value["authority_name"];?></td>
                              <td><?php echo $results[2][$value['letter_id']];?></td>
                              <td><?php echo  $results[1][$value['letter_id']];?></td>
                             
                <td><a href="<?php echo base_url().'track_letter/letter_history/'.$value['letter_id'];?>" style="color:white" class="btn btn-primary">Show History</a></td>
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
  
 