
	<section class="main-container">
		<div class="main-wrapper">
			<h2 class="head">Edit Here</h2>
			<?php echo form_open("work/update/{$article->id}",'class="itemp-add"'); ?>
			
			<?php echo form_input(['name'=>'name','placeholder'=>'Type a new item.','class'=>'input','autocomplete'=>'off','value'=>set_value('name',$article->name)]); ?>

			<?php $options=[
							'casual'        =>'casual',
							'critical'      =>'critical',
							'priority'      =>'priority',
							'mediumpriority'=>'mediumpriority',
							'important'     =>'important',
							'deadline'      =>'deadline',
							'notcritical'   =>'notcritical'
					 	    ];
			?>		 
			<?php echo form_dropdown('type',$options,$article->colour); ?>

			<?php echo form_button(['name'=>'add', 'content'=>'Update','type'=>'submit','class'=>'submit']); ?>
		
		<?php echo form_close(); ?>	
		</div>
	</section>

</body>
</html>


						<!-- 'value'=>set_value($article->name) -->
<!-- Blue for Low Priority
Green for Medium Priority
Yellow for High Priority
Red for Urgent Priority -->

<!-- 'grey'    =>'casual',
'red'     =>'Urgent Priority',
'yellow'  =>'High Priority',
'green'   =>'Medium Priority',
'purple'  =>'Low Priority' -->