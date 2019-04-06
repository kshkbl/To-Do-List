<?php 

class Users_Model extends CI_Model
{
	public function Signin($loginfo)
	{
			//extracting login form user inputs	
		$uname = $loginfo['uname'];
		$pwd   = $loginfo['pwd'];

		$sql=$this->db->query("SELECT * FROM users WHERE user_name='$uname' OR user_email='$uname';");
		$resultCheck = $sql->num_rows();
			//Checking if user is present in the database	
		if ($resultCheck < 1) 
			return false;
		else 
		{
			$pword = $sql->row()->user_pwd;
				//De-hashing the password
			$hashedPwdCheck = password_verify($pwd, $pword);
			if ($hashedPwdCheck == false)
				return false;
				//Returning user details back for starting session
			if ($hashedPwdCheck == true) 
				return $sql->result();
		}
	}

	public function Signupinsert($signinfo)
	{
			//extracting signup form user inputs
		$first = $signinfo['first'];
		$last  = $signinfo['last'];
		$email = $signinfo['email'];
		$uname = $signinfo['uname'];
		$pwd   = $signinfo['pwd'];

		$sql=$this->db->query("SELECT * FROM users WHERE user_name='$uname';");
		$resultCheck = $sql->num_rows();
			//Checking if user already exists in database
		if ($resultCheck > 0) 
			return false;
		else 
		{
				//Hashing the password
			$hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
				//Insert the user into the database
			$this->db->query("INSERT INTO users (user_first,user_last,user_email,user_name,user_pwd) 
								         VALUES ('$first','$last','$email','$uname','$hashedPwd');");
			return true;
		}
	}
}						