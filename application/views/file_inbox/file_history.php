<div class="row">
      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-heading">File History</div>
          <div class="panel-body">
            <div class="canvas-wrapper">
                    <div class="table-responsive">          
                        <table class="table">
                          <thead>
                            <tr>
                              <th width="15%">Sender Name</th>
                              <th width="16%">Sender Section</th>
                              <th width="15%">Addressing Person/ Reciver Name</th>
                              <th width="16%">Reciver Section</th>
                              <th width="10%">Date</th>
                              <th width="28%" style="text-align:center;">Notes</th>
                            </tr>
                          </thead>
                                          
                           <tbody>
                            
                            <?php if(isset($history[0]) && count($history[0])){ foreach($history[0] as $value){?>
                            <tr>            
                              <td style="text-align:center;"><?php if($value['action_type']=='D') echo $history[1][$value['trail_id']];?></td>
                              <td><?php if($value['action_type']=='D') echo substr($history[3][$value['trail_id']],0,-1);?></td>
                              <td style="text-align:center;"><?php if($value['action_type']=='R'||$value['action_type']=='A')echo $history[1][$value['trail_id']]; else echo $history[2][$value['trail_id']]?></td>
                              <td><?php if($value['action_type']=='R'||$value['action_type']=='A')echo substr($history[3][$value['trail_id']],0,-1); else echo substr($history[4][$value['trail_id']],0,-1);?></td>
                              
                              <td><?php if($value['action_type']=='D') echo 'Dispatched on : '.$value['date_of_action']; else if($value['action_type']=='R') echo "Recived on : ".$value['date_of_action']; else if($value['action_type']=='A') echo "In Almirah : ".$value['date_of_action']?></td>
                            <td style="text-align:center;">
                                        

                                      <?php if($value['action_type']=='D' && isset($value['note_text'])){ ?>
                                          
                                        <div class="flip" id="<?php echo 'flip'.$value['trail_id'];?>" style="width:100%">
                                          
                                      <span style="color:#04B404;font-weight:bold;">Click here to view </span>
                                          

                                        </div>
                                       
                                          
                                          <textarea class="shpanel" rows="6" cols="40" id="<?php echo 'shpanel'.$value['trail_id'];?>" readonly style="padding: 10px;"><?php echo $value['note_text']; ?></textarea>
                                       
                                        
                                      <?php } ?>
                            </td>
                            </tr>
                        
                           <?php }}else{ ?>
                           <tr><td><h4 style="color:#F00">No file movement</h4></td></tr>
                           <?php } ?>

                          </tbody>
                          </table>
                          </div>
                    
                  </div>

            </div>
          </div>
        </div>
      </div>
    </div><!--/.row-->
    
    