
    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel-heading"><svg class="glyph stroked email"></svg> Attaching the Letter to a File</div>
          <div class="panel-body">
             <?php echo validation_errors('<div style="color:red;">','</div>');?>
                 
                   <div class="form-group has-success">
                   <span style="color:green"><?php echo $this->session->flashdata('success_message'); ?></span>
                    </div>
                <?php if(isset($success))
                {
                echo $success."<br>";
                foreach($success_file as $key=>$value)
                {
                   echo $value."<br>";
                }
                }
                ?>
                  
                   <?php echo form_open_multipart('letter_to_file/insert_to_file/'.$this->uri->segment(3),"class='form-horizontal'");?> 
          
 <!--  coading for FILE CREATED Field -->  

                  <div class="form-group">
        <label for="search_file" class="col-md-3 control-label">Search File<span style="color:red; font-size:20px">*</span>:</label>
          
          <div class="col-md-4 has-success">
            
          <input type="text" class="form-control" id="search_file" name="search_file" onkeyup="autocomplet_search_key()" required autocomplete="off">
          <input type="hidden" id="fileid" name="fileid" value="">

                   <ul id="file_list" class="list-group col-md-12 uli"></ul>
                 
                </div>

          </div>
          
   
          
      
      <div class="form-group"> 
         <input type="hidden" value="<?php echo base_url(); ?>" id="base_url">
          <label  class="col-md-3 control-label"></label>
           <div class="col-md-4 has-success">
      <input type="submit" class="btn btn-primary" value="Insert" />
            </div>
         </div>
          </form>
        </div>
        </div>
        </div>
        
                
      </div><!--/.col-->

    </div><!--/.row-->


  
   