
	<section class="main-container">
		<div class="main-wrapper">
			<h2>Signup</h2>
			<!-- <form class="signup-form" action="includes/formhandle.php" method="POST">
				<input type="text" name="first" placeholder="Firstname" required>
				<input type="text" name="last" placeholder="Lastname" required>
				<input type="text" name="email" placeholder="E-mail" required>
				<input type="text" name="uid" placeholder="Username" required>
				<input type="password" name="pwd" placeholder="Password" required>
			    <button type="submit" name="subsign">Sign up</button>
			</form> -->
			 <?php echo form_open('welcome/signup', 'class="signup-form"'); ?>
			
				<?php echo form_input(['name'=>'first','placeholder'=>'Firstname','value'=>set_value('first')]); ?>
				<?php echo form_error('first'); ?>

				<?php echo form_input(['name'=>'last','placeholder'=>'Lastname','value'=>set_value('last')]); ?>
				<?php echo form_error('last'); ?>
				
				<?php echo form_input(['name'=>'email','placeholder'=>'E-mail','value'=>set_value('email')]); ?>
				<?php echo form_error('email'); ?>
				
				<?php echo form_input(['name'=>'uname','placeholder'=>'Username','value'=>set_value('uname')]); ?>
				<?php echo form_error('uname'); ?>
				
				<?php echo form_password(['name'=>'pwd','placeholder'=>'Password','value'=>set_value('pwd')]); ?>
				<?php echo form_error('pwd'); ?>
				
				<?php echo form_button(['name'=>'subsign', 'content'=>'Sign Up','type'=>'submit']); ?>
			
			<?php echo form_close(); ?>	
		</div>
	</section>

</body>
</html>


						