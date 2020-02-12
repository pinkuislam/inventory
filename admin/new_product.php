<?php
 require('head_c.php');
 $_SESSION['menu']='product';
 if(isset($_POST['name'])){
$obj->new_product($_POST);
}
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
        Add new product
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="new_product.php">Add new product </a></li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="box">
          <div class="box-body">
            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data" >
              <div class="col-xs-12 col-md-12">
                <div class="col-md-6">
                  
                  <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" value="" required>
                  </div>
                  <div class="form-group">
                    <label>price</label>
                    <input type="text" name="price" class="form-control" value="" id="price">
                  </div>
                </div>
                <div class="col-md-6">
                   <div class="form-group">
                   <div class="form-group">
                    <label>Unit</label>
                    <input type="text" name="unit" class="form-control" value="">
                  </div>
              </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Photo</label>
                    <input type="file" name="photo" class="form-control" value="" required>
                  </div>
                  <div class="form-group">
                <label></label>
                <input type="submit" class="btn btn-primary btn-block" value="Submit">
              </div>
              </div> 
            </div>
          </form>
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
  
</script>