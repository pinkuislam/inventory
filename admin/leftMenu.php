<?php

if(isset($_POST['logout'])){
$obj->logout();
}
?>
<div class="wrapper">
    <header class="main-header">
        <a href="" class="logo">
            <span class="logo-mini"><b>STK</b></span>
            <span class="logo-lg"><b>CONTROL PANEL</b></span>
        </a>
        <nav class="navbar navbar-static-top">
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                  <li><a href="" target="_blank"><i class="fa fa-globe"></i></a></li>
                  <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="../admin_file/admin/dist/img/avatar5.png" class="user-image"
                        alt="User Image">
                        <span class="hidden-xs">
                            <?php
                            // echo $this->session->userdata('admin_name');
                            ?>
                        </span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="user-header">
                            <img src="../admin_file/admin/dist/img/avatar5.png" class="img-circle"
                            alt="User Image">
                            <p>
                                <?php
                                echo $_SESSION['name'];
                                ?>
                            </p>
                        </li>
                        <!-- Menu Body -->
                        <li class="user-body">
                            <div class="row">
                                <div class="col-xs-4 text-center">
                                </div>
                                <div class="col-xs-4 text-center">
                                </div>
                                <div class="col-xs-4 text-center">
                                </div>
                            </div>
                            <!-- /.row -->
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">                               
                            </div>
                            <div class="pull-right">
                                <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                                    <input type="submit"
                                    class="btn btn-default btn-flat" name="logout" value="Sign out">
                                </form>
                            </div>
                        </li>
                    </ul>
                </li>
                <!-- Control Sidebar Toggle Button -->
                <li>
                    <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                </li>
            </ul>
        </div>
    </nav>
</header>
<aside class="main-sidebar">
    <section class="sidebar">

        <ul class="sidebar-menu">
            <li class="active"><a href=""><i class="fa fa-circle-o"></i>
                Dashboard </a></li>
                <li class="treeview <?php  if($_SESSION['menu']=='product'){ echo "active";} ?>">
                    <a href="#">
                        <i class="fa fa-clone"></i> <span>Products </span>
                        <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                      </span>
                  </a>
                  <ul class="treeview-menu">
                    <li class="active"><a href="new_product.php"><i class="fa fa-user"></i>
                        New Products  </a></li>
                    <li class="active"><a href="product_list.php"><i class="fa fa-user"></i>
                        Products List </a></li>
                  
                    </ul>
                </li>
                  <li class="treeview <?php  if($_SESSION['menu']=='inventory'){ echo "active";} ?>">
                    <a href="#">
                        <i class="fa fa-clone"></i> <span>Inventory </span>
                        <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                      </span>
                  </a>
                  <ul class="treeview-menu">
                      <li class="active"><a href="stock_in.php"><i class="fa fa-user"></i>
                       Add New Stock in </a></li>
                       <li class="active"><a href="stock_in_list.php"><i class="fa fa-user"></i>
                       Stock in List</a></li>
                    <li class="active"><a href="stock_out.php"><i class="fa fa-user"></i>
                      Add New Stock out </a></li>
                       <li class="active"><a href="stock_out_list.php"><i class="fa fa-user"></i>
                       Stock out List</a></li>
                    <li class="active"><a href="wastage_product_add.php"><i class="fa fa-user"></i>
                      Add New Wastage Products </a></li>
                         <li class="active"><a href="wastage_product_list.php"><i class="fa fa-user"></i>
                        Wastage Products List</a></li>
                    <li class="active"><a href="returns_product.php"><i class="fa fa-user"></i>
                       Add New Return Products </a></li>
                         <li class="active"><a href="returns_product_list.php"><i class="fa fa-user"></i>
                        Return Products List</a></li>
                    </ul>
                </li>
                <li class="treeview <?php  if($_SESSION['menu']=='admin'){ echo "active";} ?>">
                    <a href="#">
                        <i class="fa fa-clone"></i> <span>Admin </span>
                        <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                      </span>
                  </a>
                  <ul class="treeview-menu">
                    <li class="active"><a href="new_admin.php"><i class="fa fa-user"></i>
                        New Admin  </a></li>
                    <li class="active"><a href="admin_list.php"><i class="fa fa-user"></i>
                        Admin List </a></li>
                    </ul>
                </li>
                <li class="treeview <?php  if($_SESSION['menu']=='report'){ echo "active";} ?>">
                    <a href="#">
                        <i class="fa fa-clone"></i> <span>Reports </span>
                        <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                      </span>
                  </a>
                  <ul class="treeview-menu">
                <li class="active"><a href="stock_reports.php"><i class="fa fa-user"></i>
                        Stock Report </a></li>
                    <li class="active"><a href="sales_report.php"><i class="fa fa-user"></i>
                        Sales Report </a></li>
                    <li class="active"><a href="wastage_product.php"><i class="fa fa-user"></i>
                        Wastage Report </a></li>
                    <li class="active"><a href="return_product.php"><i class="fa fa-user"></i>
                        Return Report </a></li>
                    </ul>
                </li>

            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>
