<?php

class Tasks_model extends CI_Model
{
	public function extract($userid)
	{
		$sql=$this->db->query("SELECT id, name, done, colour, subcount FROM items WHERE user='$userid';");
			//returning items to be displayed
		return $sql->result();
	}	

	public function editextract($item_id)
	{
		$sql=$this->db->query("SELECT id, name, colour FROM items WHERE id='$item_id';");
			//returning an item to be displayed
		return $sql->row();
	}	

	public function add($item,$type,$userid)
	{
			//Inserting an item for the user
		$sql=$this->db->query("INSERT INTO items (name,user,done,colour) VALUES ('$item','$userid','0','$type');");
	}

	public function updatedit($item,$type,$item_id)
	{
			//Updating an item for the user
		$sql=$this->db->query("UPDATE items SET name='$item',colour='$type' WHERE id='$item_id';");
	}

	public function subinteract($item_id)
	{
		$sql=$this->db->query("SELECT * FROM subitems WHERE item_id='$item_id';");
			//returning no of subitems to be displayed
		$donecheck=$sql->result();	

		$flag='0';
		foreach ($donecheck as $key) 
		{
			if($key->done!='0')
				continue;
			else
				$flag='1';
			break;
		}	
		if($flag=='1')
			return true;
		else
			return false;
	
	}	

	public function marking($item_id,$check)
	{
		if($check=="mark")
		{
			//Marking an item
			$sql=$this->db->query("UPDATE items SET done='1' WHERE id='$item_id';"); 
		}
		if($check=="unmark")
		{
			//Unmarking an item
			$sql=$this->db->query("UPDATE items SET done='0' WHERE id='$item_id';");
		}
	}

	public function delit($item_id='0',$check,$userid='0')
	{
		if ($check=="single" && $userid=='0') 
		{
			//Deleting a specific item for the given user
			$sql=$this->db->query("DELETE FROM items WHERE id='$item_id';");
		}

		if ($check=="all" && $item_id=='0') 
		{
			//Deleting all the items of a specific user
			$sql=$this->db->query("DELETE FROM items WHERE user='$userid';");
		}
	}	
}
