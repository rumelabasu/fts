<style>
.numberCircle {
    border-radius: 80%;
    

    width: 55px;
    height: 55px;
    padding: 17px;

    background: #fff;
    border: 4px solid #1490a2;
    color: #666;
    text-align: center;

    
}
</style>
<div class="row">
      <div class="col-lg-12" style="background-color:#fff">
        <div class="panel panel-default">
          <div class="panel-heading"><svg class="glyph stroked email"></svg>File Details</div>
          
          </div>
        </div>
    </div><!--/.row-->
<div class="row">
      <div class="col-lg-12" style="background-color:#fff">
        <div class="panel panel-default col-lg-5">
          <div class="panel-heading" style="background-color:rgba(30, 191, 174, 0.68);"><svg class="glyph stroked email"></svg>List of Documents</div>
          <div class="panel-body">
            <div class="canvas-wrapper">
                    <div class="table-responsive " >          
                        <table class="table">
                          <thead>
                            <tr>
                              <th>C.P No.</th>
                              <th>CORRESPONDANCE PAGE</th>
                            </tr>
                          </thead>
                          
                           <tbody>
                            <?php foreach($results as $value){?>
                            <tr>
                              <td><?php  echo $value["cp_no"];?></td>
                              <td><a style="color:blue" href="<?php echo base_url().'repository/'.str_replace("/","_", $folder[0]['file_ref_sl_no']).'/'.$value["letter_name"]?>" target="_blank"><?php echo $value["letter_name"];?></td>
                              
                              
                            </tr>
                            
                           <?php } ?>
                          </tbody>
                          </table>
                          </div>
                          
                           
                    <?php echo $links;?>
                  </div>

            </div>
          </div>
          
        <div class="panel panel-default chat col-lg-7">
          <div class="panel-heading" style="background-color:rgba(30, 191, 174, 0.68);" id="accordion"><svg class="glyph stroked two-messages"><use xlink:href="#stroked-two-messages"></use></svg> Note Sheet</div>
        
          <div class="panel-body">
            <ul>
              <?php $i=1; $c=count($file_note);foreach($file_note as $value){?>
              <li class="left clearfix">
                <span class="chat-img <?php if($i%2!=0) echo 'pull-left' ;else echo 'pull-right';?>">
                  <label class="numberCircle"><?php echo $c ;?></label>
                </span>
                <div class="chat-body clearfix">
                  
                  <p>
                    <?php echo $value["note_text"];?>
                  </p>
                  <p>
                    <?php echo 'By: <span style="font-weight: bold">'.$value["name"].'</span>  '.'Dated : <span style="font-weight: bold">'.$value["date_of_action"].'</span>';?>
                  </p>
                </div>
              </li>
              <?php $i++;$c--;}?>
              
            
            </ul>
          </div>
          
        </div>
      </div>
    </div><!--/.row-->
    
    