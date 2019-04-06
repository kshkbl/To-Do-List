
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
	<title>TO DO</title>
	<?= link_tag('https://fonts.googleapis.com/css?family=Abel') ?> 
	<?= link_tag('assets/css/resetstyle.css') ?>
	<?= link_tag('assets/css/style.css') ?>    
</head>
<body>

	<header>
			<nav>
				<div class="main-wrapper">
					<ul>
						<li><?= anchor('welcome','Home'); ?></li>
					</ul>
					<div class="nav-login">
							<?php echo form_open('welcome/login'); ?>
								
								<?php echo form_input(['name'=>'uname','placeholder'=>'Username/e-mail','value'=>set_value('uname')]); ?>
								<!-- <?php echo form_error('uname'); ?> -->
								
								<?php echo form_password(['name'=>'pwd','placeholder'=>'password','value'=>set_value('pwd')]); ?>
								<!-- <?php echo form_error('pwd'); ?> -->
								
								<?php echo form_button(['name'=>'sublogin', 'content'=>'Sign In','type'=>'submit']); ?>
							
							<?php echo form_close(); ?>	
							
							<?= anchor('welcome/signupform','Sign up'); ?>
					</div>
				</div>
			</nav>
	</header>
