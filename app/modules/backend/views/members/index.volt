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
                会员管理
                <small>管理网站会员。</small>
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
                                <a href="/backend/members/create" class="btn btn-primary">
                                    <i class="fa fa-fw fa-plus"></i> 新会员
                                </a>
                                <a href="/backend/membergroups/index" class="btn btn-primary">
                                    <i class="fa fa-fw fa-group"></i> 管理群组
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
                                        <th>名 姓</th>
                                        <th>登录名</th>
                                        <th>Email</th>
                                        <th>创建时间</th>
                                        <th>更新时间</th>
                                        <th>是否有效</th>
                                        <th>是否VIP会员</th>
                                        <th>操作</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {% for user in users %}
                                    <tr>
                                        <td>{{ user.id }}</td>
                                        <td>{{ user.firstName }} {{ user.lastName }}</td>
                                        <td>{{ user.loginName }}</td>
                                        <td>{{ user.email }}</td>
                                        <td>{{ user.createdAt }}</td>
                                        <td>{{ user.updatedAt }}</td>
                                        {% if user.isActivated === "1" %}
                                            <td>是</td>
                                        {% else %}
                                            <td>否</td>
                                        {% endif %}
                                        {% if user.isVip === "1" %}
                                            <td>是</td>
                                        {% else %}
                                            <td>否</td>
                                        {% endif %}
                                        <td>
                                            <a href="/backend/members/edit?id={{ user.id }}">编辑</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                                            <a href="/backend/members/changepassword?id={{ user.id }}">修改密码</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                                            <a href="/backend/members/delete?id={{ user.id }}">删除</a>
                                        </td>
                                    </tr>
                                    {% endfor %}
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th>名 姓</th>
                                        <th>登录名</th>
                                        <th>Email</th>
                                        <th>创建时间</th>
                                        <th>更新时间</th>
                                        <th>是否有效</th>
                                        <th>是否VIP会员</th>
                                        <th>操作</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            Footer
                            <p><?php $this->flashSession->output() ?></p>
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
{{ javascript_include('/assets/static/plugins/datatables/jquery.dataTables.min.js') }}
<!-- DataTables -->
{{ javascript_include('/assets/static/plugins/datatables/dataTables.bootstrap.min.js') }}
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