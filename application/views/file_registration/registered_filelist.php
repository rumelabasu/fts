<div class="row">
      <div class="col-md-12">
        <div class="panel panel-default">
         <div class="panel-heading"><svg class="glyph stroked email"></svg>Registered File List</div>
          <div class="panel-body">
            <div class="canvas-wrapper">
                    <div class="table-responsive">          
                        <table class="table">
                          <thead>
                            <tr>
                              
                              <th>FILE REF. SL. NUMBER</th>
                              <th>ISSUING AUTHORITY</th>
                              <th>SUBJECT</th>
                              <th>REGISTRATION DATE</th>
                              <th>ACTION</th>
                              <th>ATTACH CORRESPONDANCE PAGE</th>
                              <th>DOWNLOAD BARCODE</th>
                            </tr>
                          </thead>
                          
                           <tbody>
                            <?php foreach($results as $value){?>
                            <tr>
                              <td>
                                <?php if($value["file_move_status"]!='D'){?>
                                <a href="<?php echo base_url().'file_inbox/file_view/?fid='.id_encrypt($value["file_id"]);?>" style="color:#5fc4c8"><?php echo $value["file_ref_sl_no"];?></a></td>
                                <?php }?>
                                <?php if($value["file_move_status"]=='D'){?>
                                <td><?php echo $value["file_ref_sl_no"];?></td>
                                <?php }?>
                              <td><?php echo $value["sec_name"];?></td>
                              <td><?php echo $value["subject_name"];?></td>
                              <td><?php echo $value["file_reg_date"];?></td>
                              <td>
                                <?php if($value["file_move_status"]=='P'){?>
                                <a href="<?php echo base_url().'file_inbox/dispatch/'.$value["file_id"];?>" style="color:#5fc4c8">Dispatch</a>
                                |&nbsp;<a href="<?php echo base_url().'file_registration/almari/'.$value["file_id"];?>" style="color:#5fc4c8">Almirah</a>
                                <?php } else if($value["file_move_status"]=='M') echo "Dispatched";
                                  else if($value["file_move_status"]=='A')
                                  { 
                                ?>
                               <a href="<?php echo base_url().'file_inbox/dispatch/'.$value["file_id"];?>" style="color:#5fc4c8">Dispatch</a>
                                |&nbsp; In Almirah
                                <?php } ?>
                            </td>
                              <td><?php if($value["file_move_status"]=='M') echo "N.A"; else { ?><a href="<?php echo base_url().'attach_to_file/attach_toReg_File/'.$value["file_id"];?>" style="color:#5fc4c8">Attach Correspondance Page</a><?php } ?></td>
                              <td><a href="<?php echo base_url().'repository/'.$value["folder_name"].'/'.$value["br_image_name"];?>" style="color:#5fc4c8" download>Barcode</a></td>
                            </tr>
                            
                           <?php } ?>
                          </tbody>
                          </table>
                          </div>
                    <?php echo $links;?>
                  </div>

            </div>
          </div>
        </div>
      </div>
    </div><!--/.row-->
    
    