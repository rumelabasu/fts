<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" href="<?php echo base_url(); ?>style/images/fts.png" type="image/gif" >
<title>Dashboard</title>

<link href="<?php echo base_url(); ?>style/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>style/css/styles.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>style/css/jquery-ui.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>style/css/custom_style.css" rel="stylesheet">
<input type="hidden" value="<?php echo base_url(); ?>" id="site_url">
<script src="<?php echo base_url(); ?>style/js/jquery-1.11.1.min.js"></script>

<!--Icons-->


<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

</head>

<body>
  <nav class="navbar navbar-inverse navbar-fixed-top"  role="navigation">
    <div class="container-fluid">
      <div class="navbar-header" >
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#"><span ><?php if($this->session->userdata('file_letter')=="file"){ echo "File" ;?><?php } else if($this->session->userdata('file_letter')=="letter"){ echo "Letter" ;}?></span> Tracking System</a>
        <ul class="user-menu">
          <li class="dropdown pull-right">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> <?php echo $this->session->userdata('fullname');?> <span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="<?php echo base_url().'user/profile';?>"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Profile</a></li>
              <li><a href="<?php echo base_url().'user/setting';?>"><svg class="glyph stroked gear"><use xlink:href="#stroked-gear"></use></svg> Setting</a></li>
              <li><a href="<?php echo base_url().'user/logout';?>"><svg class="glyph stroked cancel"><use xlink:href=""></use></svg> Logout</a></li>
            </ul>
          </li>
        </ul>

<?php if($this->session->userdata('file_letter')=="letter") {?>
         <ul class="user-menu" id="nc">
          
        </ul>
        <?php }?>
      </div>
              
    </div><!-- /.container-fluid -->
  </nav>
    