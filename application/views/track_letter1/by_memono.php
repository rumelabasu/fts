<div class="row">
		                
          <div class="col-lg-12">
          <div class="panel panel-default">
          
          <div class="panel-heading"><svg class="glyph stroked email"></svg>Track By Memo No</div>
          <div class="panel-body">
            <div class="col-md-12">
          
          <?php echo form_open('track_letter/track_letter_bymemono',"class='form-horizontal'");?>  
 					<fieldset>
	 <div class="form-group">
  <label for="des" class="col-md-3 control-label">Memo No.<span style="color:red; font-size:20px">*</span>:</label>
    <div class="col-md-3 has-success">
    <input type="text" class="form-control" id="memono" name="memono"  required>
    
  </div>

   <div class="col-md-3 has-success">
    <select class="form-control" id="year" name="year"  required>
                      <option value="">---Select Year---</option>
                      <?php for($y=date('Y');$y >=1970 ; $y--){ ?>
                    <option value="<?php echo $y; ?>" ><?php echo $y; ?></option>
                   <?php }?>
                   
                    </select>
   </div>
   <button type="submit" class="btn btn-primary">Go</button> 
  </div>
  
  </fieldset>
  
  
  
  <div class="table-responsive">          
                        <table class="table test">
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
                            <?php if(isset($results[0])){foreach($results[0] as $value){?>
                            <tr>
                              <td><?php echo $value["sl_no"];?></td>
                              <td><?php echo $value["reg_dt"];?></td>
                              <td><?php echo $value["paper_type"];?></td>
                              <td><a href="<?php echo base_url().'repository/'.$value['location_path'].'/'.$value['letter_name'];?>" target="_blank"><?php echo $value["memo_no"];?></a></td>
                                <td><?php echo $value["issue_dt"];?></td>
                                <td><?php echo $value["authority_name"];?></td>
                              <td><?php echo $results[2][$value["letter_id"]];?></td>
                              <td><?php echo $results[1][$value["letter_id"]];?></td>
                             
                <td><a href="<?php echo base_url().'track_letter/letter_history/'.$value['letter_id'];?>" style="color:white" class="btn btn-primary">Show History</a></td>
              </tr>
                            
                           <?php } }?>
                          </tbody>
                          </table>
                          </div>
                          
  </div>
  </div>
  </div>
  </div>
  </div>
  
 