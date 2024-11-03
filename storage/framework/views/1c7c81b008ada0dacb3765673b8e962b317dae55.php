  </div><!-- /.container-fluid -->
                      </section>
                      <!-- /.content -->
</div>
<!-- /.content-wrapper -->
</div>
<!-- /.content-wrapper -->
 <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

<footer class="main-footer">
<strong>&copy; <?php echo e(date('Y')); ?> <?php echo e(setting()->{l('sitename')}); ?></strong>

</footer>
<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
<!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery UI 1.11.4 -->
<script src="<?php echo e(url('assets')); ?>/plugins/jquery-ui/jquery-ui.min.js"></script>
<script src="<?php echo e(url('assets')); ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
$(document).ready(function(){
$.widget.bridge('uibutton', $.ui.button);
});
</script>
<!-- DataTables -->
<script src="<?php echo e(url("assets/plugins/datatables/jquery.dataTables.min.js")); ?>"></script>
<script src="<?php echo e(url("assets/plugins/datatables/selecta_all_checkbtn.js")); ?>"></script>
<script src="<?php echo e(url("assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js")); ?>"></script>
<script src="<?php echo e(url("assets/plugins/datatables-buttons/js/dataTables.buttons.min.js")); ?>"></script>
<script src="<?php echo e(url("assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js")); ?>"></script>
<script src="<?php echo e(url("assets/plugins/datatables-buttons/js/buttons.html5.min.js")); ?>"></script>
<script src="<?php echo e(url("assets/plugins/datatables-buttons/js/buttons.print.min.js")); ?>"></script>
<script src="<?php echo e(url("assets/plugins/datatables-buttons/js/buttons.flash.min.js")); ?>"></script>
<script src="<?php echo e(url("assets/plugins/datatables-buttons/js/buttons.colVis.min.js")); ?>"></script>
<script src="<?php echo e(url("assets/plugins/datatables-buttons/js/buttons.server-side.js")); ?>"></script>


<!-- moment -->
<script src="<?php echo e(url('assets')); ?>/plugins/moment/moment.min.js"></script>
<!-- Summernote -->
<script src="<?php echo e(url('assets')); ?>/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?php echo e(url('assets')); ?>/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?php echo e(url('assets')); ?>/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- sweetalert2 App -->
<script src="<?php echo e(url('assets')); ?>/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- date-range-picker -->
<script src="<?php echo e(url('assets')); ?>/plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap-colorpicker App -->
<script src="<?php echo e(url('assets')); ?>/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>

<!-- Select2 -->
<script src="<?php echo e(url('assets')); ?>/plugins/select2/js/select2.full.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo e(url('assets')); ?>/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script type="text/javascript">
var config = {
  url:'<?php echo e(aurl('/')); ?>',
  token:'<?php echo e(csrf_token()); ?>',
  custome_title:'Custom Theme Color'
};
// Change Card theme color
<?php if(!empty(!empty(setting()->theme_setting)) && !empty(setting()->theme_setting->navbar)): ?>
<?php
$card = trim(str_replace('card-dark','',str_replace('navbar','card',setting()->theme_setting->navbar)));
?>
<?php if(!empty($card) && $card != 'card-dark'): ?>
$('.card').removeClass('card-dark').addClass('<?php echo e($card); ?>');
<?php else: ?>
$('.card').addClass('card-dark');
<?php endif; ?>
<?php endif; ?>
</script>
<script src="<?php echo e(url('assets')); ?>/js/demo.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.2.1/jstree.min.js"></script>
<script>
var options = {
filebrowserImageBrowseUrl: '<?php echo e(aurl('filemanager?type=Images')); ?>',
filebrowserImageUploadUrl: '<?php echo e(aurl('filemanager/upload?type=Images&_token=')); ?>',
filebrowserBrowseUrl: '<?php echo e(aurl('filemanager?type=Files')); ?>',
filebrowserUploadUrl: '<?php echo e(aurl('/filemanager/upload?type=Files&_token=')); ?>'
};
</script>
<script src="https://cdn.ckeditor.com/4.10.0/full/ckeditor.js"></script>
<script type="text/javascript" src="<?php echo e(url('vendor/unisharp/laravel-ckeditor/adapters/jquery.js')); ?>"></script>

<script src="https://vjs.zencdn.net/7.11.4/video.min.js"></script>
<!-- If you'd like to support IE8 (for Video.js versions prior to v7) -->
<!-- <script src="https://vjs.zencdn.net/ie8/1.1.2/videojs-ie8.min.js"></script> -->
<!-- END THEME LAYOUT SCRIPTS -->
<?php if(empty(request()->segment(2))): ?>
<!-- ChartJS -->
<script src="<?php echo e(url('assets')); ?>/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="<?php echo e(url('assets')); ?>/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="<?php echo e(url('assets')); ?>/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?php echo e(url('assets')); ?>/plugins/jqvmap/maps/jquery.vmap.world.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo e(url('assets')); ?>/plugins/jquery-knob/jquery.knob.min.js"></script>

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo e(url('assets')); ?>/js/pages/dashboard.js"></script>
<?php endif; ?>

<script src="<?php echo e(url('assets/plugins/dropzone/min/dropzone.min.js')); ?>" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){
$('textarea.ckeditor').ckeditor(options);
$('.date-picker').datepicker();
$.fn.dataTable.ext.errMode = 'none';

//color picker with addon
 $('.colorpicker').colorpicker();

 $('.colorpicker').on('colorpickerChange', function(event) {
      $('.colorpicker .fa-square').css('color', event.color.toString());
  });

 //Date range picker
 $('.datepicker').daterangepicker({
     // dateFormat: 'yyyy-mm-dd',
      showButtonPanel: true,
      gotoCurrent: false,
       locale: {
        format: 'YYYY-MM-DD'
      },
    singleDatePicker: true,
    showDropdowns: true,
    //startDate: '<?php echo e(date('Y-m-d')); ?>',
    //endDate: '<?php echo e(date('Y-m-d')); ?>',
    });

//date_time_picker
 $('.date_time_picker').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      showButtonPanel: true,
      gotoCurrent: false,
       locale: {
        format: 'YYYY-MM-DD hh:mm A'
      },
    singleDatePicker: true,
    showDropdowns: true,
    });


  //Timepicker
    $('.timepicker').datetimepicker({
      format: 'LT',
      ignoreReadonly:true
    });
    $('.timepicker').prop('readonly', true);

  $('.select2').select2({
      theme: 'bootstrap4'
    });

  $('input[type="file"]').on('change',function(){
      //get the file name
      var fileName = $(this).val().replace(/^C:\\fakepath\\/i, '');
      //replace the "Choose a file" label
      $(this).next('.custom-file-label').html(fileName);
  });


});
</script>

<?php echo $__env->yieldPushContent('js'); ?>
</body>
</html><?php /**PATH C:\Users\Bassil-Ali\Desktop\work-order\resources\views/admin/layouts/footer.blade.php ENDPATH**/ ?>