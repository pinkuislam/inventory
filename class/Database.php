<?php

/**
* 
*/
class Database 
{
	public $db=NULL;
	function __construct()
	{
		$this->db=new PDO('mysql:host=localhost;dbname=php_project','root','');
	}
	public function insert($table,$data)
	{
		$column=array();
		$values=array();
		foreach ($data as $key => $value) {
			 array_push($column, $key);
			 array_push($values, '"'.$value.'"');
		}
		$cols=implode(',',$column);
		$val=implode(',',$values);
	
		$this->db->query('insert into '.$table.' ('.$cols.') values('.$val.')');
	}
	
	public function getData($table,$where)
	{
		$d=$this->db->query('select * from '.$table.' where '.$where);
		return $d;
	}
	public function update($table,$data,$where)
	{
		$col=array();
		foreach ($data as $key => $value) {
			array_push($col, $key.'="'.$value.'"');
		}
		$cols=implode(',',$col);
	
		$this->db->query('update  '.$table.' set '.$cols.'  where '.$where);
		
	}
	public function delete($table,$where)
	{
		$this->db->query('delete from '.$table.' where '.$where);	
	}


}