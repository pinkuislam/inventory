<?php
 require('head_c.php');
 $_SESSION['menu']='inventory';
 if(isset($_POST['adminid'])){
$obj->stock_out_edit_product($_POST);
}
$data=$obj->stock_out_for_update($_GET['id']); 
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
        Update Stock Out
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="new_product.php">Update Stock Out </a></li>
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
                    <input type="hidden" name="adminid" class="form-control" value="<?php echo $data['adminid'] ?>" required>
                  </div>
                  <div class="form-group">
                    <label>Product Name</label>
                    <input type="hidden" name="productid" class="form-control" value="<?php echo $data['productid'] ?>">
                    <input type="text" readonly class="form-control" value="<?php echo $p['name'] ?>">
                  </div>
                </div>
                <input type="hidden" readonly id="price" class="form-control" value="<?php echo  $p['price']?>">
                <input type="hidden" readonly name="sub_total" id="st" class="form-control" value="<?php echo $data['sub_total'] ?>" required>
                <div class="col-md-6">
                  
                  <div class="form-group">
                    <input type="hidden" name="invoice_no" class="form-control" value="<?php echo $data['invoice_no'] ?>" required>
                  </div>
                  <div class="form-group">
                    <label>Coustomer Info</label>
                    <input type="text" name="customer_info" class="form-control" value="<?php echo $data['customer_info'] ?>">
                  </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                    <label>Quantity</label>
                    <input type="text" name="quantity" id="quantity" onkeyup="calculate()" class="form-control" value="<?php echo $data['quantity'] ?>">
                  </div> 
                  <div class="form-group">
                    <label>Discount</label>
                    <input type="text" id="d" name="discount" onkeyup="calculate()" class="form-control" value="<?php echo $data['discount'] ?>">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Total</label>
                    <input type="text" name="total" id="t" class="form-control" value="<?php echo $data['total'] ?>">
                  </div>
                   <div class="form-group">
                    <label>Date</label>
                    <input type="date" name="date" class="form-control" value="<?php echo $data['date'] ?>">
                  </div>   
            </div>
               <div class="col-md-6">
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