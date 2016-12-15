<div class="row">
      <div class="col-md-12">
        <div class="panel panel-default">
         <div class="panel-heading"><svg class="glyph stroked email"></svg>File Inbox</div>
          <div class="panel-body">
            <div class="canvas-wrapper">
                    <div class="table-responsive">          
                        <table class="table">
                          <thead>
                            <tr>
                              
                              <th>FILE REF. SL. NUMBER</th>
                              <th>ISSUING AUTHORITY</th>
                              <th>SUBJECT</th>
                              <th>RECEIVED DATE</th>
                              <th>REGISTRATION DATE</th>
                              <th>ACTION</th>
                              <th>Attach Correspondance Page</th>
                              <th>DOWNLOAD BARCODE</th>
                            </tr>
                          </thead>
                          
                           <tbody>
                            <?php foreach($results as $value){?>
                            <tr>
                              <td><a href="<?php echo base_url().'file_inbox/file_view/?fid='.id_encrypt($value["file_id"]);?>" style="color:#5fc4c8"><?php echo $value["file_ref_sl_no"];?></a></td>
                              <td><?php echo $value["sec_name"];?></td>
                              <td><?php echo $value["subject_name"];?></td>
                              <td><?php if($value["received_date_time"]!="0000-00-00 00:00:00")echo $value["received_date_time"];?></td>
                              <td><?php echo $value["file_reg_date"];?></td>
                              <td><?php if( $value["m_file_id"]=="" || $value["file_status"]=='R') {?>
                                <a href="<?php echo base_url().'file_inbox/dispatch/'.$value["file_id"];?>" style="color:#5fc4c8">Dispatch</a>
                                |&nbsp;<a href="<?php echo base_url().'file_inbox/almari/'.$value["file_id"];?>" style="color:#5fc4c8">Almirah</a>
                                <?php } else if($value["file_status"]=='D' && $value["reciver_user_id"]!=$this->session->userdata('user_id')) echo 'Dispatched';
                              else if($value["file_status"]=='A')
                              {
                                ?>
                          <a href="<?php echo base_url().'file_inbox/dispatch/'.$value["file_id"];?>" style="color:#5fc4c8">Dispatch</a>
                                |&nbsp;In Almirah
                                <?php
                              }


                              else {?>
                              <a href="<?php echo base_url().'file_inbox/receive/'.$value["file_id"];?>" style="color:#5fc4c8">Receive</a>
                              <?php }?>
                            </td>
                              <td><a href="<?php echo base_url().'attach_to_file/index/'.$value["file_id"];?>" style="color:#5fc4c8">Attach Correspondance Page</a></td>
                          
                            </td>
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
    
    