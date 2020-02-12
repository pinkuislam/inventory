<?php
 require('head_c.php');
 $_SESSION['menu']='inventory';
 if(isset($_POST['productid'])){
$obj->wastage_edit_product($_POST);
}
$data=$obj->wastage_for_update($_GET['id']); 
$p=$obj->getData('products','id='.$data['productid'])->fetch(PDO::FETCH_ASSOC);
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
        Update Wastage
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="new_product.php">Update Wastage</a></li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content" style="min-height: 76vh;">
      <div class="row">
        <div class="box">
          <div class="box-body">
            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data" >
              <div class="col-xs-12 col-md-12">
                 <input type="hidden" name="id" class="form-control" value="<?php echo $data['id'] ?>" required>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Product Name</label>
                    <input type="hidden" name="productid" class="form-control" value="<?php echo $data['productid'] ?>">
                    <input type="text" readonly class="form-control" value="<?php echo $p['name'] ?>">
                  </div>
                </div>
              <input type="hidden" readonly id="price" class="form-control" value="<?php echo  $p['price']?>">
              <input type="hidden" readonly id="st" class="form-control" value="<?php echo $data['sub_total'] ?>" required>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Quantity</label>
                    <input type="text" name="quantity" id="quantity" onkeyup="calculate()" class="form-control" value="<?php echo $data['quantity'] ?>">
                     <input type="hidden" id="d" onkeyup="calculate()" class="form-control" value="0" required>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Total</label>
                    <input type="text" name="total" id="t" class="form-control" value="<?php echo $data['total'] ?>">
                  </div>
                </div>
                <div class="col-md-6">
                   <div class="form-group">
                    <label>Date</label>
                    <input type="date" name="date" class="form-control" required value="<?php echo $data['date'] ?>">
                  </div>
                <div class="col-md-6">
                  <div class="form-group">
                <label></label>
                <input type="submit" class="btn btn-primary btn-block" value="Update">
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
<script type="text/javascript" src="jquery-3.4.1.min.js"></script>
<script>
  function calculate() {
    var price=parseFloat($('#price').val())
    var qty=parseFloat($('#quantity').val())
    var sub_total=price*qty
    $('#st').val(sub_total)
    var d
    var d=parseFloat($('#d').val())
    var discounted=sub_total-(sub_total*d)/100
    $('#t').val(discounted) 
  }
</script>
<?php require('footer_c.php');?>