<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<?php
 require('head_c.php');
 $_SESSION['menu']='report';
  ?>
<div class="wrapper">
  <?php
  require('leftMenu.php');
  ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Stock Reports Out
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="new_product.php">Stock Reports Out </a></li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="box">
          <div class="box-body">
              <div class="col-xs-12 col-md-12">
      <table class="table table-bordered">
	<caption class="text-center text-info text-uppercase">Stock Reports Out</caption>
	<thead class="bg-primary">
		<tr>
			<th>Name</th>
			<th>Stock</th>
			<th>Price</th>
			<th>Stock Value</th>
		</tr>
	</thead>
 <tbody>
<?php 
$product=$obj->getData('products','1');
while ($d=$product->fetch(PDO::FETCH_ASSOC)) {
	$sale=$obj->db->query("select sum(quantity) as sales from stock_out where date between '".$_POST['d1']."' and '".$_POST['d2']."' and productid=".$d['id'])->fetch(PDO::FETCH_ASSOC);
	$purchase=$obj->db->query("select sum(quantity) as purchase from stock_in where date between '".$_POST['d1']."' and '".$_POST['d2']."' and productid=".$d['id'])->fetch(PDO::FETCH_ASSOC);
	$waste=$obj->db->query("select sum(quantity) as waste from return_table where date between '".$_POST['d1']."' and '".$_POST['d2']."' and productid=".$d['id'])->fetch(PDO::FETCH_ASSOC);
 ?>
 <tr>
 	  <td class="text-left"><a href="product_report.php?id=<?php echo $d['id'] ?>" ><?php echo $d['name'] ?></a></td>
 	<td class="text-center"><?php echo $stk=$purchase['purchase']-($sale['sales']+$waste['waste']); ?></td>
 	<td class="text-right"><?php echo number_format($d['price'],2); ?></td>
 	<td class="text-right"><?php echo number_format($stk*$d['price'],2); ?></td>
 </tr>

 <?php 
}
  ?>
  </tbody>
  </table>
       </div> 
   </div>
</div>
</div>
</section>
   
        <!-- /.content -->
      </div>
    </div>
    <!-- ./wrapper -->
    <?php require('footer_c.php');?>


