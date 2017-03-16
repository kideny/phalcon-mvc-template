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
                用户组编辑
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
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">编辑管理员</h3>
                        </div>
                        <form action="/backend/users/edit" role="form" autocomplete="off" method="post">
                            <div class="box-body">
                                <div class="form-group col-sm-12">
                                    <?php echo $form->render("isSuperUser"); ?>
                                    <label for="isSuperUser">是否超级管理员</label>
                                </div>
                                <?php echo $form->render("id"); ?>
                                <div class="form-group col-sm-6 is-required">
                                    <label for="loginName">登录名</label>
                                    <?php echo $form->render("loginName"); ?>
                                </div>
                                <div class="form-group col-sm-6 is-required">
                                    <label for="email">电子邮件</label>
                                    <?php echo $form->render("email"); ?>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="firstName">名</label>
                                    <?php echo $form->render("firstName"); ?>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="lastName">姓</label>
                                    <?php echo $form->render("lastName"); ?>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="usergroups">用户组</label>
                                    <p>指明这个用户属于哪个用户组.</p>
                                    <select class="form-control">
                                        <option>用户组1  <small>指明这个人属于哪个组.</small></option>
                                        <option>用户组2  <small>指明这个人属于哪个组.</small></option>
                                        <option>用户组3  <small>指明这个人属于哪个组.</small></option>
                                        <option>用户组4  <small>指明这个人属于哪个组.</small></option>
                                        <option>用户组5  <small>指明这个人属于哪个组.</small></option>
                                    </select>
                                </div>
                            </div>
                            <div class="box-footer">
                                <div class="form-group col-sm-6">
                                    <button type="submit" class="btn btn-primary">立即保存</button>
                                    <button type="submit" class="btn btn-default">编辑和关闭</button>
                                    <span class="btn-text">
                                        或 <a href="/backend/users/index">返回管理员列表</a>
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