<?php

 require('head_c.php');
  $_SESSION['menu']='inventory';
$data=$obj->wastage_get_product();
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
        Wastage Product List
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="new_product.php">Wastage Product List </a></li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="box">
          <div class="box-body">
              <div class="col-xs-12 col-md-12">
                <table id="example1" class="table table-bordered">
                  <thead class="bg-primary">
                    <tr>
                      <th>SL</th>
                      <th>Product Name</th>
                      <th>Quantity</th>
                      <th>Total</th>
                      <th>Date</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $i=0;
                     while ($d=$data->fetch(PDO::FETCH_ASSOC)) {++$i;
                      $p=$obj->getData('products','id='.$d['productid'])->fetch(PDO::FETCH_ASSOC);
                      ?>
                    <tr>
                      <td><?php echo $i ?></td>
                      <td><?php echo $p['name'] ?></td>
                      <td><?php echo $d['quantity'] ?></td>
                      <td><?php echo $d['total'] ?></td>
                      <td><?php echo $d['date'] ?></td>
                      <td>
                        <a href="wastage_edit.php?id=<?php echo $d['id']?>" class="btn btn-success btn-sm">Edit</a>
                        <a href="wastage_delete.php?id=<?php echo $d['id']?>" class="btn btn-danger btn-sm">Delete</a>

                      </td>
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
