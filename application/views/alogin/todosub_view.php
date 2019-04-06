
	<section>
		<h1 class="head"><?php echo $fname." ".$lname?></h1>
		<?php 
		if($print=$this->session->flashdata('login'))
		{
		?>		
		<h2 class="head"><?= $print ?></h2>
		<?php
		}
		?>
		<div class="list">
			<h1 class="header">SUBTASKS.</h1>
		    	        <?php 
		    	        if(count($subarticles)) 
		    	        {
		    	        ?>
			            <ul class="items">
			            <?php 
			            foreach ($subarticles as $subitem)
			            { 
			            ?>
						    <li>
								<span class="<?php echo $subitem->done?'done':''; ?> <?php echo $subitem->colour; ?>"><?php echo $subitem->subtask."(".$subitem->colour.")";?></span>
								<?php 
								if(!$subitem->done)
								{
								?>
									<?= anchor("worksub/marksub/{$subitem->id}",'Mark As Done','class="done-button"'); ?>
								<?php
								}
								else
								{
								?>	
									<?= anchor("worksub/unmarksub/{$subitem->id}",'Not Yet Done','class="done-button"'); ?> 
								<?php	
								}	
								?>
								<?= anchor("worksub/editsub/{$subitem->id}",'Edit','class="done-button"'); ?>
								<?= anchor("worksub/delsub/{$subitem->id}",'Delete','class="done-button"'); ?>
						    </li>
						<?php
						}
						?>    
				        </ul>
				        <?php
				    	}
				        ?>
				   
			<?php echo form_open('worksub/addnewsub','class="itemp-add"'); ?>
				
				<?php echo form_input(['name'=>'name','placeholder'=>'Type a new item.','class'=>'input','autocomplete'=>'off']); ?>

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
				<?php echo form_dropdown('type',$options); ?>

				<?php echo form_button(['name'=>'add', 'content'=>'Add New','type'=>'submit','class'=>'submit']); ?>
			
			<?php echo form_close(); ?>	
			
			<div class="delbutton">
			<?= anchor('worksub/delallsub','Delete All','class="formbtn"'); ?>
			</div>    
	    </div>
	    <?= anchor('work','Parent Task','class="formbtn"'); ?>
	</section>    

</body>
</html>