<?php if($this->session->userdata('file_letter')=="file"){?>
<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar" style="background-color:rgba(48, 67, 86, 0.96);">
		<ul class="nav menu">
			<li class="<?php if(isset($active) && $active == '') echo 'active';?>"><a href="<?php echo base_url(); ?>home_controller/lettertraking"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg>Letter Tracking&nbsp;&nbsp;<span class="glyphicon glyphicon-arrow-right"></span></a></li>
			<li class="<?php if(isset($active) && $active == 'home_page') echo 'active';?>"><a href="<?php echo base_url(); ?>home_controller/filetraking"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg>Home Page</a></li>
			<li class="<?php if(isset($active) && $active == 'registration_page') echo 'active';?>"><a href="<?php echo base_url(); ?>file_registration"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg>File Registration </a></li>
			<li class="<?php if(isset($active) && $active == 'file_inbox_page') echo 'active';?>"><a href="<?php echo base_url(); ?>file_inbox"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg>File Inbox <?php echo  file_inbox_count()  ;?></a></li>
			<li class="<?php if(isset($active) && $active == 'registered_filelist') echo 'active';?>"><a href="<?php echo base_url(); ?>file_registration/file_regiter"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg>File Created by Me <?php echo  file_registar_count()  ;?></a></li>
			
			<!--/.sidebar-->
	
			<!--<li class="<?php if(isset($active) && $active == 'file_list_page') echo 'active';?>"><a href="<?php echo base_url(); ?>attach_to_file/file_list"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg>Attach Correspondance Page</a></li>-->
			<li class="parent">
				<a href="#" class="<?php if(isset($active) && ($active == 'track_file_bysubject_page' || $active == 'by_section_page' ||$active == 'by_date_page' ||$active == 'by_name_page' ||$active == 'by_description_page' ||$active == 'by_text_page' ||$active =='barcode_page')) echo 'parent-active';?>">
				<span data-toggle="collapse" href="#sub-item-1">
					<svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg>Track File 
				</span></a>
			</a>
				<ul class="<?php if(isset($active) && ($active == 'track_file_bysubject_page' ||$active == 'by_section_page' ||$active == 'by_date_page' ||$active == 'by_name_page' ||$active == 'by_description_page' ||$active == 'by_text_page' || $active =='barcode_page')) echo 'children collapse in'; else echo 'children collapse' ;?>" id="sub-item-1">
                
                <li>
						<a class="<?php if(isset($active) && $active =='by_description_page') echo 'active';?>" href="<?php echo base_url(); ?>file_inbox/track_file_bydescription">
							<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> By Description
						</a>
					</li>
					                    
                    <li>
						<a class="<?php if(isset($active) && $active =='track_file_bysubject_page') echo 'active';?>" href="<?php echo base_url(); ?>file_inbox/track_file_bysubject">
							<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> By Subject
						</a>
					</li>
                    
                    <li>
						<a class="<?php if(isset($active) && $active =='by_section_page') echo 'active';?>" href="<?php echo base_url(); ?>file_inbox/track_file_bysection">
							<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> By Section
						</a>
					</li>
                    
                    <li>
						<a class="<?php if(isset($active) && $active =='by_name_page') echo 'active';?>" href="<?php echo base_url(); ?>file_inbox/track_file_byname">
							<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> By Name
						</a>
					</li>
                    <li>
						<a class="<?php if(isset($active) && $active =='by_text_page') echo 'active';?>" href="<?php echo base_url(); ?>file_inbox/track_file_bytext">
							<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> By Text
						</a>
					</li>
					<li>
						<a class="<?php if(isset($active) && $active =='barcode_page') echo 'active';?>" href="<?php echo base_url(); ?>file_inbox/track_file_bybarcode">
							<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> By Barcode Key
						</a>
					</li>
                    
				</ul>
			</li>
			<?php if($this->session->userdata('user_type')=="admin"){ ?>
			<li class="<?php if(isset($active) && $active == 'user_list_page') echo 'active';?>"><a href="<?php echo base_url(); ?>user/user_list"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg>Manage User</a></li>
			<?php }?>			
</div>
<?php } else if($this->session->userdata('file_letter')=="letter"){?>
<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar" style="background-color:rgba(48, 67, 86, 0.96);">
		<ul class="nav menu">
			<li class="<?php if(isset($active) && $active == '') echo 'active';?>"><a href="<?php echo base_url(); ?>home_controller/filetraking"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg>File Tracking&nbsp;&nbsp;<span class="glyphicon glyphicon-arrow-right"></span></a></li>
			<li class="<?php if(isset($active) && $active == 'home_page') echo 'active';?>"><a href="<?php echo base_url(); ?>home_controller/lettertraking"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg>Home Page</a></li>
			<li class="<?php if(isset($active) && $active == 'registration_page') echo 'active';?>"><a href="<?php echo base_url(); ?>letter_registration"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg>Letter Registration</a></li>
			<li class="<?php if(isset($active) && $active == 'letter_inbox_page') echo 'active';?>"><a href="<?php echo base_url(); ?>letter_inbox"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg>Letter Inbox <?php echo letter_inbox_count()  ;?></a></li>
			<li class="<?php if(isset($active) && $active == 'action_letter_page') echo 'active';?>"><a href="<?php echo base_url(); ?>actionable_letter"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg>Sent Letter (Actionable)</a></li>
			<li class="<?php if(isset($active) && $active == 'registered_letterlist') echo 'active';?>"><a href="<?php echo base_url(); ?>letter_registration/letter_register"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg>Letter Created by Me <?php echo letter_registar_count()  ;?></a></li>
            
            <li class="parent">
				<a href="#" class="<?php if(isset($active) && ($active == 'memo_page' || $active == 'by_category_page' || $active == 'by_text_page' || $active =='by_subject_page' || $active =='by_date_page' || $active =='by_sending_authority_page')) echo 'parent-active';?>">
				<span data-toggle="collapse" href="#sub-item-1">
					<svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg>Track Letter 
				</span></a>
			</a>
				<ul class="<?php if(isset($active) && ($active == 'memo_page'  || $active == 'by_category_page' || $active == 'by_text_page' || $active =='by_subject_page' || $active =='by_date_page' || $active =='by_sending_authority_page')) echo 'children collapse in'; else echo 'children collapse' ;?>" id="sub-item-1">
                
                <li>
						<a class="<?php if(isset($active) && $active =='memo_page') echo 'active';?>" href="<?php echo base_url(); ?>track_letter/track_letter_bymemono">
							<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> By Memo No
						</a>
					</li>
					                    
                    <li>
						<a class="<?php if(isset($active) && $active =='by_text_page') echo 'active';?>" href="<?php echo base_url(); ?>track_letter/track_letter_bytext">
							<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> By Text
						</a>
					</li>
                    
                     <li>
						<a class="<?php if(isset($active) && $active =='by_subject_page') echo 'active';?>" href="<?php echo base_url(); ?>track_letter/track_letter_bysubject">
							<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> By Subject
						</a>
					</li>
					   
					    <li>
						<a class="<?php if(isset($active) && $active =='by_category_page') echo 'active';?>" href="<?php echo base_url(); ?>track_letter/track_letter_bycategory">
							<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> By category
						</a>
					</li>     

					 <li>
						<a class="<?php if(isset($active) && $active =='by_sending_authority_page') echo 'active';?>" href="<?php echo base_url(); ?>track_letter/track_letter_bysending_authority">
							<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> By Sending Authority
						</a>
					</li>

					 <li>
						<a class="<?php if(isset($active) && $active =='by_date_page') echo 'active';?>" href="<?php echo base_url(); ?>track_letter/track_letter_bydate">
							<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> By Date of Letter Creation
						</a>
					</li>


		</ul>

	</div> --><!--/.sidebar-->
	<?php }?>
	