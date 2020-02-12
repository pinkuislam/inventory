<?php 
include('../class/Controller.php');
$obj=new Controller();
$obj->get_for_delete_stock_out($_GET['id']);
 ?>