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
                用户组
                <small>后台用户组和权限</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="/backend/" title="后台首页"><i class="fa fa-dashboard"></i> 首页</a></li>
                <li><a href="#">Examples</a></li>
                <li class="active">Blank page</li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <!-- Default box -->
                    <div class="box">
                        <div class="box-header with-border">
                            <div class="box-title">
                                <a href="/backend/users/index" class="btn btn-default">
                                    <i class="fa fa-fw fa-chevron-left"></i> 返回管理员列表
                                </a>
                                <a href="/backend/usergroups/create" class="btn btn-primary">
                                    <i class="fa fa-fw fa-group"></i> 新管理组
                                </a>
                            </div>
                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                                    <i class="fa fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                                    <i class="fa fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>用户组名</th>
                                        <th>描述</th>
                                        <th>code</th>
                                        <th>创建时间</th>
                                        <th>修改时间</th>
                                        <th>操作</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {% for usergroup in usergroups %}
                                    <tr>
                                        <td>{{ usergroup.id }}</td>
                                        <td>{{ usergroup.name }}</td>
                                        <td>{{ usergroup.description }}</td>
                                        <td>{{ usergroup.code }}</td>
                                        <td>{{ usergroup.createdAt }}</td>
                                        <td>{{ usergroup.updatedAt }}</td>
                                        <td>
                                            <a href="/backend/usergroups/edit?id={{ user.id }}">编辑</a> |
                                            <a href="/backend/usergroups/delete?id={{ user.id }}">删除</a>
                                        </td>
                                    </tr>
                                    {% endfor %}
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th>用户组名</th>
                                        <th>描述</th>
                                        <th>code</th>
                                        <th>创建时间</th>
                                        <th>修改时间</th>
                                        <th>操作</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            Footer
                        </div>
                        <!-- /.box-footer-->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
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
{{ partial("partials/trait") }}
<!-- DataTables -->
{{ javascript_include('/assets/static/plugins/datatables/jquery.dataTables.min.js') }} {{ javascript_include('/assets/static/plugins/datatables/dataTables.bootstrap.min.js')
}}
<!-- page script -->
<script>
    $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false
        });
    });
</script>
<?php $this->assets->outputJs(); ?>