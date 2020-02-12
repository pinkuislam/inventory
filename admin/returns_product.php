<?php
require('head_c.php');
$_SESSION['menu']='inventory';
if(isset($_POST['quantity'])){
  $data=$_POST;
  $obj->insert('return_table',$data);
  header('Location:returns_product_list.php');
}
$data=$obj->getData('products',1);
?>
<div class="wrapper">
  <?php
  require('leftMenu.php');
  ?>
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
      Add Returns product 
     </h1>
     <ol class="breadcrumb">
      <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="new_product.php">Add Returns product  </a></li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content" style="min-height: 76vh;">
    <div class="row">
      <div class="box">
        <div class="box-body">
          <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data" >
            <div class="col-xs-12 col-md-12">
              <input type="hidden" id="inc" value="0">
              <div class="col-md-6">
                <div class="form-group">
                <select class="form-control" onChange="get_data()" id="code">
                   <option value="">Select product</option>
                   <?php while ($d=$data->fetch(PDO::FETCH_ASSOC)) { ?>
                   <option value="<?php echo $d['id'] ?>"><?php echo $d['name'] ?></option>
                 <?php } ?>
                 </select>

               </div>
             </div>
             <div class="col-md-6">
              <input type="date" name="date" class="form-control" required>
            </div>
          </div>
          <div class="col-xs-12 col-md-12">
           <table class="table table-bordered" id="tbl"> 
  <thead>
   <tr>
        <th>Name</th>
        <th>Price</th>
        <th>QTY</th>
        <th>Total</th>
        <th></th>
      </tr>
    </thead>
    <tbody id="body">
  </tbody>
  <tfoot>
    <tr>
      <th colspan="6"><input type="submit" value="Save" class="btn btn-block btn-primary"></th>
    </tr>
  </tfoot>
</table>  
        </div>
      </form>
    </div>
  </div>
</div>
</section>
</div>
</div>
<script type="text/javascript" src="jquery-3.4.1.min.js"></script>
<script>
  function get_data(){
    var i=(parseInt($('#inc').val()))+1
    $('#inc').val(i)
      // i+=1
      var p_id=$('#code').val()
      if(p_id!=''){
      $.ajax({
        url: "stock_in_data.php", 
        type: 'POST',  
        dataType: "json",
        data: { 
          productID: p_id 
        }, 
        success: function(data){
          var msg='Are you sure?'
          var ht='<tr id="r_'+i+'">'
          // ht+='<td>'+i+'</td>'
          ht+='<td><input type="text" class="form-control" value="'+data.name+'"><input type="hidden" name="productid" class="form-control" value="'+data.id+'"></td>'
          ht+='<td><input onkeyup="calculate('+i+')" id="p_'+i+'"  value="'+data.price+'"  type="text" class="form-control" ></td>'
          ht+='<td><input name="quantity" onkeyup="calculate('+i+')" id="q_'+i+'" value="0" type="text" class="form-control" tabindex="'+i+'"></td>'
          ht+='<td><input id="t_'+i+'" type="text" name="total"  value="0" class="form-control tt"></td>'
          ht+='<td><a href="javascript:void(0)" class="btn btn-sm btn-danger" onclick="remove('+i+')">-</a></td>'
          ht+='</tr>';
          $('#body').append(ht)
        }
      });
}    
    }
function remove(id){
  $('#r_'+id).remove()
  var tt=0;
  $('.tt').each(function(){
    tt+=parseFloat($(this).val())
  })
}
function calculate(id) {
  var price=parseFloat($('#p_'+id).val())
  var qty=parseFloat($('#q_'+id).val())
  var total=price*qty
  $('#t_'+id).val(total)
}
</script>
<?php require('footer_c.php');?>