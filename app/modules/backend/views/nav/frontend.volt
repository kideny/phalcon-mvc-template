<!-- Site wrapper -->
<div class="wrapper">
  <header class="main-header">
    {{ partial("partials/header") }}
  </header>
  <aside class="main-sidebar">
    {{ partial("partials/siderbar") }}
  </aside>
  <!-- =============================================== -->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Blank page
        <small>it all starts here</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">Blank page</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Title</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
          Start creating your amazing application!
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          Footer
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    {{ partial("partials/footer") }}
  </footer>
  <!-- Control Sidebar -->
  {{ partial("partials/aside") }}
</div>
<!-- ./wrapper -->
<!-- jQuery 2.2.3 -->
{{ javascript_include('/assets/static/plugins/jQuery/jquery-2.2.3.min.js') }}
<!-- Bootstrap 3.3.7 -->
{{ javascript_include('/assets/static/bootstrap/js/bootstrap.min.js') }}
<!-- Slimscroll -->
{{ javascript_include('/assets/static/plugins/slimScroll/jquery.slimscroll.min.js') }}
<!-- FastClick -->
{{ javascript_include('/assets/static/plugins/fastclick/fastclick.js') }}
<!-- AdminLTE App -->
{{ javascript_include('/assets/static/adminlte/js/app.min.js') }}
<!-- AdminLTE for demo purposes -->
{{ javascript_include('/assets/static/adminlte/js/demo.js') }}
<?php $this->assets->outputJs(); ?>