
	<section class="main-container">
		<div class="main-wrapper">
				<?php 
				if($print=$this->session->flashdata('signup'))
				{
				?>		
				<h2><?= $print ?></h2>
				<?php
				}
				elseif($print=$this->session->flashdata('logout'))
				{	
				?>		
				<h2><?= $print ?></h2>
				<?php
				}
				else
				{
				?>	
				<h2>"Please Sign In or Sign Up!"</h2>
				<?php
				}
				?>	 	
		</div>
	</section>

</body>
</html>