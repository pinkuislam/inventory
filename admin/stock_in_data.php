<?php
include('../class/Controller.php');
$obj=new Controller();
$info=$obj->getData('products','id='.$_POST['productID'])->fetch(PDO::FETCH_ASSOC);
echo json_encode($info);
?>