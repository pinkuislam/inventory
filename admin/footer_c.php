<footer class="main-footer">
  
  <strong>Copyright &copy; <?php echo date("Y")?> - <?php echo date('Y', strtotime('+1 years'))?> <a href="https://prantiksoft.com">Inventory Management</a>.</strong> All rights
  reserved.
</footer>
<script src="../admin_file/admin/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="../admin_file/admin/bootstrap/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="../admin_file/admin/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../admin_file/admin/plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="../admin_file/admin/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../admin_file/admin/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../admin_file/admin/dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../admin_file/admin/dist/js/demo.js"></script>
<script type="text/javascript" src="../admin_file/jquery-ui-1.11.4/jquery-ui.js"></script>
<script src="../admin_file/admin/plugins/ckeditor/ckeditor.js"></script>
<!-- page script -->
<!-- chosen script start -->
<script src="../admin_file/admin/plugins/chosen/chosen.jquery.js" type="text/javascript"></script>
<script src="../admin_file/admin/plugins/chosen/docsupport/prism.js" type="text/javascript" charset="utf-8"></script>
<script src="../admin_file/admin/plugins/chosen/docsupport/init.js" type="text/javascript" charset="utf-8"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>

<!-- chosen script end -->
<script>
  $( function() {
    $( ".date" ).datepicker( {dateFormat:"yy-mm-dd"});
    

    $('.timepicker').timepicker({
      timeFormat: 'H:mm',
      interval: 10,
      minTime: '10',
      maxTime: '11:59pm',
      defaultTime: '11',
      startTime: '10:00',
      dynamic: false,
      dropdown: true,
      scrollbar: true
    });


  } );
</script>
<script>
  $(function () {
    $("#example1").DataTable();
    $("#example2").DataTable();
    
  });

</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.4.2/chosen.jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.4.2/chosen.min.css" />
<script type="text/javascript">
  $(document).ready(function () {
    $('.chosen').chosen();
  });
</script>
</body>
</html>