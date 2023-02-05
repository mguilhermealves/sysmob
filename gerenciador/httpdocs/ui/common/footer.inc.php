<?php if (isset($_SESSION[constant("cAppKey")]["credential"])) { ?>
  </div>
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Versão:</b> <?php print(constant("cVersion")) ?>
    </div>
    <strong>Copyright &copy; 2022-<?php print(date("Y")); ?> SYSMOB </strong> | Todos os direitos reservados.
  </footer>
<?php } ?>

<div class="spinner-border" role="status">
  <span class="sr-only">Loading...</span>
</div>

<style>
  .spinner-border {
    position: fixed;
    display: none;
    top: 50%;
    left: 50%;
    text-align: center;
    background-color: rgba(255, 255, 255, 0.8);
    z-index: 2;
  }
</style>

<!-- jQuery 3 -->
<script src="<?php printf("%s%s", constant("cFurniture"), "AdminLTE/bower_components/jquery/dist/jquery.min.js") ?>"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php printf("%s%s", constant("cFurniture"), "AdminLTE/bower_components/jquery-ui/jquery-ui.min.js") ?>"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->

<!-- sweetalert2 -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"></script>
<!-- <script type='text/javascript' src='<?php printf("%s%s", constant("cFurniture"), "js/jquery.inputmask.bundle.js") ?>'></script>
<script type='text/javascript' src='<?php printf("%s%s", constant("cFurniture"), "js/jquery-autocomplete.js") ?>'></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script> -->

<!-- Select2 -->
<script src="<?php printf("%s%s", constant("cFurniture"), "AdminLTE/bower_components/select2/dist/js/select2.full.min.js") ?>"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php printf("%s%s", constant("cFurniture"), "AdminLTE/bower_components/bootstrap/dist/js/bootstrap.min.js") ?>"></script>
<!-- Morris.js charts -->
<script src="<?php printf("%s%s", constant("cFurniture"), "AdminLTE/bower_components/raphael/raphael.min.js") ?>"></script>
<script src="<?php printf("%s%s", constant("cFurniture"), "AdminLTE/bower_components/morris.js/morris.min.js") ?>"></script>
<!-- Sparkline -->
<script src="<?php printf("%s%s", constant("cFurniture"), "AdminLTE/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js") ?>"></script>
<!-- jvectormap -->
<script src="<?php printf("%s%s", constant("cFurniture"), "AdminLTE/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js") ?>"></script>
<script src="<?php printf("%s%s", constant("cFurniture"), "AdminLTE/plugins/jvectormap/jquery-jvectormap-world-mill-en.js") ?>"></script>
<!-- jQuery Knob Chart -->
<script src="<?php printf("%s%s", constant("cFurniture"), "AdminLTE/bower_components/jquery-knob/dist/jquery.knob.min.js") ?>"></script>
<!-- daterangepicker -->
<script src="<?php printf("%s%s", constant("cFurniture"), "AdminLTE/bower_components/moment/min/moment.min.js") ?>"></script>
<script src="<?php printf("%s%s", constant("cFurniture"), "AdminLTE/bower_components/bootstrap-daterangepicker/daterangepicker.js") ?>"></script>
<!-- datepicker -->
<script src="<?php printf("%s%s", constant("cFurniture"), "AdminLTE/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js") ?>"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php printf("%s%s", constant("cFurniture"), "AdminLTE/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js") ?>"></script>
<!-- Slimscroll -->
<script src="<?php printf("%s%s", constant("cFurniture"), "AdminLTE/bower_components/jquery-slimscroll/jquery.slimscroll.min.js") ?>"></script>
<!-- FastClick -->
<script src="<?php printf("%s%s", constant("cFurniture"), "AdminLTE/bower_components/fastclick/lib/fastclick.js") ?>"></script>
<!-- AdminLTE App -->
<script src="<?php printf("%s%s", constant("cFurniture"), "AdminLTE/dist/js/adminlte.min.js") ?>"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php printf("%s%s", constant("cFurniture"), "AdminLTE/dist/js/pages/dashboard.js") ?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php printf("%s%s", constant("cFurniture"), "AdminLTE/dist/js/demo.js") ?>"></script>

<script type='text/javascript' src="<?php printf("%s%s", constant("cFurniture"), "js/app.js") ?>"></script>
<script type='text/javascript' src="<?php printf("%s%s", constant("cFurniture"), "js/viacep.js") ?>"></script>

<script src="<?php printf("%s%s", constant("cFurniture"), "js/DataTables/datatables.min.js") ?>"></script>

<!-- <script src="<?php printf("%s%s", constant("cFurniture"), "AdminLTE/bower_components/datatables.net/js/jquery.dataTables.min.js") ?>"></script> -->
<!-- <script src="<?php printf("%s%s", constant("cFurniture"), "AdminLTE/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js") ?>"></script> -->

<script type="text/javascript" src="<?php printf("%s%s", constant("cFurniture"), "js/jquery.serializejson.js") ?>"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
<script type='text/javascript' src='<?php printf("%s%s", constant("cFurniture"), "js/site.js") ?>'></script>

<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>

<script>
  // $('.editor').jqte();
  $('.datepicker').datepicker({
    dateFormat: 'yy-mm-d',
    closeText: "Fechar",
    prevText: "&#x3C;Anterior",
    nextText: "Próximo&#x3E;",
    currentText: "Hoje",
    monthNames: ["Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"],
    monthNamesShort: ["Jan", "Fev", "Mar", "Abr", "Mai", "Jun", "Jul", "Ago", "Set", "Out", "Nov", "Dez"],
    dayNames: ["Domingo", "Segunda-feira", "Terça-feira", "Quarta-feira", "Quinta-feira", "Sexta-feira", "Sábado"],
    dayNamesShort: ["Dom", "Seg", "Ter", "Qua", "Qui", "Sex", "Sáb"],
    dayNamesMin: ["Dom", "Seg", "Ter", "Qua", "Qui", "Sex", "Sáb"],
    weekHeader: "Sm",
    firstDay: 1
  });

  $(function() {
    //Initialize Select2 Elements
    $('.select2').select2()
  })

  $(document).ready(function() {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1')
    //bootstrap WYSIHTML5 - text editor
    $('.textarea').wysihtml5()
  });

  $(document).ready(function() {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging': true,
      'lengthChange': false,
      'searching': false,
      'ordering': true,
      'info': true,
      'autoWidth': false
    })
  });
</script>