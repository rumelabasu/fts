<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Forms</title>

<link href="<?php echo base_url(); ?>style/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>style/css/styles.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>style/css/custom_style.css" rel="stylesheet">
<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

</head>

<body style="padding-top:0px;background:#ffffff">
  <div><img class="img-responsive" style="margin:0 auto" src="<?php echo base_url(); ?>style/images/img_login_headr.jpg"></div><br><br>
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
      <div style="background:#ddd">
				<div class="panel-heading" style="border-bottom:1px solid #fff;"><svg class="glyph stroked email"></svg>Log in</div>
                
				<div class="panel-body" style="padding-left:50px">
          <?php echo form_open('user/login',"class='form-horizontal'");?>
						<fieldset>
							
  
  <div class="form-group">
    <label for="username" class="col-md-3 control-label">Username:</label>
    <div class="col-md-6 has-success">
    <input type="text" class="form-control" id="username" name="username">
  </div>
  </div>
  
  <div class="form-group">
    <label for="pwd" class="col-md-3 control-label">Password:</label>
    <div class="col-md-6 has-success">
    <input type="password" class="form-control" id="pwd" name="pwd">
  </div>
  </div>
<div class="form-group">
      <center><span style="color:red"><?php echo $this->session->flashdata('error_message'); ?></span></center>
  </div>
  <div class="form-group">
      <center><span style="color:green"><?php echo $this->session->flashdata('success_message'); ?></span></center>
  </div>
  <div class="form-group">
<div style="padding-left:80px">
    <button type="submit" class="btn btn-primary">Login</button>
  <button type="reset" class="btn btn-primary">Reset</button>  
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  


  <a href="<?php echo base_url(); ?>user/signup" style="color:#03C"><u>Register</u></a><br>
  
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  
  <a href="<?php echo base_url(); ?>user/forget_password" style="color:#03C"><u>Forget Password</u></a>
  </div></div>
			</fieldset>
					</form>
				</div>
			</div>
		</div><!-- /.col-->
		
		
  <script src="<?php echo base_url(); ?>style/js/jquery-1.11.1.min.js"></script>
  <script src="<?php echo base_url(); ?>style/js/bootstrap.min.js"></script>
</body>

</html>
