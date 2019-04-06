<?php

class Subtasks_model extends CI_Model
{
	public function extract($match)
	{
		$sql=$this->db->query("SELECT id, subtask, done, colour FROM subitems WHERE item_id='$match';");
			//returning items to be displayed
		return $sql->result();
	}	

	public function add($item,$type,$item_id)
	{
			//Inserting an item for the user
		$sql=$this->db->query("INSERT INTO subitems (item_id,subtask,done,colour) VALUES ('$item_id','$item','0','$type');");
	}

	public function subcount($item_id)
	{
		$sql=$this->db->query("SELECT * FROM subitems WHERE item_id='$item_id';");
		$subcount=$sql->num_rows();	

		$this->db->query("UPDATE items SET subcount='$subcount' WHERE id='$item_id';");
	}

	public function marking($itemid,$check)
	{
		if($check=="mark")
		{
			//Marking an item
			$sql=$this->db->query("UPDATE subitems SET done='1' WHERE id='$itemid';"); 
		}
		if($check=="unmark")
		{
			//Unmarking an item
			$sql=$this->db->query("UPDATE subitems SET done='0' WHERE id='$itemid';");
		}
	}

	public function delit($itemid='0',$match,$parentid='0')
	{
		if ($match=="single" && $parentid=='0') 
		{
			//Deleting a specific item for the given user
			$sql=$this->db->query("DELETE FROM subitems WHERE id='$itemid';");
		}

		if ($match=="all" && $itemid=='0') 
		{
			//Deleting all the items of a specific user
			$sql=$this->db->query("DELETE FROM subitems WHERE item_id='$parentid';");
		}
	}	
}
