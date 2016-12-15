<div class="row">
      <div class="col-md-12">
        <div class="panel panel-default">
         <div class="panel-heading"><svg class="glyph stroked email"></svg>Letter Inbox</div>
          <div class="panel-body">
            <div class="canvas-wrapper">
                    <div class="table-responsive">          
                        <table class="table">
                          <thead>
                            <tr>
                              
                              <th>MEMO NO.</th>
                              <th>LETTER ISSUING DATE</th>
                              <th>ISSUING AUTHORITY</th>
                              <th>SUBJECT</th>
                              <th>DISPATCH  DATE</th>
                              <th>ACTION DETAILS</th>
                              <th>ACTION STATUS</th>
                              <th>DEADLINE OF ACTION</th>
                              <th>        </th>
                              <th>  </th>
                            </tr>
                          </thead>
                          
                           <tbody>
                            <?php foreach($results as $value){?>
                            <tr>
                              <td><?php echo $value["memo_no"];?></a></td>
                              <td><?php if($value["issue_dt"]!="0000-00-00 00:00:00")echo $value["issue_dt"];?></td>
                              <td><?php echo $value["authority_name"];?></td>
                              <td><?php echo $value["subject"];?></td>
                              <td><?php if($value["dispatch_dt_time"]!="0000-00-00 00:00:00")echo date("Y-m-d",strtotime($value["dispatch_dt_time"]));?></td>
                              <td><?php echo $value["action_details"];?></td>
                              <td><label class="status" id="<?php echo $value['action_id'] ;?>"><?php if($value['action_status']=='P'){echo'<label style="color:red">Pending</label>';}else if($value['action_status']=='C'){echo '<label style="color:green">Completed</label>';}else if($value['action_status']=='AT'){echo '<label style="color:green">Action Taken</label>';}else if($value['action_status']=='No'){echo '<label>N.A </label>';} ?></label></td>
                              <td><?php if($value["deadline_dt"]!="0000-00-00") echo '<span style="color :'.date_color($value["deadline_dt"]). '">'.$value["deadline_dt"].'</span>';?></td>
                              <td>
                          <a href="<?php echo base_url().'letter_inbox/dispatch/'.$value["letter_id"];?>" style="color:#5fc4c8">Dispatch</a>
                               
                            </td>
                              
                                 <td>
                          <a href="<?php echo base_url().'Letter_to_file/letter/'.$value["letter_id"];?>" style="color:#5fc4c8">Attaching the Letter to a File</a>
                               
                            </td>
                            </tr>
                            
                           <?php } ?>
                          </tbody>
                          </table>
                          </div>
                    <?php echo $links;?>
                    <input type="hidden" id="base_url" value="<?php echo base_url()?>">
                  </div>

            </div>
          </div>
        </div>
      </div>
    </div><!--/.row-->
    
    <script type="text/javascript">

 $(document).ready(function(){
    $(".status").click(function(){

      var base_url=$("#base_url").val();
     var id=$(this).attr("id");

      var url=base_url+"Letter_inbox/letter_action_status/";
      $.ajax({url:url, 
           type:'post',
           data:{ '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',id:id},
           success: function(result){
         $("#"+id).html(result);
    }});
     
  });
});
</script>