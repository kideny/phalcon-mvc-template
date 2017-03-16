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
            <h1>用户组<small>后台用户组和权限</small></h1>
            <ol class="breadcrumb">
                <li><a href="/backend/" title="后台首页"><i class="fa fa-dashboard"></i> 首页</a></li>
                <li><a href="/backend/usergruops">用户组</a></li>
                <li class="active">Blank page</li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <!-- Default box -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">添加用户组</h3>
                        </div>
                        <form method="POST" action="" role="form">
                            <div class="box-body">
                                <div class="checkbox col-sm-12">
                                    <label for="isNewUserDefault">
                                        <?php echo $form->render("isNewUserDefault"); ?>
                                        增加新管理员是否默认到这个组
                                    </label>
                                </div>
                                <div class="checkbox col-sm-12">
                                    <label for="isActivated">
                                        <?php echo $form->render("isActivated"); ?>
                                        新管理员是否激活
                                    </label>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="name">
                                        用户组名&nbsp;&nbsp<i class="fa fa-circle-o text-red"></i>
                                    </label>
                                    <?php echo $form->render("name"); ?>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="email">代码</label>
                                    <?php echo $form->render("code"); ?>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="firstname">描述</label>
                                    <?php echo $form->render("description"); ?>
                                </div>
                            </div>
                            <div class="box-footer">
                                <div class="form-group col-sm-6">
                                    <button type="submit" class="btn btn-primary">创建用户</button>
                                    <button type="submit" class="btn btn-default">创建和关闭</button>
                                    <span class="btn-text">
                                        或 <a href="/backend/usergroups">取消</a>
                                    </span>
                                </div>
                            </div>
                            {{ form.render('csrf', ['value': this.security.getToken()]) }}
                        </form>
                        <!-- /.box-body -->
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
<?php $this->assets->outputJs(); ?>