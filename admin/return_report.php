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
      <h1 class="text-center text-info">
        Return Report
      </h1>
      <?php 
      $j=$obj->getData('products','id='.$_GET['id'])->fetch(PDO::FETCH_ASSOC);
       ?>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="return_product.php">Return Product </a></li>
      </ol>
      <form class="form-inline"  action="return_report_date.php" method="post">
        <input type="hidden" name="id" value="<?php echo $_GET['id']?>">
        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
  <div class="form-group">
    <label for="sd">Start Date:</label>
    <input type="text" class="form-control" autocomplete="off" id="datepicker" name="d1" size="50">
  </div>
  <div class="form-group">
    <label for="ed">End Date:</label>
    <input type="text" class="form-control" autocomplete="off" id="datepicker1" name="d2"size="50" >
  </div> 
  <br> <br>
  <button type="submit" class="btn btn-block btn-primary">Submit</button>
</form>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="box">
          <div class="box-body">
              <div class="col-xs-12 col-md-12">

             <h3 class="text-center text-info ">Return Report <?php echo $j['name']?> </h3>
                <table id="example1" class="table table-bordered">
                  <thead>
                    <tr class="bg-red">
              <th>Date</th>
              <th>Return</th>
              <th>Price</th>
            </tr>
                  </thead>
                  <tbody>
            <?php 
            $total=0;
            $totalq=0;
for ($i=1; $i<=date('d');$i++) {
  $d=date('Y-m').'-'.$i;
              $retur=$obj->db->query("select sum(quantity) as retur from return_table where date ='".$d."' and productid=".$_GET['id'])->fetch(PDO::FETCH_ASSOC);
              $totalq+=$retur['retur'];
              $total+=$retur['retur']*$j['price'];
                    ?>
                    <tr>
  <td class="text-left"> <?php echo date('Y-m').'-'. $i ?></td>
 <td class="text-center"> <?php echo number_format($retur['retur'],2);?></td>
 <td class="text-center"> <?php echo number_format($retur['retur']*$j['price'],2);?></td>
            </tr>
                    <?php } ?>
                  </tbody>
                    <tfoot>
                    <tr>
                      <th class="text-center text-info">Total</th>
                      <td class="text-center text-info"><?php echo number_format($totalq,2); ?></td>
                      <td class="text-center text-info"><?php echo number_format($total,2); ?></td>
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
  $( function() {
    $( "#datepicker" ).datepicker({
      dateFormate:'yy-mm-dd',
      changeMonth:true,
      changeYear:true
    });
  } );
   $( function() {
    $( "#datepicker1" ).datepicker({
      dateFormate:'yy-mm-dd',
      changeMonth:true,
      changeYear:true
    });
  });
  </script>


  