<?php

 require('head_c.php');
  $_SESSION['menu']='product';
$data=$obj->get_product();
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
        Product List
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="new_product.php">Product List </a></li>
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
                      <th>Name</th>
                      <th>Price</th>
                      <th>Unit</th>
                      <th>Photo</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php while ($d=$data->fetch(PDO::FETCH_ASSOC)) {?>
                    <tr>
                      <td><?php echo $d['name'] ?></td>
                      <td><?php echo $d['price'] ?></td>
                      <td><?php echo $d['unit'] ?></td>
                      <td><img src="../upload/<?php echo $d['photo'] ?>" width="100" height="100"></td>
                      <td>
                        <a href="edit.php?id=<?php echo $d['id']?>" class="btn btn-success btn-sm">Edit</a>
                        <a href="delete.php?id=<?php echo $d['id']?>" class="btn btn-danger btn-sm">Delete</a>

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
