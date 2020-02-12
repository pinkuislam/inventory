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
        <?php 
      $j=$obj->getData('products','id='.$_POST['id'])->fetch(PDO::FETCH_ASSOC);
       ?>
      <h1 class="text-center">
        Return Report <?php echo $j['name']?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="new_product.php">Product Report <?php echo $j['name']?> </a></li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="box">
          <div class="box-body">
              <div class="col-xs-12 col-md-12">
             <caption class="text-center text-info text-uppercase"></caption>
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
$period=new DatePeriod(
              new DateTime($_POST['d1']),
              new DateInterval('P1D'),
              new DateTime($_POST['d2']));
            $total=0;
            $totalq=0;
            foreach ($period as $key => $value) {
  $d= $value->format('y-m-d');
              $retur=$obj->db->query("select sum(quantity) as retur from return_table where date ='".$d."' and productid=".$_POST['id'])->fetch(PDO::FETCH_ASSOC);
              $totalq+=$retur['retur'];
              $total+=$retur['retur']*$j['price'];
                    ?>
                    <tr>
  <td class="text-left"> <?php echo $d; ?></td>
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