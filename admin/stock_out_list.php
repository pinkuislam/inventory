<?php

 require('head_c.php');
  $_SESSION['menu']='inventory';
$data=$obj->stock_out_product();
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
        Stock Out List
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="new_product.php">Stock Out List </a></li>
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
                      <th>Admin ID</th>
                      <th>Product Name</th>
                      <th>Invoice NO</th>
                      <th>Quantity</th>
                      <th>Discount</th>
                      <th>Total</th>
                      <th>Date </th>
                      <th>Customer Info</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                     <?php
                     while ($d=$data->fetch(PDO::FETCH_ASSOC)) {
                      $p=$obj->getData('products','id='.$d['productid'])->fetch(PDO::FETCH_ASSOC);
                      ?>
                    <tr>
                      <td><?php echo $d['adminid'] ?></td>
                      <td><?php echo $p['name'] ?></td>
                      <td><?php echo $d['invoice_no'] ?></td>
                      <td><?php echo $d['quantity'] ?></td>
                      <td><?php echo $d['discount'] ?></td>
                      <td><?php echo $d['total'] ?></td>
                      <td><?php echo $d['date'] ?></td>
                      <td><?php echo $d['customer_info'] ?></td>
                      <td>
                        <a href="stock_out_edit.php?id=<?php echo $d['id']?>" class="btn btn-success btn-sm">Edit</a>
                        <a href="stock_out_delete.php?id=<?php echo $d['id']?>" class="btn btn-danger btn-sm">Delete</a>

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
Stock In