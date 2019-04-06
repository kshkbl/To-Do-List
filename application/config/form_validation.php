
<?php

$config =   [
		  	'loginvalid'=>  [
			  					[	'field'=>'uname',
			  						'label'=>'User ID',
			  						'rules'=>'required|trim'
			  				 	],
			  				 	[
			  						'field'=>'pwd',
			  						'label'=>'Password',
			  						'rules'=>'required'
			  				 	]
		  				    ],
		  	
		  	'signupvalid'=> [
			  					[	'field'=>'first',
			  						'label'=>'Firstname',
			  						'rules'=>'required|alpha|trim'
			  				 	],
			  				 	[
			  						'field'=>'last',
			  						'label'=>'Lastname',
			  						'rules'=>'required|alpha|trim'
			  				 	],
			  				 	[
			  						'field'=>'email',
			  						'label'=>'Email ID',
			  						'rules'=>'required|trim|valid_email'
			  				 	],
			  				 	[
			  						'field'=>'uname',
			  						'label'=>'User ID',
			  						'rules'=>'required|alpha|trim'
			  				 	],
			  				 	[
			  						'field'=>'pwd',
			  						'label'=>'Password',
			  						'rules'=>'required'
			  				 	]
		  				    ],

		  	'addnewvalid'=> [
			  					[	'field'=>'name',
			  						'label'=>'Task',
			  						'rules'=>'required|trim'
			  				 	],
			  				 	[	'field'=>'type',
			  						'label'=>'Type',
			  						'rules'=>'required'
			  				 	]
		  				    ]			  
			];