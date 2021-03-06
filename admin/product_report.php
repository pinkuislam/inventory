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
      <?php  $j=$obj->getData('products','id='.$_GET['id']);
       $name=$j->fetch(PDO::FETCH_ASSOC);
       ?>
      <h1>
        Product Report <?php echo $name['name']; ?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="new_product.php">Product Report <?php echo $name['name']; ?> </a></li>
      </ol>
    </section>
    <!-- Main content -->
      <form action="product_report_out.php?id=<?php echo $_GET['id']; ?>"     method="post" class="form-inline">
      &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
  <div class="form-group">
    <label for="d1">Start Date:</label>
     <input type="text" name="d1" autocomplete="off" class="datepicker" size="50">
  </div>
  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
  <div class="form-group">
    <label for="d2">End Date:</label>
   <input type="text" name="d2" autocomplete="off" class="datepicker" size="50">
  </div>
  <br><br>  
  <input type="submit" class="btn btn-primary btn-block" value="Submit">
</form>
    <section class="content">
      <div class="row">
        <div class="box">
          <div class="box-body">
              <div class="col-xs-12 col-md-12">
      <table class="table table-bordered">
	<caption class="text-center text-info text-uppercase">Product Report <?php echo $name['name']; ?></caption>
	<thead class="bg-primary">
		<tr>
			<th>Date</th>
			<th>Opening Stock</th>
			<th>Stock In</th>
      <th>Stock Out</th>
      <th>Wastage</th>
      <th>Reurns</th>
			<th>Closing Stock</th>
		</tr>
	</thead>
 <tbody>
  <?php 
for ($i=1; $i <=date('d'); $i++) { 
$d=date('Y-m').'-'.$i; 
  $purchase=$obj->db->query("select sum(quantity) as purchase from stock_in where date <'".$d."' and productid=".$_GET['id'])->fetch(PDO::FETCH_ASSOC);
  $sales=$obj->db->query("select sum(quantity) as sales from stock_out where date <'".$d."' and productid=".$_GET['id'])->fetch(PDO::FETCH_ASSOC);
  $wastage=$obj->db->query("select sum(quantity) as wastage from wastage where date <'".$d."' and productid=".$_GET['id'])->fetch(PDO::FETCH_ASSOC);
  $returns=$obj->db->query("select sum(quantity) as returns from return_table where date <'".$d."' and productid=".$_GET['id'])->fetch(PDO::FETCH_ASSOC);
   $purcha=$obj->db->query("select sum(quantity) as purcha from stock_in where date ='".$d."' and productid=".$_GET['id'])->fetch(PDO::FETCH_ASSOC);
    $sal=$obj->db->query("select sum(quantity) as sal from stock_out where date ='".$d."' and productid=".$_GET['id'])->fetch(PDO::FETCH_ASSOC);
  $wast=$obj->db->query("select sum(quantity) as wast from wastage where date ='".$d."' and productid=".$_GET['id'])->fetch(PDO::FETCH_ASSOC);
   $retur=$obj->db->query("select sum(quantity) as retur from return_table where date ='".$d."' and productid=".$_GET['id'])->fetch(PDO::FETCH_ASSOC);
   ?>
<tr>
  <td><?php echo date('Y-m').'-'.$i ?></td>
  <td class="text-center"><?php echo number_format($stk=$purchase['purchase']-($sales['sales']+$wastage['wastage'])+$returns['returns'],2); ?></td>
  <td><?php echo number_format($purcha['purcha'],2); ?></td>
  <td><?php echo number_format($sal['sal'],2); ?></td>
  <td><?php echo number_format($wast['wast'],2); ?></td>
  <td><?php echo number_format($retur['retur'],2); ?></td>
  <td><?php echo number_format($stk+$purcha['purcha']-($sal['sal']+$wast['wast'])+$retur['retur'],2); ?></td>
</tr>
<?php } ?>
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
  <script>
    $(function() {
      $(".datepicker").datepicker({ // class die kora hoyece
        dateFormat: 'yy-mm-dd',
        changeMonth: true,
        changeYear: true
      });
    });
</script>

