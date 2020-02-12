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
        Sales Reports
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="new_product.php">Sales Reports </a></li>
      </ol>
    </section>
    <!-- Main content -->
      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="form-inline">
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
  <caption class="text-center text-info text-uppercase">Sales Report</caption>
  <thead class="bg-primary">
    <tr>
      <th>Date</th>
      <th>Total Sales</th>
    </tr>
  </thead>
 <tbody>
<?php 
if (isset($_POST['d1'])) {
$period= new DatePeriod(
new DateTime($_POST['d1']),
new DateInterval('P1D'),
new DateTime($_POST['d2'])
  );
$total_amount=0;
foreach ($period as $key => $value) {
$d=$value->format('Y-m-d');
$sale=$obj->db->query("SELECT sum(`total`) as s FROM `stock_out` WHERE date='".$d."'")->fetch(PDO::FETCH_ASSOC);
$total_amount+=$sale['s'];
 ?>
 <tr>
  <td><?php echo $d;?></td>
  <td class="text-center"><?php echo number_format($sale['s'],2)?></td>
 </tr>
 <?php } }
else{
  $period= new DatePeriod(
new DateTime(date('Y-m').'-01'),
new DateInterval('P1D'),
new DateTime(date('Y-m-d'))
  );
$total_amount=0;
  foreach ($period as $key => $value) {
$d=$value->format('Y-m-d');
$sale=$obj->db->query("SELECT sum(`total`) as s FROM `stock_out` WHERE date='".$d."'")->fetch(PDO::FETCH_ASSOC);
$total_amount+=$sale['s'];
?>
  <tr>
  <td><?php echo $d;?></td>
  <td class="text-center"><?php echo number_format($sale['s'],2)?></td>
 </tr>
<?php
}}
 ?>
  </tbody>
  <tfoot>
    <tr>
      <td class="text-center text-info">Total</td>
      <td class="text-center text-info"><?php echo number_format($total_amount,2);?></td>
    </tr>
  </tfoot>
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

