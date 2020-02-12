<?php
session_start();
require('Database.php');
class Controller extends Database
{
	public function login($data)
	{
		$result=$this->db->query('select * from admin where email="'.$data['email'].'" and password="'.$data['password'].'"');
		$d= $result->fetch(PDO::FETCH_ASSOC);
		if($d){
			$_SESSION['adminID']=$d['id'];
			$_SESSION['name']=$d['name'];
			header('Location: dashboard.php');
		}else{
			$_SESSION['msg']='Wrong email or password';
			header('Location: index.php');
		}
	}
	public function logout()
	{
		session_destroy();
		header('Location: index.php');
	}
	public function is_logged_in()
	{
		if(!isset($_SESSION['adminID'])){
			header('Location: index.php');
		}
	}
	public function new_admin_data($data)
	{
		$this->insert('admin',$data);
		header('Location: admin_list.php');
	}
	public function get_admin_data()
{
	$result=$this->getData('admin','1 order by id desc');
	return $result;
}
public function get_for_update_admin($id)
{
	$d=$this->getData('admin','id='.$id);
	return $d->fetch(PDO::FETCH_ASSOC);
}
public function edit_admin($data)
	{
		$this->update ('admin',$data,'id='.$data['id']);
		header('Location: admin_list.php');
	}
	public function get_for_delete_admin($id)
{
	$this->delete('admin','id='.$id);
	header('Location:admin_list.php');
}
	public function new_product($data)
	{
		$target_dir = "../upload/";
		$target_file = $target_dir . basename($_FILES["photo"]["name"]);
		move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file);
		$data['photo']=$_FILES["photo"]["name"];
		$this->insert('products',$data);
		header('Location: product_list.php');
	}
public function get_product()
{
	$result=$this->getData('products','1 order by id desc');
	return $result;
}
public function get_for_update($id)
{
	$d=$this->getData('products','id='.$id);
	return $d->fetch(PDO::FETCH_ASSOC);
}
	public function edit_product($data)
	{
		if($_FILES["photo"]["name"]!=''){
		$target_dir = "../upload/";
		$target_file = $target_dir . basename($_FILES["photo"]["name"]);
		move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file);
		$data['photo']=$_FILES["photo"]["name"];
		} else{
		unset($data['photo']);
	}
		$this->update ('products',$data,'id='.$data['id']);
		header('Location: product_list.php');
	}	
public function get_for_delete($id)
{
	$this->delete('products','id='.$id);
	header('Location:product_list.php');
}
public function stock_product()
{
	$result=$this->getData('stock_in','1 order by id desc');
	return $result;
}
public function stock_for_update($id)
{
	$d=$this->getData('stock_in','id='.$id);
	return $d->fetch(PDO::FETCH_ASSOC);
}
	public function stock_edit_product($data)
	{
		if ($data['discount']!="") {
			$this->update ('stock_in',$data,'id='.$data['id']);
		}
		else{
			unset($data['discount']);
		}
		header('Location: stock_in_list.php');
	}
	public function stock_out_product()
{
	$result=$this->getData('stock_out','1 order by id desc');
	return $result;
}
public function stock_out_for_update($id)
{
	$d=$this->getData('stock_out','id='.$id);
	return $d->fetch(PDO::FETCH_ASSOC);
}
	public function stock_out_edit_product($data)
	{
		if ($data['discount']!="") {
			$this->update ('stock_out',$data,'id='.$data['id']);
		}
		else{
			unset($data['discount']);
		}
		header('Location: stock_out_list.php');
	}
	public function get_for_delete_stock($id)
{
	$this->delete('stock_in','id='.$id);
	header('Location:stock_in_list.php');
}
	public function get_for_delete_stock_out($id)
{
	$this->delete('stock_out','id='.$id);
	header('Location:stock_out_list.php');
}
public function wastage_get_product()
{
	$result=$this->getData('wastage','1 order by id desc');
	return $result;
}
public function wastage_for_update($id)
{
	$d=$this->getData('wastage','id='.$id);
	return $d->fetch(PDO::FETCH_ASSOC);
}
public function wastage_edit_product($data)
	{
		
		$this->update ('wastage',$data,'id='.$data['id']);
		header('Location: wastage_product_list.php');
	}
public function get_for_delete_wastage($id)
{
	$this->delete('wastage','id='.$id);
	header('Location:wastage_product_list.php');
}

public function returns_get_product()
{
	$result=$this->getData('return_table','1 order by id desc');
	return $result;
}
public function returns_for_update($id)
{
	$d=$this->getData('return_table','id='.$id);
	return $d->fetch(PDO::FETCH_ASSOC);
}
public function returns_edit_product($data)
	{
		$this->update ('return_table',$data,'id='.$data['id']);
		header('Location:returns_product_list.php');
	}
public function get_for_delete_returns($id)
{
	$this->delete('return_table','id='.$id);
	header('Location:returns_product_list.php');
}
}