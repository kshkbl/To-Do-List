
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
			<?php 
			if($print=$this->session->flashdata('edit'))
			{
			?>		
			<h2 class="head"><?= $print ?></h2>
			<?php
			}
			?>
			<?php 
			if($print=$this->session->flashdata('markcheck'))
			{
			?>		
			<h2 class="head"><?= $print ?></h2>
			<?php
			}
			?>

		<div class="list">
		<h1 class="header">TASKS.</h1>
	    	        <?php 
	    	        if(count($articles)) 
	    	        {
	    	        ?>
		            <ul class="items">
		            <?php 
		            foreach ($articles as $item)
		            { 
		            ?>
					    <li>
							<span class="<?php echo $item->done?'done':''; ?> <?php echo $item->colour; ?>"><?php echo $item->name."(".$item->subcount.")(".$item->colour.")"; ?></span>
							<?php 
							if(!$item->done)
							{
							?>
								<?= anchor("work/mark/{$item->id}",'Mark As Done','class="done-button"'); ?>
							<?php
							}
							else
							{
							?>	
								<?= anchor("work/unmark/{$item->id}",'Not Yet Done','class="done-button"'); ?> 
							<?php	
							}	
							?>
							<?php if($item->done=='0'): ?>
								<?= anchor("work/subtask/{$item->id}",'Subtask','class="done-button"');?>
								<?= anchor("work/edit/{$item->id}",'Edit','class="done-button"'); ?>
							<?php endif;?>	
							<?= anchor("work/del/{$item->id}",'Delete','class="done-button"'); ?>
					    </li>
					<?php
					}
					?>    
			        </ul>
			        <?php
			    	}
			        ?>
			   
		<?php echo form_open('work/addnew','class="itemp-add"'); ?>
			
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
		<?= anchor('work/delall','Delete All','class="formbtn"'); ?>
		</div>
	    
	    </div>
	</section>    

</body>
</html>


<!-- 
'black'   =>'casual',
'red'     =>'critical',
'yellow'  =>'priority',
'grey'    =>'mediumpriority',
'pink'    =>'important',
'green'   =>'family',
'liteyelo'=>'deadline',
'purple'  =>'notcritical' -->