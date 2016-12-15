<div class="row">
      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-heading">Letter History</div>
          <div class="panel-body">
            <div class="canvas-wrapper">
                    <div class="table-responsive">          
                        <table class="table">
                          <thead>
                            <tr>
                              <th>Sender Name</th>
                              <th>Sender Section</th>
                              <th>Reciver Name</th>
                              <th>Reciver Section</th>
                              <th>Date</th>
                            </tr>
                          </thead>
                          
                           <tbody>
                            <?php if(isset($history) && count($history[0])){ foreach($history[0] as $value){?>
                            <tr>
                              
                              <td><?php  echo $history[1][$value['trail_letter_id']];?></td>
                              <td><?php  echo substr($history[3][$value['trail_letter_id']],0,-1);?></td>
                              <td><?php  echo $history[2][$value['trail_letter_id']];?></td>
                              <td><?php  echo substr($history[4][$value['trail_letter_id']],0,-1);?></td>
                              <td><?php  echo $value['date_of_action'];?></td>
                            </tr>
                        
                           <?php }}else{ ?>
                           <tr><td colspan="5"><h4 style="color:#F00">No file movement</h4></td></tr>
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
    
    