<div class="row">
      <div class="col-md-12">
        <div class="panel panel-default">
         <div class="panel-heading"><svg class="glyph stroked email"></svg>Registered Letter List</div>
          <div class="panel-body">
            <div class="canvas-wrapper">
                    <div class="table-responsive">          
                        <table class="table">
                          <thead>
                            <tr>
                              
                              <th>MEMO NUMBER</th>
                              <th>SENDING AUTHORITY</th>
                              <th>SUBJECT</th>
                              <th>REGISTRATION DATE</th>
                              <th>ACTION</th>
                              
                            </tr>
                          </thead>
                          
                           <tbody>
                            <?php foreach($results as $value){?>
                            <tr>
                             
                                
                               
                              <td><?php echo $value["memo_no"];?></td>
                              <td><?php echo $value["authority_name"];?></td>
                              <td><?php echo $value["subject"];?></td>
                               <td><?php echo $value["reg_dt"];?></td>
                               <td><?php if($value["letter_move_status"]=='P'){?>
                                <a href="<?php echo base_url().'letter_inbox/dispatch/'.$value["letter_id"];?>" style="color:#5fc4c8">Dispatch</a>
                                
                                <?php } else if($value["letter_move_status"]=='M') echo "Dispatched"; ?>
                                  </td>
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
    
    