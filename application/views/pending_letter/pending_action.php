<div class="row">
      <div class="col-md-12">
        <div class="panel panel-default">
         <div class="panel-heading"><svg class="glyph stroked email"></svg>Sent Letters</div>
          <div class="panel-body">
            <div class="canvas-wrapper">
                    <div class="table-responsive">          
                        <table class="table">
                          <thead>
                            <tr>
                              
                              <th>MEMO NO.</th>
                              <th>SENT TO</th>
                              <th>ISSUING AUTHORITY</th>
                              <th>SUBJECT</th>
                              <th>DATE OF SENDING</th>
                              <th>ACTION DETAILS</th>
                              <th>ACTION STATUS</th>
                              <th>DEADLINE OF ACTION</th>
                              <th></th>
                            </tr>
                          </thead>
                          
                           <tbody>
                            <?php foreach($results as $value){?>
                            <tr id="<?php echo 'c2'.$value['action_id'] ;?>">
                              <td><?php echo $value["memo_no"];?></a></td>
                              <td><?php echo $value["name"];?></td>
                              <td><?php echo $value["authority_name"];?></td>
                              <td><?php echo $value["subject"];?></td>
                              <td><?php if($value["date_of_action"]!="0000-00-00 00:00:00")echo date("d-m-Y",strtotime($value["date_of_action"]));?></td>
                              <td><?php echo $value["action_details"];?></td>
                              <td><label class="status" id=""><?php if($value['action_status']=='P'){echo'<label style="color:red">Pending</label>';}else if($value['action_status']=='AT'){echo '<label style="color:#FF4500">ActionTaken</label>';} else if($value['action_status']=='C'){echo '<label style="color:green">Completed</label>';} ?></label></td>
                              <td><?php if($value["deadline_dt"]!="0000-00-00") echo $value["deadline_dt"];?></td>
                              <td><label class="accept_status" id="<?php echo $value['action_id'] ;?>"><?php if($value['action_status']=='AT'){echo'<label style="color:red">Accept</label>';}else if($value['action_status']=='C'){echo '<label style="color:green">Accepted</label>';} ?></label></td>
                              
                                
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

 $(document).ready(function(){
    $(".accept_status").click(function(){
  
      var base_url=$("#base_url").val();
     var id=$(this).attr("id");

      var url=base_url+"Letter_inbox/letter_status_accept/";
      $.ajax({url:url, 
           type:'post',
           data:{ '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',id:id},
           success: function(result){
         $("#"+id).html(result);
    }});
     
  });
});
</script>