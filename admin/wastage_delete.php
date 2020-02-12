<?php 
include('../class/Controller.php');
$obj=new Controller();
$obj->get_for_delete_wastage($_GET['id']);
 ?>