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
      <h1 class="text-center text-info">
        Rerutn Product
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="return_product.php">Rerutn Product  </a></li>
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
              <th>Return</th>
              <th>Total</th>
            </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $total=0;
                    $totalq=0;
                   $products=$obj->getData('products','1');
          while ($d=$products->fetch(PDO::FETCH_ASSOC)) {
              $retur=$obj->db->query("select sum(quantity) as retur from return_table where date <='".date('Y-m-d')."' and productid=".$d['id'])->fetch(PDO::FETCH_ASSOC);
              $totalq+=$retur['retur'];
              $total+=$retur['retur']*$d['price'];
                      ?> 
                    <tr>
  <td class="text-left"> <a href="return_report.php?id=<?php echo $d['id']?>"><?php echo $d['name']?></a> </td> 
  <td class="text-center"> <?php echo number_format($retur['retur'],2);?></td>
  <td class="text-center"> <?php echo number_format($retur['retur']*$d['price'],2);?></td>
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
  } );
  </script>

