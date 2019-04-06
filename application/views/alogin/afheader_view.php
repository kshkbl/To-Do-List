
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
	<title>TO DO</title>
	<?= link_tag('https://fonts.googleapis.com/css?family=Abel') ?> 
	<?= link_tag('assets/css/resetstyle.css') ?>
	<?= link_tag('assets/css/style.css') ?>    
	<?= link_tag('assets/css/main.css') ?>
</head>
<body>

	<header>
			<nav>
				<div class="main-wrapper">
					<ul>
						<li><?= anchor('welcome','Home'); ?></li>
					</ul>

					<div class="nav-login">	
						<?php echo form_open('welcome/logout'); ?>	
							<?php echo form_button(['name'=>'sublogout', 'content'=>'Sign Out','type'=>'submit']); ?>
						<?php echo form_close(); ?>	
					</div>
				</div>
			</nav>
	</header>
