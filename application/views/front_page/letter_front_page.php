	<div class="col-lg-12  main">			
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Dashboard</h1>
			</div>
		</div><!--/.row-->

		<div class="row">
	<?php if(isset($persent)){?>
		
			
			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
						<h4>Pending letter</h4>
						<div class="easypiechart easypiechart-red"  data-percent="<?php if(isset($persent)) echo round($persent); ?>"><span class="percent"><?php if(isset($persent)) echo round($persent); ?>%</span>
						</div>
					</div>
				</div>
			</div>
		
		<?php } ?>

<?php if(isset($multiple_persent)){
      foreach ($multiple_persent as $key => $value) {
      
	?>
		
			
			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
						<h4><?php echo $multiple_section[$key] ;?></h4>
						<div class="easypiechart easypiechart-red"  data-percent="<?php  echo  round($multiple_persent[$key] ); ?>"><span class="percent"><?php echo  round($multiple_persent[$key] ); ?>%</span>
						</div>
					</div>
				</div>
			</div>
		
		<?php } }?>
</div><!--/.row-->
					
		
	</div>	<!--/.main-->
