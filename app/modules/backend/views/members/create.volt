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
                新用户
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
                            <h3 class="box-title">添加会员</h3>
                        </div>
                        <form action="" role="form" autocomplete="off" method="post">
                            <div class="box-body">
                                <div class="checkbox col-sm-12">
                                    <label for="isVip">
                                        <input type="checkbox" name="isVip" value="1">
                                        是否VIP会员
                                    </label>
                                </div>
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
                                <div class="form-group col-sm-6 is-required">
                                    <label for="password">密码</label>
                                    <?php echo $form->render("password"); ?>
                                </div>
                                <div class="form-group col-sm-6 is-required">
                                    <label for="confirmPassword">确认密码</label>
                                    <?php echo $form->render("confirmPassword"); ?>
                                </div>
                                <div class="checkbox col-sm-12">
                                    <label for="isActivated">
                                        <input type="checkbox" name="isActivated" value="1">
                                        是否有效客户
                                    </label>
                                </div>
                            </div>
                            <div class="box-footer">
                                <div class="form-group col-sm-6">
                                    <button type="submit" class="btn btn-primary">创建用户</button>
                                    <button type="submit" class="btn btn-default">创建和关闭</button>
                                    <span class="btn-text">
                                        或 <a href="/backend/members/index">取消</a>
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