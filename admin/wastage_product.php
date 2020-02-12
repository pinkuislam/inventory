<?php
 require('head_c.php');
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
       Wastage Report
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="wastage_product.php"> Wastage Report </a></li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="box">
          <div class="box-body">
              <div class="col-xs-12 col-md-12">


                <table id="example1" class="table table-bordered">
                  <thead>
                    <tr class="bg-red">
              <th>Name</th>
              <th>Wastage</th>
              <th>price</th>
            </tr>
                  </thead>
                  <tbody>
                    <?php 
                   $products=$obj->getData('products','1');
                   $total=0;
                    $totalq=0;
          while ($d=$products->fetch(PDO::FETCH_ASSOC)) {
              $wast=$obj->db->query("select sum(quantity) as wast from wastage where date <='".date('Y-m-d')."' and productid=".$d['id'])->fetch(PDO::FETCH_ASSOC);
              $totalq+=$wast['wast'];
              $total+=$wast['wast']*$d['price'];
                      ?> 
                    <tr>
  <td class="text-left"> <a href="wastage_report.php?id=<?php echo $d['id']?>"><?php echo $d['name']?></a> </td>
<td class="text-center"> <?php echo number_format($wast['wast'],2);?></td>
<td class="text-center"> <?php echo number_format($wast['wast']*$d['price'],2);?></td>
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
  } );
  </script>
   <?php require('footer_c.php');?>

